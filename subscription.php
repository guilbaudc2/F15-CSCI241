<?php
 $title = "Lab 7 - Subscription";
require_once("header.php");
 /*?>
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
 * 
 */?>
<h1>Welcome to The Times!</h1>
<br>
<a href="index.php">Home</a>
<br>
<br>
<p>Hi there! We're glad that you stopped by the online version of The Times and hope you have enjoyed reading your 5 free articles! To enjoy the full benefits of the Times, you need to purchase a
	subscription!
	<br>
	<br>
	To subscribe, please select a subscription package and mail your payment to:
</p>
<table>
	<tr><th>The Times</th></tr>
	<tr><td>82977 Upham Point</td></tr>
	<tr><td>Fort Worth, TX 76147</td></tr>
</table>
<p>
You've already had <?php echo $pageCount ?> views on The Times and are missing out on countless articles that are being added daily! If you don't want to miss out on reading
exclusive subscriber content, subscribe today!</p>
<table>
	<tr>
		<th>24 Hour Access:</th>
		<td>$4.99</td>
	</tr>
	<tr>
		<th>1 Week Access:</th>
		<td>$11.99</td>
	</tr>
	<tr>
		<th>1 Month Access:</th>
		<td>$19.99</td>
	</tr>
	<tr>
		<th>1 Year Access:</th>
		<td>$35.99</td>
		<td>[Most Popular!]</td>
	</tr>
</table>
<?php
require_once("footer.php");