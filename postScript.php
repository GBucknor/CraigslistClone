<?php
require_once('mysqli_connect.php');

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
        
        $sql = "INSERT INTO Posting (postID, title, specLoc, postCode, body, contactOp, phoneNum, contactName, catPostID)
        VALUES (NULL,'$title', '$specLoc', '$postal', '$body2', '$phoneOp', '$phoneNum', '$contact', '$category')";
        
        sqlCheck($list, $sql);
        
        // Closing the connection to the database
        mysqli_close($list);
        die();
    }

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

// Checking to see if we actually placed the data into the database
function sqlCheck($list, $sql){
    if (!(mysqli_query($list, $sql))) {
        echo "Error: " . $sql . "<br>" . mysqli_error($list). "<br>";
        mysqli_close($list);
        die();
    } else {
        echo "We added it to the database!";
    }
}
?>