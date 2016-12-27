<?php
session_start();
if(!isset($_SESSION['loginStatus']) || $_SESSION['loginStatus']==0)
{
	echo "<script>window.location.assign('index.php');</script>";
	die;
}
if(!isset($_GET['book']))
{
	echo "access denied";
	die;
}
$conn = new mysqli("127.0.0.1","root","","librenew");

$sql = 'UPDATE issued SET issueDate=ADDDATE(issueDate,7) WHERE bookTitle="'
				.$_GET['book'].'" AND username="'.$_SESSION['username'].'" AND issueDate>ADDDATE(NOW(),-7)';
$conn->query($sql);
if($conn->error)
	echo "MYSQL ERROR";
else {
	echo "<script>window.location.assign('dashboard.php');</script>";
}
