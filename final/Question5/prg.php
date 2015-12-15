<!DOCTYPE html>
<html>
<head>
	<title>Post-Redirect-Get</title>
</head>
<body>
	
<p>The Post-Redirect-Get is an HTTP POST problem often arises when people refresh their browsers on a POST request.
	What ends up happening is that the information is likely to be sent more than once. This often happens when a person 
	is ordering	something online and their payment information sends more than once if they keep refreshing the page. By
	refreshing the page, information continues to get posted to the page, so transactions keep getting sent, the same image
	will continue to be uploaded, the same information keeps getting sent.
	<br>
	<br>
	To solve that, we can use the PHP header function in order to send the person back to same page, but it will make
	the request a GET Request instead. This	very easily solves the problem.
	<br>
	<br>
	The exact notation would be:<br>
	header("Location: pageNameHere.php");</p>
</body>