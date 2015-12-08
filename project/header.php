<!DOCTYPE html>
<html lang="en">
<head>
<!-- 
   F15-CSCI241
   Final Project

   Author: Cathy Guilbaud

-->
<title><?php echo isset($title) ? $title : "Cath's Musings"; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="project.css">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
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
			echo "<h2>". base64_decode($_COOKIE["flash"]) . "</h2>";
			setrawcookie("flash", "", time() - 60*60*24 );
		}
?>	
	<header>
		<h1 id="top">Cath's Musings</h1>
	</header>
	<nav id="nav">
		<ul>
<?php

if(!isset($_SESSION["username"]))
	{
?>
			<li><a href="index.php">Home</a></li>
			<li><a href="korean.php">Korean</a></li>
			<li><a href="japanese.php">Japanese</a></li>
			<li><a href="resources.php">Resources</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
</nav>
	
<?php
	} else
		{ if($_SESSION["username"] == "admin")
		{
?>
			<li><a href="index.php">Home</a></li>
			<li><a href="korean.php">Korean</a></li>
			<li><a href="japanese.php">Japanese</a></li>
			<li><a href="resources.php">Resources</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="guestBlogger.php">Blogger</a></li>
			<li><a href="admin.php">Admin</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
</nav>
	
<?php
		} else if($_SESSION["username"] == "blogger")
		{
?>
			<li><a href="index.php">Home</a></li>
			<li><a href="korean.php">Korean</a></li>
			<li><a href="japanese.php">Japanese</a></li>
			<li><a href="resources.php">Resources</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="guestBlogger.php">Blogger</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
</nav>
<?php
		}
		
		}
?>
	<div id="rightcol">
		<img src="images/snoopy.png" height="125" width="100" alt="Site Logo">
		<h3>Recently Finished:</h3>
			<ul>
				<li>Producers</li>
			</ul>
				<h3>All Time Favorites:</h3>
			<ul>				
				<li>City Hunter</li>
				<li>Dream High (1 & 2)</li>				
				<li>Misaeng</li>
				<li>Stars Falling from the Sky</li>
				<li>The Princess' Man</li>
				<li>The Greatest Love</li>
				<li>Ugly Alert</li>
				<li>What Happens to My Family</li>
			</ul>
	</div>
	<main>