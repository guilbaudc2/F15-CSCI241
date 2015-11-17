<?php
		if(isset($_COOKIE['views']))
{
		
	$cookieData = $_COOKIE['views']; 
	$decodedCookieData = base64_decode($cookieData); 
	$views = explode("," , $decodedCookieData); 
}
else
{
	$views = array();
}

if(isset($_COOKIE['pageCount']))
{
		$pageCount = ++$_COOKIE['pageCount'];
		setrawcookie("pageCount", $pageCount, time() + 60*60*24);
}
else {
		$pageCount = 1;
	setrawcookie("pageCount", $pageCount, time() + 60*60*24);
}

		setrawcookie("views", base64_encode(implode(",", $views)), time() +  60*60*24);

		?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? $title : "Lab 7!"; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="lab7.css">
<!--[if lt IE9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
</head>
<body>
	<div id="wrapper">

		
		