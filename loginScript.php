<?php
session_start();
require_once('mysqli_connect.php');

    if(isset($_POST['login'])) {
        $email = $_POST['userlogin'];
        $pass = $_POST['userpass'];

        // Connecting to the database
        $list = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // If we don't connect to the database it will spit out an error for us to fix
        if(!$list) {
            die("Connection failed: ".mysqli_connect_error()); // Remove the connect_error method after done testing because of hacking issues.
        }

        /* create a prepared statement */
        if ($stmt = mysqli_prepare($list, 
               "SELECT * FROM Login WHERE userName= ? AND passName= ?")) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "ss", $email, $pass);

            /* execute query */
            mysqli_stmt_execute($stmt);
            
            /* stores it in stmt */
            mysqli_stmt_store_result($stmt);
            
            /* To check to see if they match on the dbs */
            if(mysqli_stmt_num_rows($stmt) == 1){
                /* close statement */
                mysqli_stmt_close($stmt);
                mysqli_close($list);
                $_SESSION['user'] = $email;
                header('Location: index.php');
                die();
            /* If it fails to find a match */
            } else {
                echo "Wrong login credentials";
                mysqli_stmt_close($stmt);
                die();
            }
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($list);
            die();
        }
    }
?>