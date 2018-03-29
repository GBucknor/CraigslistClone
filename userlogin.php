<?php
    session_start();
    require_once('mysqli_connect.php');

    // Connects to the database
    function connect(){
        // Connecting to the database
        $list = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // If we don't connect to the database it will spit out an error for us to fix
        if(!$list) {
            die("Connection failed: ".mysqli_connect_error()); // Remove the connect_error method after done testing because of hacking issues.
        } else {
            return $list;
        }
    }

?>

<!DOCTYPE html>
<html>
<body>

<h2>Loging Testing</h2>

<h2>Login</h2>
<form action=" " method="post">
  User:<br>
  <input type="text" name="userlogin">
  <br>
  Password:<br>
  <input type="password" name="userpass">
  <br><br>
  <input type="submit" name="login" value="Login">
</form> 
  
<h2>Signup</h2>
<form action=" " method="post">
  User:<br>
  <input type="text" name="usersignup">
  <br>
  Password:<br>
  <input type="password" name="signuppass">
  <br><br>
  <input type="submit" name="signup" value="signup">
</form> 
    
<?php
        if(isset($_POST['login'])) {
        $user = $_POST['userlogin'];
        $pass = $_POST['userpass'];

        // Connecting to the database
        $list = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // If we don't connect to the database it will spit out an error for us to fix
        if(!$list) {
            die("Connection failed: ".mysqli_connect_error()); // Remove the connect_error method after done testing because of hacking issues.
        }

        $query = "SELECT * FROM Login WHERE userName='$user' AND passName='$pass'";
        
        $result = mysqli_query($list,$query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);

       if( $num_row == 1 ) {
           mysqli_close($list);
           header('Location: category.php');
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

</body>
</html>