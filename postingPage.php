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

<h2>Individual Posting Testing</h2>

<form action="postingScript.php" method="post">
    Title:<br>
    <input type="text" name="title">
    <br>
    Specific Location<br>
    <input type="text" name="specLoc">
    <br>
    Category:
    <?php
        // Connecting to the database
        $list = connect();
    
        $sql = "SELECT
            catID,
            catName
        FROM
            Categories";
    
        $rows = mysqli_query($list, $sql);
        echo "<select>";
        while($row = mysqli_fetch_assoc($rows))
        {
            echo "<option value=" . $row['catID'] . ">" . $row['catName'] . "</option>";
        }
        echo "</select>"; 
    ?>
    <br>
    Postal Code:<br>
    <input type="text" name="postal">
    <br>
    Contact Option<br>
    <input type="radio" name="phoneOp" value="call"> Call<br>
    <input type="radio" name="phoneOp" value="text"> Text<br>
    Phone Number:<br>
    <input type="text" name="phone">
    <br>
    Contact Name:<br>
    <input type="text" name="contact">
    <br>
    Body:<br>
    <textarea name="Text1" cols="50" rows="15"></textarea>
    <br><br>
    <input type="submit" name="submit" value="Post">
</form> 

</body>
</html>