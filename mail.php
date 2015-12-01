<?php

$url = "mail.php";
require_once("common.php");

if($_SERVER["REQUEST_METHOD"] == "GET")
{ require_once("header.php");
	?>
	<h2>Send email (Only for Winthrop Students, Faculty, and Staff):</h2>
		<form method="POST" action="mail.php">
			<table id="eventTable">
				  <tr>
						<td>From username (optional):</td>
						<td><input type="text" name="emailFrom"></td>
						<td>@winthrop.edu</td>
				  </tr>
				  <tr>
						<td>To username: </td>
						<td><input type="text" name= "emailTo" required></td>
						<td>@winthrop.edu</td>
				  </tr>
				  <tr>
						<td>Subject (optional):</td>
						<td><input type="text" name="subject"></td>
				  </tr>
				  <tr>
						<td >Message Body:</td>
						<td colspan="2"><?php echo messageBody($uniqueIDFilename); ?></td>
				  </tr>
			</table>
			<button type="submit">Submit</button>
		</form>
<?php
require_once("footer.php");
}
else if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$from = empty($_POST["emailFrom"]) ? "do-not-reply" : $_POST["emailFrom"];
			$from .= "@winthrop.edu";
			$to = $_POST["emailTo"] . "@winthrop.edu";
			
			$subject = empty($_POST["subject"]) ? "Scheduled Events" : $_POST["subject"]; 
			
			$eventList = readLines($uniqueIDFilename);
			
			$message = "<h3>Your Scheduled Events List:</h3>";
			$message .= "<ul>";
			
			foreach($eventList as $eventListItem)
				{
				$eventListItem = explode("|", $eventListItem);
			$message .= "<li>{$eventListItem[0]} - {$eventListItem[1]}";
				}

			$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From: $from";

			$result = mail($to, $subject, $message, $headers);	
			

			if(!$result)
			{   
     			setrawcookie("flash", base64_encode("Email was not successfully sent."), time() + (5 * 60));  
			} 	else 
			
			{
   			 	setrawcookie("flash", base64_encode("Email was sent!"), time() + (5 * 60));
			}

			
			header("Location: mail.php");
			
		
		}