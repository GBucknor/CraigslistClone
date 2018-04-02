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

    $results = "SELECT 
                    * 
                FROM 
                    Posting
                WHERE 
                    postID = '$id' ";

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
        <link rel="stylesheet" href="CSS/posting.css" type="text/css">
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
    
    <?php
        // Connecting to the database
        $list = connect();
        $row = mysqli_query($list, $results);

        while($sqlRow = mysqli_fetch_assoc($row))
        {         
        ?>
        
<section class="body">    
    <h2 class="postingtitle">
        <span class="postingtitletext">
            <span id="titletextonly">
                <?php echo $sqlRow['title']; ?>
            </span>
        </span>
    </h2>
        
    <section class="userbody">
        <section id="postingbody">
            <?php  echo $sqlRow['body']; ?>
        </section>

        <ul class="notices">
            <li>Principals only. Recruiters, please don't contact this job poster.</li>
            <li>do NOT contact us with unsolicited services or offers</li>
        </ul>

        <div class="postinginfos">
            <p class="postinginfo">
                <?php echo "Post ID: " . $sqlRow['postID']; ?> 
            </p>
            <p class="postinginfo reveal" style="opacity: 1;">
                posted: 
                <time class="date timeago" datetime="2018-04-01T08:38:41-0700" title="2018-04-01  8:38am">
                    about an hour ago
                </time>
            </p>
            <p class="postinginfo reveal" style="opacity: 1;">
                updated: 
                <time class="date timeago" datetime="2018-04-01T08:40:03-0700" title="2018-04-01  8:40am">
                    about an hour ago
                </time>
            </p>
        </div>

        <?php          
            }
            mysqli_close($list);
        ?>
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
</section>
</body>
</html>