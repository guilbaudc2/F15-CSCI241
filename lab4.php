<!DOCTYPE html>
<head>
<title>Lab 4</title>
<meta charset="utf-8">
<link rel="stylesheet" href="lab4.css">
<!--[if lt IE9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
</head>
<body>
		<h1>Multiplication Table</h1>
		<?php
		if($_SERVER["REQUEST_METHOD"] == "GET")
		{
			?>
		<p>Hello, and welcome to my multiplication table! Free free to enter any integer within a range of 301 digits!</p>
			    <form method="POST" action="lab4.php">
				 
			 <table>
				  <tr>
						<td>Start Value: <input type="number" name="start"></td>
				  </tr>
				  <tr>
						<td>End Value: <input type="number" name="end"></td>
				  </tr>
				
				</table> 
		<input type="submit" value="Submit">
		</form>
			<?php
	
		} else if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if ($_POST["start"]>$_POST["end"])
			{
			$end = $_POST["start"];
			$start = $_POST["end"];
			$rHead = $_POST["start"];
			$cHead = $_POST["start"];
			} else {
			$start = $_POST["start"];
			$end = $_POST["end"];
			$cHead = $_POST["start"];
			$rHead = $_POST["start"];
			}
			if ((abs($start-$end)+1)<=301)
					{
		?>
		<table>
			<caption>Multiplication Table <br> from <?php echo $start; ?> to <?php echo $end; ?> </caption>
			<tr>
				<th></th>
		
					<?php
					for ($cHead = $start; $cHead <= $end; $cHead++)
					 {
					 	?>
				<th> <?php echo $cHead; ?> </th>
					<?php } ?>
			 </tr>
		
			 	<?php
				for($r = $start; $r <= $end; $r++)
				{
				?>	 
			<tr>
				<th>
				<?php echo $r; ?>
				</th>
					<?php
					 for($c = $start; $c <= $end; $c++ ) 
					 {
					 	?>
				<td>
					<?php echo $r*$c ?>
				</td>
				<?php 
				 }
				} ?>
		    </tr>
		</table>
		<?php
		} else 
			 {
			 	?><p>Please enter values within the range of 301 digits from each other.</p>
		<?php
			 }
		}
		?>
</body>
</html>