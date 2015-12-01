<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? $title : "Lab 8!"; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="lab8.css">
<!--[if lt IE9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
</head>
<body>
<div id="wrapper">
<?php
	if(isset($_COOKIE["flash"]))
		{
			echo "<h2>" .  base64_decode($_COOKIE["flash"]) .  "</h2>";
			setrawcookie("flash", "", time() - 60*60*24 );
		}
		?>	
	<h1>University Events!</h1>
	<nav id="nav">
		<ul>
		<?php
if(!isset($_SESSION["username"]))
	{
?>
		<li><a href="index.php">Home</a></li>
		<li><a href="events.php">Events</a></li>
		<li><a href="login.php">Login</a></li>
	</ul>
</nav>
	
<?php
	} else
		{ if($_SESSION["username"] == "admin")
		{

?>
	<li><a href="index.php">Home</a></li>
		<li><a href="events.php">Events</a></li>
		<li><a href="admin.php">Admin</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>
<?php
		}
		
		}
?>
		<main>
