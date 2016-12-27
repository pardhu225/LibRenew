<?php session_start(); ?>
<?php
if(!isset($_SESSION['loginStatus']) || $_SESSION['loginStatus']===0)
{
	echo "<script>window.location.assign('index.php?q=2');</Script>";
	die;
}

$conn = new mysqli("127.0.0.1","root","","librenew");

$sql ='SELECT bookTitle,issueDate FROM issued WHERE username="'.$_SESSION['username'].'" ORDER BY issueDate DESC';
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
						<tr class="headTable"><th>Title</th></tr>
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
									echo '<tr class="even"><td>'.$row['bookTitle'].'</td></tr>';
								else
									echo '<tr class="odd"><td>'.$row['bookTitle'].'</td></tr>';
							}
						}
						?>
					</table>
				</div>
				<div class="displayItem">
					Books yet to be returned:	
					<table>
						<tr class="headTable"><th>Title</th><th>Due</th></tr>
						<?php
						$res = $conn->query('SELECT bookTitle AS title,issueDate AS date FROM issued WHERE returned=0 AND username="'.$_SESSION['username'].'" ORDER BY date DESC');
						if($conn->error)
							echo "MYSQL ERROR";
						if($res->num_rows===0)
							echo "You havent taken any books yet";
						else {
							for($i=0;$i<$res->num_rows;$i++)
							{
								$row = $res->fetch_array(MYSQL_ASSOC);
								$issueDate = strtotime($row['date']);
								$c= new DateTime();
								$curr = $c->getTimestamp();
								$diff = ($curr - $issueDate)/86400;
								$curr = $issueDate+(7*86400);
								if($diff<7 && $diff>=5)
									echo "<tr class='warning'><td>".$row['title']."</td>"."<td>".date("d-m-Y",$curr)."</td>"."</tr>";
								else if($diff>=7)
									echo "<tr class='overdue'><td>".$row['title']."</td>"."<td>".date("d-m-Y",$curr)."</td>"."</tr>";
								else
									echo "<tr class='normal'><td>".$row['title']."</td>"."<td>".date("d-m-Y",$curr)."</td>"."</tr>";
							}
						}
						
						?>
					</table>
				</div>
			</div>
		
		<nav>
			<a href="#" class="nav_item">Home</a>
			<a href="#" class="nav_item">About us</a>
			<a href="#" class="nav_item">Contact us</a>
			<a href="#" class="nav_item">Another nav item</a>
			<a href="checklogin.php?q=1" class="nav_item" style="float:right">Logout</a>
			<a href="#" class="nav_item" style="float:right">Date: <?php echo date("d-m-Y");?></a>
		</nav>
	</body>
</html>