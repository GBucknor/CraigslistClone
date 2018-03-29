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
<body>

<h2>Posting Listing Page Testing</h2> 
    
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
    <a href="postingPage.php">Create a post!</a>

</body>
</html>