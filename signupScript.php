<?php
require_once('mysqli_connect.php');

    if(isset($_POST['submit2'])) {
        $email = $_POST['emailAddress'];
        $pass = $_POST['inputPassword2'];

        // Connecting to the database
        $list = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // If we don't connect to the database it will spit out an error for us to fix
        if(!$list) {
            die("Connection failed: ".mysqli_connect_error()); // Remove the connect_error method after done testing because of hacking issues.
        }

        $query = "SELECT * FROM Login WHERE userName='$email' AND passName='$pass'";
        
        $result = mysqli_query($list,$query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);

       if( $num_row == 1 ) {
           mysqli_close($list);
           header('Location: login.html');
           die();
       } else {
            $sql = "INSERT INTO Login(id, userName, passName) VALUES(NULL, '$email','$pass')";
           header("Location: login.html");
            // Checking to see if we actually placed the data into the database
            if (mysqli_query($list, $sql)) {
                echo "New record created successfully<br>";
                mysqli_close($list);
                die();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($list). "<br>";
                die();
            }
           mysqli_close($list);
           die();
       }     

        // Closing the connection to the database
        echo "Something broke with the signup function";
        mysqli_close($list);
        die();
    }
?>