<?php
$title = "Lab 7 - Index";

if($_SERVER["REQUEST_METHOD"] == "GET")
{	
	$page = "views";
	$views[] = $page;
		setrawcookie($page, base64_encode(implode(",", $views)), time() +  60*60*24);
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
$count = 0;
foreach($articles as $pos => $article)
{
	if($count < 3)
	{echo "<a href='news.php?id=$pos'>$article[0]</a>";
	echo "<br>";
	echo "<br>";
	$articleTeaser = substr($article[1],0,175);
	echo $articleTeaser ."...";
	echo "<br>";
	echo "<br>";
}
	else
	{	echo "<a href='news.php?id=$pos'>$article[0]</a>";
	echo "<br>";
	echo "<br>";
	}
	$count++;
		 
		
}

}
require_once("footer.php");
