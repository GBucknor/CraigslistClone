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
                        <a href="#">vancouver, BC</a>
                    </p>
                </li>
            </ul>
        </nav>
        <span class="linklike show-wide-header">...</span>
    </header>
    
    
    <nav id="topban" class="regular">
        <div class="regular-area">
            <h2 class="area">vancouver, BC</h2>
            <ul class="sublinks">   
                <li><a href="#" title="vancouver">van</a></li>
                <li><a href="#" title="north shore">nvn</a></li>
                <li><a href="#" title="burnaby/newwest">bnc</a></li>
                <li><a href="#" title="delta/surrey/langley">rds</a></li>
                <li><a href="#" title="tricities/pitt/maple">pml</a></li>
                <li><a href="#" title="richmond">rch</a></li>
            </ul>   
        </div>

        <div class="enter-area">
            <input type="text" class="subarea-input flatinput" data-autocomplete="subarea" value="">
        </div>
        <div class="custom-area no-name">
            <h2 class="area"></h2>
            <div class="radius-info">
                within <span class="distance"></span> mi of <span class="postal"></span>
            </div>
            <div class="exit-subarea">×</div>
        </div>
    </nav>
    
       <div id="leftbar">
            <div id="logo">
                <a href="https://www.craigslist.org/about/sites">craigslist</a>
                <sup><a href="https://www.craigslist.org/about/sites#CA">ca</a></sup>
           </div>
           
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
    </div>
    
    
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
<li><a href="postListing.php?id=therapeutic" class="ths" data-cat="ths"><span class="txt">therapeutic<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=travelvac" class="trv" data-cat="trv"><span class="txt">travel/vac<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=writeedtran" class="wet" data-cat="wet"><span class="txt">write/ed/tran<sup class="c"></sup></span></a></li>
</ul>
</div>
</div>
    
    
        </div>
        <div class="housing">         
        <div id="hhh" class="col">
        <h4 class="ban"><a href="#" class="hhh" data-alltitle="all housing" data-cat="hhh"><span class="txt">housing<sup class="c"></sup></span></a></h4>
        <div class="cats">
        <ul id="hhh0">
<li><a href="postListing.php?id=aptshousing" class="apa" data-cat="apa"><span class="txt">apts / housing<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=houseswap" class="swp" data-cat="swp"><span class="txt">housing swap<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=housingwanted" class="hsw" data-cat="hsw"><span class="txt">housing wanted<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=officecom" class="off" data-cat="off"><span class="txt">office / commercial<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=parking" class="prk" data-cat="prk"><span class="txt">parking / storage<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=realsale" class="rea" data-cat="rea"><span class="txt">real estate for sale<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=roomsshare" class="roo" data-cat="roo"><span class="txt">rooms / shared<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=roomswant" class="sha" data-cat="sha"><span class="txt">rooms wanted<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=#" class="sub" data-cat="sub"><span class="txt">sublets / temporary<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=vacrentals" class="vac" data-cat="vac"><span class="txt">vacation rentals<sup class="c"></sup></span></a></li>
</ul>
</div>
</div>
            

        <div id="sss" class="col">
        <h4 class="ban"><a href="#" class="sss" data-alltitle="all for sale" data-cat="sss"><span class="txt">for sale<sup class="c"></sup></span></a></h4>
        <div class="cats">
        <ul id="sss0" class="left">
