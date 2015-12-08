<?php
$title = "Cath's Musings - Contact Form";
require_once("common.php");
if($_SERVER["REQUEST_METHOD"] == "GET")
{
			require_once("header.php");

?>
<h1>Contact Form</h1>
	<p>Hi there!<br>
	I would first just like to thank you for stopping by my blog! I really appreciate you taking the time to stop by and read all the content I put on here.
	If you would like to become a guest blogger, please fill out the following form so that I can get in contact with you at a later date about getting you started!</p><br><br>
		<form method="POST" action="contact.php">
		<fieldset>
		<legend>Your Info!</legend>
			<label>First name: <input type="text" required="required" name="name"></label><br><br>
			<label>Email: <input type="email" required="required" name="email"></label><br><br>
		</fieldset>
			<label>Age Group:</label><br>
			<input type="radio" name="ageGroup" value="teens">
			16-19<br>
			<input type="radio" name="ageGroup" value="twenties">
			20-29<br>
			<input type="radio" name="ageGroup" value="thirties">
			30-39<br>
			<input type="radio" name="ageGroup" value="forties">
			40-49<br>
			<input type="radio" name="ageGroup" value="fiftyplus">
			50+<br>

			Additional Comments:<br>
			<textarea name="addComments" cols="50" rows="5">Enter an additional comments here...</textarea>
			<br>
			<input type="submit" value="Submit"> <input type="reset">
		</form>
<?php

require_once("footer.php");
}
else if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$from = "do-not-reply@winthrop.edu";
			$to = "guilbaudc2@winthrop.edu";
			
			$message = $_POST["name"]."|";
			$message .= $_POST["email"] . "|";
			$message .= $_POST["ageGroup"] . "|";
			$message .= $_POST["addComments"];
			
			$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From: $from";

			$result = mail($to, "Contact Form", $message, $headers);	
			

			if(!$result)
			{   
     			setrawcookie("flash", base64_encode("Please try again. The form was not successfully sent."), time() + (5 * 60));  
			} 	else 
			
			{
   			 	setrawcookie("flash", base64_encode("Thank you! I will be in touch with you soon!"), time() + (5 * 60));
			}

			
			header("Location: contact.php");
			
		
		}	