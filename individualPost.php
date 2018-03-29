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

echo $_SERVER['PHP_SELF']."?id=".$_GET['id'];

    $results = "SELECT * 
                FROM Posting
                WHERE postID = " . $_GET['postID'];

?>

<!DOCTYPE html>
<html>
<body>

<h2>Individual Posting Page Test</h2> 
<p>testdsfsdf</p>
    
<?php
    // Connecting to the database
    $list = connect();
    $row = mysqli_query($list, $results);

    $row['title'];
    mysqli_close($list);
?>

</body>
</html>