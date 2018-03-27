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

<h2>Category Page Testing</h2> 
    
<?php
    // Connecting to the database
    $list = connect();
    
        $sql = "SELECT
                catID,
                catName
            FROM
                Categories";
    
    $row = mysqli_query($list, $sql);

    while($sqlRow = mysqli_fetch_assoc($row))
    {
        echo "<a href='postListing.php?id='" . $sqlRow['catID'] . ">".$sqlRow['catName']."</a><br>";
    }
    mysqli_close($list);
?>

</body>
</html>