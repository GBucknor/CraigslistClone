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
<p>testdsfsdf</p>
    
<?php
    // Connecting to the database
    $list = connect();
    $row = mysqli_query($list, $sql);

    if($row){
        while($sqlRow = mysqli_fetch_assoc($row))
        {
              echo '<a href="individualPost.php?id=' . $sqlRow['title'] . '">' . $sqlRow['title'] . "</a><br>";
           // echo '<h3><a href="individualPist.php?id=' . $row['postID'] . '">' . $row['title'] . '</a><h3>';
        }
    } else {
        echo "Nothing here";
    }

    mysqli_close($list);
?>

</body>
</html>