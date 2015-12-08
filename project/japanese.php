<?php
$url = "japanese.php";
$title = "Cath's Musings - Japanese Media";
require_once("common.php");
	if(isset($_SESSION["username"]))
		{
			 if($_SESSION["username"] == "admin")
			{
				$remove = "Delete";
				$action = "deleteComment";
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
	<h1>Japanese Media</h1>
	<p>Even though I'm a huge fan of Korean Dramas (and some movies), I have watched and enjoyed several Japanese dramas and films. For that reason, I felt that I couldn't exclude them from my list.<br><br>
	Consider this list, like the others, as incomplete. I will be adding more Japanese dramas and films as I watch and enjoy more series.</p>
<?php 

$dramas = verticalPosters("japdramas.txt","Japanese Dramas");
$films = verticalPosters("japfilms.txt","Japanese Films");

echo $dramas;
echo $films;

echo "<h2>Visitor Comments: </h2>";
$visitorComments = displayComments("jpagecomments.txt", $url,$action,$remove);

?>
	<form method="POST" action="japanese.php">
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
			
			addComment("jpagecomments.txt", implode("|",$visitorComment) . "\r\n");
			
			header("Location: japanese.php");
			
			}
			
	else if(isset($_POST["spam"]))
			{
				$visitorComments = readLines("jpagecomments.txt");
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
					header("Location: japanese.php");
					
				}
			} else if(isset($_POST["deleteComment"]))
			{
		
						deleteLine("jpagecomments.txt", $_POST["deleteComment"]);
						setrawcookie("flash", base64_encode("Comment has been deleted."), time() + (5 * 60));
				
						header("Location: japanese.php");
					
				
			}
			}