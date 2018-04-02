<?php
    session_start();
    require_once('mysqli_connect.php');
    include 'functions.php';

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
    $id = $_GET['id'];

    $sql = "SELECT
            postID,
            title
        FROM
            Posting
        WHERE
            catPostID = '$id'";

?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>craigslist - Vancouver</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Craigslist Tab Icon -->
        <link rel="icon" href="Images/logo.png">

        <!-- CSS Files -->
        <link rel="stylesheet" href="CSS/cl.css" type="text/css">
    </head>
    
<body class="posting en desktop w1024">

    <section class="page-container">
        <div class="bglogo"></div>
<header class="global-header wide">
    
   <a class="header-logo" name="logoLink" href="category.php">CL</a>

    <nav class="breadcrumbs-container">
        <ul class="breadcrumbs">
            <li class="crumb area">
                <p>
                    <a href="category.php">vancouver, BC</a>
                </p>
            </li>
        </ul>  
    </nav>
    
    <div class="userlinks">
        <ul class="user-actions">
            <li class="user post">
                <a href="postingPage.php">post</a>
            </li>
            <li class="user account">
                <a href="#">account</a>
            </li>
            <li class="user account">
            <?php
                if (isLoggedin()) {
                    echo '<a href="logout.php">Logout</a>';
                } else {
                    echo '<a href="userlogin.php">Login</a>';
                }
            ?>
            </li>
        </ul>
    </div>
</header>
        
    <section class="content">
    
    <?php
        // Connecting to the database
        $list = connect();
        $row = mysqli_query($list, $sql);

        while($sqlRow = mysqli_fetch_assoc($row)) {
            echo '<a href="individualPost.php?id=' . $sqlRow['postID'] . '">' . $sqlRow['title'] . "</a><br>";
        }

        mysqli_close($list);
    ?>
    <br>
    </section>
        
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