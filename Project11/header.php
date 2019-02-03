<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel = "stylesheet" type="text/css" href="styler1.css">
	<link rel = "stylesheet" type="text/css" href="styler2.css">
	<link rel = "stylesheet" type="text/css" href="styler3.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link rel = "javascript" href = "action.js">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
		<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
</head>

<body>
	<header>
		<div id = "logo">
				<a href = "Index.php">
				<img src="Natural-Logo200x150.png">
			</a>
			</div>
		<nav>
				<ul>
					<li><div class = "lst lst1"><a href = "Index.php">Home</a></div></li>
					<li><div class = "lst"><a href = "#">About</a></div></li>
					<li><div class = "lst"><a href = "#">Contact</a></div></li>
						<?php
							if(isset($_SESSION['u_name'])){
							echo 'Hey '.$_SESSION["u_name"].'!'; 
							echo '<li><form action = "includes/logout.inc.php"
							method = POST><button class = "bttns" id = "lo" type = "submit" name = "lout-submit">Logout</button></form></li>'
							;
						}
							else{
								echo '<li onclick="pop()"><div class = "lst"><a href = "#">Login</a></div></li>';
							
							}
		       			?>	
		       		<script type="text/javascript">
	function pop(){
		document.getElementById('id01').style.display = 'block';
	}
</script>
		       	</ul>
		</nav>		
	</header>
		
		