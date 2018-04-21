<?php
    session_start();
    require_once('mysqli_connect.php');
    include 'functions.php';

    if (isLoggedin()) {
            header('Location: category.php');
        }

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
    
    <head>
        <title>craigslist - account log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <!-- Craigslist Tab Icon -->
        <link rel="icon" href="Images/logo.png">
        
        <!-- CSS Files -->
        <link rel="stylesheet" href="CSS/Base.css" type="text/css">
    </head>
    
<body class=" desktop w1024">

<section class="page-container">
    
    <header class="global-header ">
       <a class="header-logo" name="logoLink" href="category.php">CL</a>

        <nav class="breadcrumbs-container">
            <ul class="breadcrumbs">
                <li class="crumb plain-message">
                    <p>account log in</p>
                </li>
            </ul>
        </nav>
    </header> 
    
<section class="body">
    <div class="login-page-boxes">
        <div class="accountform login-box">
            <h1 class="accountform-banner">Log in</h1>
            <form action="loginScript.php" method="POST" class="loginform">
                <input type="hidden" name="step" value="confirmation">
                <input type="hidden" name="rt" value="L">
                <input type="hidden" name="rp" value="/login/home">
                <input type="hidden" name="t" value="1521043560">
                <input type="hidden" name="p" value="0">
                <input type="hidden" name="whichForm" value="login">

                <div class="accountform-field">
                    <label for="inputEmailHandle">Email / Handle</label>
                    <input type="text" id="inputEmailHandle" name="userlogin" value="" required="">
                </div>
                <div class="accountform-field">
                    <label for="inputPassword">Password</label>
                    <input id="inputPassword" type="password" name="userpass" required="" autocomplete="off">
                </div>
                <div class="accountform-actions">
                    <button type="submit" name="login" class="accountform-btn">Log in</button>
                </div>
            </form>
        </div>

        <p class="box-conjunction">or</p>

        <div class="accountform login-page-box">
            <h1 class="accountform-banner">Create an account</h1>
            <form action="signupscripts.php" method="POST">
                <input type="hidden" name="rp" value="/login/home">
                <input type="hidden" name="rt" value="L">
                <input type="hidden" name="t" value="1521043560">
                <input type="hidden" name="whichForm" value="createAccount">


                <div class="accountform-field">
                    <label for="emailAddress">Email</label>
                    <input type="email" id="emailAddress" name="usersignup" value="" maxlength="64" required="">
                    </div>
                <div class="accountform-field">
                    <label for="inputPassword">Password</label>
                    <input id="inputPassword" type="password" name="signuppass" required="" autocomplete="off">
                </div>
                <div class="accountform-actions">
                    <button type="submit" name="signup" class="accountform-btn">Create account</button>
                </div>
            </form>
        </div>
    </div>
</section>
    
<?php
        if(isset($_POST['login'])) {
        $user = $_POST['userlogin'];
        $pass = $_POST['userpass'];

        // Connecting to the database
        $list = connect();

        $query = "SELECT * FROM Login WHERE userName='$user' AND passName='$pass'";
        
        $result = mysqli_query($list,$query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);

       if( $num_row == 1 ) {
           mysqli_close($list);
           $_SESSION['user'] = $user;
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
    
        if(isset($_POST['signup'])) {
        $signuser = $_POST['usersignup'];
        $signpass = $_POST['signuppass'];

        // Connecting to the database
        $list = connect();

        $query = "SELECT * FROM Login WHERE userName='$signuser' AND passName='$signpass'";
        
        $result = mysqli_query($list,$query)or die(mysqli_error($list));
            
        $num_row = mysqli_num_rows($result);

       if( $num_row == 1 ) {
           mysqli_close($list);
           echo "one already exsist with those credentials";
           die();
       } else {
            $sql = "INSERT INTO Login(userName, passName) VALUES('$signuser','$signpass')";
            // Checking to see if we actually placed the data into the database
            if (mysqli_query($list, $sql)) {
                mysqli_close($list);
                header("Refresh:0");
                die();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($list). "<br>";
                die();
            }
           /** @noinspection PhpUnreachableStatementInspection */
           mysqli_close($list);
           die();
       }     

        // Closing the connection to the database
        /** @noinspection PhpUnreachableStatementInspection */
        echo "Something broke with the signup function";
        mysqli_close($list);
        die();
    }
?>
    
    <footer>
        <ul class="clfooter">
            <li>©  <span class="desktop">craigslist</span><span class="mobile">CL</span></li>
            <li><a href="#">help</a></li>
            <li><a href="#">safety</a></li>
            <li class="desktop"><a href="#">privacy</a></li>
            <li class="desktop"><a href="#">feedback</a></li>
            <li class="desktop"><a href="#">cl jobs</a></li>
            <li><a href="#">terms</a><sup class="neu">new</sup></li>
            <li><a href="#">about</a></li>
        </ul>
    </footer>
</section>

</body>
</html>