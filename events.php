<?php

$url = "events.php";
$remove = "Remove";
require_once("common.php");
if($_SERVER["REQUEST_METHOD"] == "GET")
{
			require_once("header.php");
$events = readLines("events.txt");
$yourEvents = readLines($uniqueIDFilename);
?>
<h3>Current Events:</h3>
<ul>
<?php
foreach($events as $eventIndex => $event)
{$needle = $event;
	$event = explode("|", $event);
	echo "<li>{$event[0]} - {$event[1]}";
if(!in_array($needle, $yourEvents))
{ 
	?>
		<form action="events.php" method="POST">
			<input type="hidden" name="addEvent" value="<?php  echo $eventIndex; ?>">
			<button type="submit" >Add to List</button>
		</form>
		</li>
<?php
}
}
echo "</ul>";
?>
<h3>Your List:</h3>
<?php

echo displayList($uniqueIDFilename, $url, $remove);

	?>
	
		<form action="events.php" method="POST">
			<button name="clearList" type="submit" >Clear List</button>
		</form>
<p>You can also <a href="mail.php">email this list</a> to yourself or any friend with a Winthrop email address.</p>
	<?php
require_once("footer.php");
}
else if($_SERVER["REQUEST_METHOD"] == "POST")
{

	if(isset($_POST["addEvent"]))
	{
		 $events =  readLines("events.txt");
		if(isset($events[$_POST["addEvent"]]))
		{
			$event = $events[$_POST["addEvent"]];
			$event = explode("|", $event);
			
			appendLine($uniqueIDFilename, implode("|",$event));
			
		
		
		setrawcookie("flash", base64_encode("You successfully added the event to your list."), time() + (5 * 60));
		
		header("Location: events.php");
	}
	} else if(isset($_POST["deleteEvent"]))
	{
		
		deleteLine($uniqueIDFilename, $_POST["deleteEvent"]);
		setrawcookie("flash", base64_encode("You successfully deleted the event from your list."), time() + (5 * 60));
				
		header("Location: events.php");

} else if(isset($_POST["clearList"]))
	{
		
		deleteFile($uniqueIDFilename);
		setrawcookie("flash", base64_encode("You successfully cleared your list."), time() + (5 * 60));
				
		header("Location: events.php");

}
}