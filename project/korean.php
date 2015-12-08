<?php
$url = "korean.php";
$title = "Cath's Musings - Korean Media";
require_once("common.php");

if(isset($_SESSION["username"]))
	{
		 if($_SESSION["username"] == "admin")
		{
			$remove = "Delete";
			$action = "deleteComment";
		} else{
			$remove = "Mark as spam";
	    	$action = "spam";
		}
	}  else
	 	{
	 		$remove = "Mark as spam";
	    	$action = "spam";
		}

if($_SERVER["REQUEST_METHOD"] == "GET")
{
			require_once("header.php");

?>
	<h1>Korean Media</h1>
	<p>This page is primarily devoted to my favorite Korean dramas and films. At this moment, there are only a few items present and this list is definitely incomplete. As I get the opportunity, I will not only be adding more of my favorite series in the future, but guest
	bloggers will also have the opportunity to add their favorite series to the mix.<br><br>
	Right now, each posted item has a summary, a rating, and an explanation of why I like said series/movie. This is because there are tons of series that I like even though I know it's bad.
	</p>
<?php 

$dramas = horizontalPosters("kordramas.txt","Korean Dramas");
$films = verticalPosters("korfilms.txt", "Korean Films");

echo $dramas;
echo $films;

echo "<h2>Visitor Comments: </h2>";
$visitorComments = displayComments("kpagecomments.txt", $url, $action, $remove);

?>
	<form method="POST" action="korean.php">
	<table>
		<caption>Add Comments:</caption>
		<tr><td>
			<label>
				Visitor Name: <input type="text" name="visitorName" required="required">
			</label>
		</td></tr>
		<br>
		<tr><td>
			<label>
				<textarea name="visitorComments" cols="50" rows="5"></textarea>
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
			
			if(isset($_POST["visitorName"]))
			{
			$visitorComment = array();
			 
			
			$visitorComment[] = $_POST["visitorName"];
			$visitorComment[] = $_POST["visitorComments"];
			
			addComment("kpagecomments.txt", implode("|",$visitorComment) . "\r\n");
			
			header("Location: korean.php");
			
			}
			
	else if(isset($_POST["spam"]))
			{
				$visitorComments = readLines("kpagecomments.txt");
				if(isset($visitorComments[$_POST["spam"]]))
				{
					$visitorComment = $visitorComments[$_POST["spam"]];
					$visitorComment = explode("|", $visitorComment);
					
					$from = "do-not-reply@winthrop.edu";
					$subject = "Visitor's comment marked as Spam";
					
					$message = "<ol><li>";
					
					$message .= "<ul><li>Spam author: {$visitorComment[0]}</li>";
					$message .= "<li>Spam body: {$visitorComment[1]}</li></ul>";
					
					$message .= "</li></ol>";
					
					$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= "From: $from";
					
					mail("guilbaudc2@winthrop.edu", $subject, $message, $headers);	
					
					setrawcookie("flash", base64_encode("Message marked as Spam."), time() + (5 * 60));
					header("Location: korean.php");
					
				}
			} else if(isset($_POST["deleteComment"]))
			{
		
						deleteLine("kpagecomments.txt", $_POST["deleteComment"]);
						setrawcookie("flash", base64_encode("Comment has been deleted."), time() + (5 * 60));
				
						header("Location: korean.php");
					
				
			}
		}