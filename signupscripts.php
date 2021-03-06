<?php
require_once('mysqli_connect.php');

    if(isset($_POST['signup'])) {
        $email = $_POST['usersignup'];
        $pass = $_POST['signuppass'];

        // Connecting to the database
        $list = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // If we don't connect to the database it will spit out an error for us to fix
        if(!$list) {
            die("Connection failed: ".mysqli_connect_error()); // Remove the connect_error method after done testing because of hacking issues.
        }

        /* create a prepared statement */
        if ($stmt = mysqli_prepare($list, 
               "SELECT * FROM Login WHERE userName= ?")) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "s", $email);

            /* execute query */
            mysqli_stmt_execute($stmt);
            
            /* stores it in stmt */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                /* close statement */
                mysqli_stmt_close($stmt);
                mysqli_close($list);
                echo "One exist with that username";
                die();
            } else {
                $register = mysqli_prepare($list, 
               "INSERT INTO Login (id, userName, passName) VALUES (NULL, ?, ?)");
                
                mysqli_stmt_bind_param($register, "ss", $email, $pass);

                mysqli_stmt_execute($register);

                mysqli_stmt_close($register);
                mysqli_close($list);

                header('Location: userlogin.php');
            }
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($list);
            die();
        }
    } else {
        echo "Error";
    }
?>