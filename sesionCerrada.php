<?php 
	session_start();
	include_once('db/DB.php');
	unset($_SESSION['user']);
	header('location:index.php');
 ?>