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
        <link rel="stylesheet" href="CSS/index.css" type="text/css">
        <link rel="stylesheet" href="CSS/Base.css" type="text/css">
    </head>
    
<body class="homepage en desktop w1024"> 
<div class="wrapper">
<section class="page-container">
    
    <div class="bglogo"></div>
        
    <header class="global-header wide">
        <a class="header-logo" name="logoLink" href="/">CL</a>
        <nav class="breadcrumbs-container">
            <ul class="breadcrumbs">
                <li class="crumb area">
                    <p>
                        <a href="/">vancouver, BC</a>
                    </p>
                </li>
            </ul>
        </nav>
        <span class="linklike show-wide-header">...</span>
    </header>
    
    <?php
        if (isLoggedin()) {
            echo $_SESSION["user"];
            echo '<li><a href="logout.php">Logout</a></li>';
        } else {
            echo '<a href="userlogin.php">Login</a>';
        }
    ?>

    <h2>Category Page Testing</h2> 
    
    <?php
        if (isLoggedin()) {
            echo '<a href="postingPage.php">Post your listing!</a>';
            echo '<br><br>';
        }
    ?>
    
    <?php
        // Connecting to the database
        $list = connect();

            $sql = "SELECT
                        catName
                    FROM
                        Categories";

        $row = mysqli_query($list, $sql);

        while($sqlRow = mysqli_fetch_assoc($row))
        {
            echo '<a href="postListing.php?id=' . $sqlRow['catName'] . '">' . $sqlRow['catName'] . '</a><br>';
        }
        mysqli_close($list);
    ?>
    
<div id="center">
<div class="community">
                
<div id="ccc" class="col">
<h4 class="ban"><a href="#" class="ccc" data-alltitle="all community" data-cat="ccc"><span class="txt">community<sup class="c"></sup></span></a></h4>
<div class="cats">
<ul id="ccc0" class="left">
<li><a href="postListing.php?id=activities" class="act" data-cat="act"><span class="txt">activities<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=artists" class="ats" data-cat="ats"><span class="txt">artists<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=childcare" class="kid" data-cat="kid"><span class="txt">childcare<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=classes" class="cls" data-cat="cls"><span class="txt">classes<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=events" class="eve" data-cat="eve"><span class="txt">events<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=general" class="com" data-cat="com"><span class="txt">general<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=groups" class="grp" data-cat="grp"><span class="txt">groups<sup class="c"></sup></span></a></li>
</ul>
<ul id="ccc1" class="mc">
<li><a href="postListing.php?id=localnews" class="vnn" data-cat="vnn"><span class="txt">local&nbsp;news<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=lostfound" class="laf" data-cat="laf"><span class="txt">lost+found<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=musicians" class="muc" data-cat="muc"><span class="txt">musicians<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=pets" class="pet" data-cat="pet"><span class="txt">pets<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=politics" class="pol" data-cat="pol"><span class="txt">politics<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=rideshare" class="rid" data-cat="rid"><span class="txt">rideshare<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=volunteers" class="vol" data-cat="vol"><span class="txt">volunteers<sup class="c"></sup></span></a></li>
</ul>
</div>
</div>
    
        <div id="bbb" class="col">
        <h4 class="ban"><a href="#" class="bbb" data-alltitle="all services" data-cat="bbb"><span class="txt">services<sup class="c"></sup></span></a></h4>
        <div class="cats">
        <ul id="bbb0" class="left">
<li><a href="#" class="aos" data-cat="aos"><span class="txt">automotive<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=beauty" class="bts" data-cat="bts"><span class="txt">beauty<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=cellmobile" class="cms" data-cat="cms"><span class="txt">cell/mobile<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=computer" class="cps" data-cat="cps"><span class="txt">computer<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=creative" class="crs" data-cat="crs"><span class="txt">creative<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=cycle" class="cys" data-cat="cys"><span class="txt">cycle<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=events" class="evs" data-cat="evs"><span class="txt">event<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=farmgarden" class="fgs" data-cat="fgs"><span class="txt">farm+garden<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=financial" class="fns" data-cat="fns"><span class="txt">financial<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=household" class="hss" data-cat="hss"><span class="txt">household<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=labormove" class="lbs" data-cat="lbs"><span class="txt">labor/move<sup class="c"></sup></span></a></li>
</ul>
<ul id="bbb1" class="mc">
<li><a href="postListing.php?id=legal" class="lgs" data-cat="lgs"><span class="txt">legal<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=lessons" class="lss" data-cat="lss"><span class="txt">lessons<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=marine" class="mas" data-cat="mas"><span class="txt">marine<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=pet" class="pas" data-cat="pas"><span class="txt">pet<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=realestate" class="rts" data-cat="rts"><span class="txt">real estate<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=skilledtrade" class="sks" data-cat="sks"><span class="txt">skilled trade<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=smbizads" class="biz" data-cat="biz"><span class="txt">sm biz ads<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=travelvac" class="ths" data-cat="ths"><span class="txt">therapeutic<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=writeedtran" class="trv" data-cat="trv"><span class="txt">travel/vac<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=writeedtran" class="wet" data-cat="wet"><span class="txt">write/ed/tran<sup class="c"></sup></span></a></li>
</ul>
</div>
</div>
    
    
</div>
</div>
        
</section>  
</div>
</body>
</html>