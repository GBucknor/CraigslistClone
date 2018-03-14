<?php
    if(isset($_POST['submit'])) {
        $user = $_POST['userName'];
        $pass = $_POST['passName'];

        // Connecting to the database
        $list = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // If we don't connect to the database it will spit out an error for us to fix
        if(!$list) {
            die("Connection failed: ".mysqli_connect_error()); // Remove the connect_error method after done testing because of hacking issues.
        }

        $query = "SELECT * FROM Login WHERE firstName='$user' AND lastName='$pass'";
        
        $result = mysqli_query($list,$query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);

       if( $num_row == 1 ) {
           echo "No.";
           mysqli_close($list);
           header('Location: index.html');
           die();
       } else {
           echo "Wrong login credentials";
           mysqli_close($list);
           die();
       }     

        // Closing the connection to the database
        echo "Something broke with the login function";
        mysqli_close($list);
        die();
    }
?>