<li><a href="postListing.php?id=antiques" class="ata" data-cat="ata"><span class="txt">antiques<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=appliances" class="ppa" data-cat="ppa"><span class="txt">appliances<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=artscraft" class="ara" data-cat="ara"><span class="txt">arts+crafts<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=arvutv" class="sna" data-cat="sna"><span class="txt">atv/utv/sno<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=autoparts" class="pta wta" data-cat="pta wta"><span class="txt">auto parts<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=aviation" class="baa" data-cat="baa"><span class="txt">baby+kid<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=barter" class="bar" data-cat="bar"><span class="txt">barter<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=beautyhlth" class="haa" data-cat="haa"><span class="txt">beauty+hlth<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=bikes" class="bia bip" data-cat="bia bip"><span class="txt">bikes<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=boats" class="boo bpa" data-cat="boo bpa"><span class="txt">boats<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=books" class="bka" data-cat="bka"><span class="txt">books<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=businesssale" class="bfa" data-cat="bfa"><span class="txt">business<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=carstruck" class="cta" data-cat="cta"><span class="txt">cars+trucks<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=cdsdvd" class="ema" data-cat="ema"><span class="txt">cds/dvd/vhs<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=cellphones" class="moa" data-cat="moa"><span class="txt">cell phones<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=clothesacc" class="cla" data-cat="cla"><span class="txt">clothes+acc<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=collectibles" class="cba" data-cat="cba"><span class="txt">collectibles<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=computerssale" class="sya syp" data-cat="sya syp"><span class="txt">computers<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=electronics" class="ela" data-cat="ela"><span class="txt">electronics<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=farmsales" class="gra" data-cat="gra"><span class="txt">farm+garden<sup class="c"></sup></span></a></li>
</ul>
<ul id="sss1" class="mc">
<li><a href="postListing.php?id=free" class="zip" data-cat="zip"><span class="txt">free<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=furniture" class="fua" data-cat="fua"><span class="txt">furniture<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=garagessale" class="gms" data-cat="gms"><span class="txt">garage sale<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=general" class="foa" data-cat="foa"><span class="txt">general<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=heavyequip" class="hva" data-cat="hva"><span class="txt">heavy equip<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=household" class="hsa" data-cat="hsa"><span class="txt">household<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=jewelry" class="jwa" data-cat="jwa"><span class="txt">jewelry<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=materials" class="maa" data-cat="maa"><span class="txt">materials<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=motorcycles" class="mca mpa" data-cat="mca mpa"><span class="txt">motorcycles<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=musicinstr" class="msa" data-cat="msa"><span class="txt">music instr<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=photovid" class="pha" data-cat="pha"><span class="txt">photo+video<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=rvscamp" class="rva" data-cat="rva"><span class="txt">rvs+camp<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=sporting" class="sga" data-cat="sga"><span class="txt">sporting<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=tickets" class="tia" data-cat="tia"><span class="txt">tickets<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=tools" class="tla" data-cat="tla"><span class="txt">tools<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=toygames" class="taa" data-cat="taa"><span class="txt">toys+games<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=trailers" class="tra" data-cat="tra"><span class="txt">trailers<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=videogaming" class="vga" data-cat="vga"><span class="txt">video gaming<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=wantedsales" class="waa" data-cat="waa"><span class="txt">wanted<sup class="c"></sup></span></a></li>
</ul>
</div>
</div>
            
        </div>
        <div class="jobs">      
        <div id="jjj" class="col">
        <h4 class="ban"><a href="#" class="jjj" data-alltitle="all jobs" data-cat="jjj"><span class="txt">jobs<sup class="c"></sup></span></a></h4>
        <div class="cats">
        <ul id="jjj0">
<li><a href="postListing.php?id=accfinance" class="acc" data-cat="acc"><span class="txt">accounting+finance<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=adminoffice" class="ofc" data-cat="ofc"><span class="txt">admin / office<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=archeng" class="egr" data-cat="egr"><span class="txt">arch / engineering<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=artmedia" class="med" data-cat="med"><span class="txt">art / media / design<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=biotech" class="sci" data-cat="sci"><span class="txt">biotech / science<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=businessmgm" class="bus" data-cat="bus"><span class="txt">business / mgmt<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=customerserv" class="csr" data-cat="csr"><span class="txt">customer service<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=education" class="edu" data-cat="edu"><span class="txt">education<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=foodbev" class="fbh" data-cat="fbh"><span class="txt">food / bev / hosp<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=generallab" class="lab" data-cat="lab"><span class="txt">general labor<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=govern" class="gov" data-cat="gov"><span class="txt">government<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=humanres" class="hum" data-cat="hum"><span class="txt">human resources<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=interteng" class="eng" data-cat="eng"><span class="txt">internet engineers<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=paralegal" class="lgl" data-cat="lgl"><span class="txt">legal  /  paralegal<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=manufacture" class="mnu" data-cat="mnu"><span class="txt">manufacturing<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=marketing" class="mar" data-cat="mar"><span class="txt">marketing / pr / ad<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=medicaljob" class="hea" data-cat="hea"><span class="txt">medical / health<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=nonprofit" class="npo" data-cat="npo"><span class="txt">nonprofit sector<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=estatejob" class="rej" data-cat="rej"><span class="txt">real estate<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=wholesale" class="ret" data-cat="ret"><span class="txt">retail / wholesale<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=salejob" class="sls" data-cat="sls"><span class="txt">sales / biz dev<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=salonjob" class="spa" data-cat="spa"><span class="txt">salon / spa / fitness<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=securityjob" class="sec" data-cat="sec"><span class="txt">security<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=skilltrade" class="trd" data-cat="trd"><span class="txt">skilled trade / craft<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=software" class="sof" data-cat="sof"><span class="txt">software / qa / dba<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=netjob" class="sad" data-cat="sad"><span class="txt">systems / network<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=techjob" class="tch" data-cat="tch"><span class="txt">technical support<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=transjob" class="trp" data-cat="trp"><span class="txt">transport<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=tvjob" class="tfr" data-cat="tfr"><span class="txt">tv / film / video<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=webjob" class="web" data-cat="web"><span class="txt">web / info design<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=writejob" class="wri" data-cat="wri"><span class="txt">writing / editing<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=ETC" class="etc" data-cat="etc"><span class="txt">[ETC]<sup class="c"></sup></span></a></li>
<li><a href="postListing.php?id=partime"><span class="txt">[ part-time ]<sup class="c"></sup></span></a></li>
</ul>
</div>
</div>
    
    
</div>
</div>
        
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
    
</div>
</body>
</html>