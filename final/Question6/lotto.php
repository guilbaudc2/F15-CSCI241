<?php

session_start();

if(!isset($_SESSION["numbers"]))
{
$_SESSION["numbers"] = array();
}

if($_SERVER["REQUEST_METHOD"] == "GET")
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lottery</title>
</head>
<body>
</body>

<h1>Not So Lucky Lotto</h1>
<p>Similar (obviously not the same as) labs, so no luck really involved.</p>

<h2>Chosen Numbers</h2>
<ul>
	<?
	if(isset($_SESSION["numbers"]))
	{
		echo "<ul>";
		
		foreach($_SESSION["numbers"] as $numberIndex => $number)
		{
			echo "<li>$number</li>";
			?>
			<form action="lotto.php" method="POST">
				<input type="hidden" name="deleteNumber" value="<?php  echo $number; ?>">
				<button type="submit" >Delete</button>
			</form>			
			<?php
		}
		
		echo "</ul>";
		
	}
	?>
</ul>

<h2>Number Selection</h2>
<table>
<tr>
<?php
	$totalLottoNumbers = 6;
	$numbersPerRow = 3;
	
		for($ct = 1; $ct <= $totalLottoNumbers; $ct++)
		{
			echo "<td>";
			$needle = $ct;
			echo $ct;	
			if(!in_array($needle, $_SESSION["numbers"]) && count($_SESSION["numbers"]) <=5)
			{ 
?>
			<form action="lotto.php" method="POST">
				<input type="hidden" name="addNumber" value="<?php  echo $ct; ?>">
				<button type="submit" >Add</button>
			</form>
 <?php
			}

			if($ct%$numbersPerRow==0 && $ct != $totalLottoNumbers )
			{
				echo "</tr><tr>";
			}
		}
		

?>
</tr>
</table>
</html>
 <?php
} else if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["addNumber"]))
		{
			$_SESSION["numbers"][] = $_POST["addNumber"];
		
		header("Location: lotto.php");
		}else if(isset($_POST["deleteNumber"]))
		{
			//var_dump($_POST["deleteNumber"]);
			$key = $_POST["deleteNumber"];
			if(in_array($_POST["deleteNumber"], $_SESSION["numbers"]))
				{
				unset($_SESSION["numbers"][$key]);
				}
		header("Location: lotto.php");
		}
	
}


		

?>