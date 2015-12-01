<?php

$url = "admin.php";
require_once("common.php");
if($_SESSION["username"] != "admin")
{
	header("Location: login.php");
}
//require_once("header.php");

if($_SERVER["REQUEST_METHOD"] == "GET")
{
			require_once("header.php");
$events = readLines("events.txt");
?>
<h3>Current Events:</h3>
<?php

echo displayList("events.txt", $url);
?>
<br>
<h3>Add Event:</h3>
<form action="admin.php" method="POST">
	<table id="eventTable">
		<tr><td>
			<label>
				Event Name: <input type="text" name="eventName">
			</label>
		</td></tr>
		<br>
		<tr><td>
			<label>
				Event Location: <input type="text" name="eventLocation">
			</label>
		</td></tr>
		<tr><td><button type="submit">Submit</button></td></tr>
		
		</table>
	</form>
	
<?php
require_once("footer.php");
}
else if($_SERVER["REQUEST_METHOD"] == "POST")
{

	if(isset($_POST["deleteEvent"]))
	{
		
		deleteLine("events.txt", $_POST["deleteEvent"]);
	setrawcookie("flash", base64_encode("You've successfully deleted the event."), time() + (5 * 60));
				
		header("Location: admin.php");
		
	}
	else if(isset($_POST["eventName"]))
	{
		$event = array();
		 
		
		$event[] = $_POST["eventName"];
		$event[] = $_POST["eventLocation"];
		
		appendLine("events.txt", implode("|",$event) . "\r\n");
		
		setrawcookie("flash", base64_encode("You've successfully added the event."), time() + (5 * 60));
		
		header("Location: admin.php");
	}
	}

