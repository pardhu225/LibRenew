<?php session_start(); ?>
<?php
if()
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div style="height:38px">This is just a clearance area for the navigation bar</div>
		<div>
			<img src="student_img.jpg" alt="Your photo."
			 style="height: 100px; min-width: 80px;float:left;">
			Student Name:<br><br>
			Roll no:
			<div style="clear:both"></div>
		</div>
			<div id="displayContainer">
				<div class="displayItem">
					History:
					<table>
						<tr><th>Title</th></tr>
						<tr class="even"><td>HC Verma</td></tr>
						<tr class="odd"><td>RD Sharma</td></tr>
					</table>
				</div>
				<div class="displayItem">
					Books taken:
					<table>
						<tr><th>Title</th><th>Due</th></tr>
						<!-- TODO complete the method-->
						<tr class="even"><td>Selena</td><td>tomorrow<img style="float:right;height:20px;width:20px"src="img/renew.jpg" onclick=""></td></tr>
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