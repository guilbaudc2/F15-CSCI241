<?php
require_once("common.php");
require_once("header.php");
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	?>
	<h2>Please enter your Username and Password:</h2>
		<form method="POST" action="login.php">
			<table>
				  <tr>
						<td>Username:<input type="text" name="username"></td>
				  </tr>
				  <tr>
						<td>Password: <input type="password" name= "password"></td>
				  </tr>
			</table>
			<button type="submit">Submit</button>
		</form>
	
	<?php
} else if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if($_POST["username"] == "admin" && $_POST["password"] == "password")
	{
		
			$_SESSION["username"] = "admin";
			header("Location: admin.php");
	} else if($_POST["username"] == "blogger" && $_POST["password"] == "iwrite")
	{
			$_SESSION["username"] = "blogger";
			header("Location: guestBlogger.php");
	}else {

		session_destroy();
		$_SESSION = array();
		session_write_close();
		header("Location: login.php");
		exit();
	}
	
}
else {
	exit("unsupported");
}

require_once("footer.php");

