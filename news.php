<?php
$title = "Lab 7 - News";

require_once("header.php");
require_once("common.php");
$articles = readLines("articles.txt");
?>
<h1>Welcome to The Times!</h1>
<br>
<a href="index.php">Home</a>
<br>
<br>
<?php 
if($_SERVER["REQUEST_METHOD"] == "GET")
{

	if(isset($_GET["id"]))		
	{
//	$article = (int) $_GET["id"];
		if(isset($articles[$_GET["id"]]))

		$views[] = (int)$_GET["id"];

		setrawcookie("views", base64_encode(implode(",", $views)), time() +  60*60*24);
		
			
			foreach ($articles[$_GET["id"]] as $position => $article)
			{
			if ($position == 0)
				{$title = $article;}
			if ($position == 1)
				{$articleBody = $article;}
			}
			
			echo "<b>$title</b>";
			echo "<br>";
			echo "<br>";
			echo $articleBody;

		}

?>
			<br>
			<br>
			<a href='index.php'>Back to Home!</a>
<?php
		 
}
require_once("footer.php");
