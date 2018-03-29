<?php
	//Start session
	session_start();
	
	//Unsetting the variables stored in session
    unset($_SESSION['user']);

	session_write_close();

    //Sends the user home after logging out
	header("location: category.php");

	exit();
?>