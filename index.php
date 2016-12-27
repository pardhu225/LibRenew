<!DOCTYPE html>
<html>
	<head>
		<title>index</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	
	<body>
		<div style="height: 38px">This is a clearance area for the nav bar </div>
		<div id="wrapper">
			<center>				
				<?php
				if(isset($_GET['q']))
				{
					if($_GET['q']==1)
						echo "<div class='errorbox' id='err'>Invalid username or password</div>";
					else if($_GET['q']==2)
						echo "<div class='errorbox' id='err'>You have to enter your login credentials first!</div>";
				}
				
				if(isset($_GET['q']))
				{
					if($_GET['q']==3)
						echo "<div class='msgbox' id='msg'>Successfully logged out</div>";
				}
				?>
			</center>
			
			<h3>
				Please enter your login credentials
			</h3>
			<!-- TODO Fill the attributes-->
			<form action="checklogin.php" method="post">
				<div class="form labels">
					Roll no:<br>
					Password:
				</div>
				<div class="form inputs">
					<input type="text" name="username"><br>
					<input type="password" name="password">
				</div>
				<input id="submit" type="submit" value="login">
			</form>
		</div>
		<nav>
			<a href="#" class="nav_item">Home</a>
			<a href="#" class="nav_item">About us</a>
			<a href="#" class="nav_item">Contact us</a>
			<a href="#" class="nav_item">Another nav item</a>
		</nav>
	</body>
</html>
