<?php session_start(); ?>
<?php
if(!isset($_SESSION['loginStatus']) || $_SESSION['loginStatus']===0)
{
	echo "<script>window.location.assign('index.php?q=2');</Script>";
	die;
}

$conn = new mysqli("127.0.0.1","root","","librenew");

$sql ='SELECT bookTitle,issueDate FROM issued WHERE username="'.$_SESSION['username'].'"';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard - LibRenew</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div style="height:38px">This is just a clearance area for the navigation bar</div>
		<div>
			<img src="students/<?php echo $_SESSION['username']?>.jpg" alt="Your photo."
			 style="height: 100px; min-width: 80px;float:left;">
			Student Name:  <?php echo $_SESSION['username']?>
			<div style="clear:both"></div>
		</div>
			<div id="displayContainer">
				<div class="displayItem">
					History:
					<table>
						<tr><th>Title</th></tr>
						<?php
						$res = $conn->query($sql);
						if($res->num_rows===0)
							echo "You have not taken any books yet";
						else
						{
							for($i=0;$i<$res->num_rows;$i++)
							{
								$row = $res->fetch_array(MYSQL_ASSOC);
								if($i%2==0)
									echo '<td class="odd">'.$row['bookTitle'].'</td>';
								else
									echo '<td class="even">'.$row['bookTitle'].'</td>';
							}
						}
						?>
					</table>
				</div>
				<div class="displayItem">
					Books yet to be returned:	
					<table>
						<tr><th>Title</th><th>Due</th></tr>
						<?php
						$res = $conn->query('SELECT bookTitle,issueDate FROM issued WHERE returned=false AND username='.$_SESSION['username']);
						
						?>
					</table>
				</div>
			</div>
		
		<nav>
			<a href="#" class="nav_item">Home</a>
			<a href="#" class="nav_item">About us</a>
			<a href="#" class="nav_item">Contact us</a>
			<a href="#" class="nav_item">Another nav item</a>
			<a href="#" class="nav_item">Logout</a>
		</nav>
	</body>
</html>