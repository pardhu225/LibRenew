<?php

session_start();
if(!isset($_SESSION['loginStatus']))
{
	if(!isset($_POST['username']))
	{
		echo "<script>window.location.assign('index.php?q=2');</script>";
		die();
	}
	
	$conn = new mysqli("127.0.0.1","root","","librenew");
	if(!$conn)
		die("Couldnt connect to the database");
	
	$sql = 'SELECT * FROM users WHERE username="'.$_POST['username'].'" AND password="'.$_POST['password'].'"';
	
	$res = $conn->query($sql);
	if($res === null || $res->num_rows===0)
	{
		echo "<script>window.location.assign('index.php?q=1');</script>";
		die();
	}
	else
	{
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['loginStatus'] = 1;
		echo "<script>window.location.assign('dashboard.php');</script>";
	}
}
else 
if($_SESSION['loginStatus']==0)
{
	echo "<script>window.location.assign('index.php?q=3');</script>";
}
else
{
	echo "<script>window.location.assign('dashboard.php');</script>";
}
?>