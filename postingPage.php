<?php
    ob_start();
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
<body>
    <?php
        if (isLoggedin()) {
            echo $_SESSION["user"];
            echo '<li><a href="logout.php">Logout</a></li>';
        }
    ?>

    <h2>Individual Posting Testing</h2>

<form action="" method="post">
    Title<br>
    <input type="text" name="title">
    <br>
    Specific Location<br>
    <input type="text" name="specLoc">
    <br>
    Category
    <?php
        // Connecting to the database
        $list = connect();

        $sql = "SELECT
            catID,
            catName
        FROM
            Categories";

        $rows = mysqli_query($list, $sql);
        echo "<select name='category'>";
        while($row = mysqli_fetch_assoc($rows))
        {
            echo "<option value=" . $row['catName'] . ">" . $row['catName'] . "</option>";
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
   
<?php
    if(isset($_POST['submit'])) {

        $title = $_POST['title'];
        $specLoc = $_POST['specLoc'];
        $postal = $_POST['postal'];
        $phoneOp = $_POST['phoneOp'];
        $phoneNum = $_POST['phone'];
        $contact = $_POST['contact'];
        $body = $_POST['Text1'];
        $body2 = htmlentities($body, ENT_QUOTES, "UTF-8");
        $category = $_POST['category'];

        $list = connect();

        $sqlSubmit = "INSERT INTO Posting (postID, title, specLoc, postCode, body, contactOp, phoneNum, contactName, catPostID)
                      VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";

        /* creating a prepared statement */
        if ($stmt = mysqli_prepare($list, $sqlSubmit)) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "ssssssss", $title, $specLoc, $postal, $body2, $phoneOp, $phoneNum, $contact, $category);

            /* execute query */
            mysqli_stmt_execute($stmt);
            
            /* stores it in stmt */
            mysqli_stmt_store_result($stmt);

            /* Freeing memory associated with the results */
            mysqli_free_result($stmt);

            /* Closing the prepared statement */
            mysqli_stmt_close($stmt);  

            /* Redirects user to the specific category */
            redirect($title, $category);
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($list);
            die();
        }
    } 
    
    // Checking to see if we actually placed the data into the database
    function sqlCheck($list, $sql, $title, $category){
        if (!(mysqli_query($list, $sql))) {
            echo "Error: " . $sql . "<br>" . mysqli_error($list). "<br>";
            mysqli_close($list);
            die();
        } else {
            redirect($title, $category);
        }
    }
    
    // if sqlCheck function is successful it will redirect the user to the
    // post they've created
    function redirect($title, $category){
        
        $list = connect();
        
        $sql2 = "
        SELECT
            postID
        FROM
            Posting
        WHERE
            catPostID = '$category' AND title = '$title' limit 1";
        
        $results = mysqli_query($list, $sql2);

        $values = mysqli_fetch_assoc($results);
        $i = $values['postID'];
        header("Location: individualPost.php?id=$i");
        exit();
    }
?> 
</body>
</html>