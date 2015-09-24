<!DOCTYPE html>
<head>
<title>Lab 3</title>
<meta charset="utf-8">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<!--[if lt IE9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
</head>
<body>

<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	?>
	    <form method="POST" action="lab3.php">
		 
		 <table>
		  <tr>
		    <th>Invoice Item Number</th>
		    <th>Item Price</th>		
		    <th>Quantity</th>
		  </tr>
		  <tr>
 				<td><label>Invoice Item 1: <input type="text" name="invoiceItem1" value="DVD" readonly></label></td> 
				<td><label>Price: <input type="text" name="invoiceItem1Price" value="19.99" readonly></label></td>
				<td><input type="number" name="quantityItem1" min="0" placeholder="0"></td>
		  </tr>
		  <tr>
				<td><label>Invoice Item 2: <input type="text" name="invoiceItem2" value="TV" readonly></label></td>
				<td><label>Price: <input type="text" name="invoiceItem2Price" value="249.99" readonly></label></td>
				<td><input type="number" name="quantityItem2" min="0" placeholder="0"></td>
		  </tr>
		  <tr>
				<td><label>Invoice Item 3: <input type="text" name="invoiceItem3" value="Remote" readonly></label></td> 
				<td><label>Price: <input type="text" name="invoiceItem3Price" value="6.99" readonly></label></td>
				<td><input type="number" name="quantityItem3" min="0" placeholder="0"></td>
		  </tr>
 		  <tr>
			<td><label>Invoice Item 4: <input type="text" name="invoiceItem4" value="HDMI Cable" readonly></label></td>
				<td><label>Price: <input type="text" name="invoiceItem4Price" value="12.99" readonly></label></td>
				<td><input type="number" name="quantityItem4" min="0" placeholder="0"></td>
 		  </tr>
			
			</table> 

			<br>
			<input type="checkbox" name="applyTax">Include Tax?<br>

			<br>
			<input type="submit" value="Submit">
</form>
	<?php
} else if($_SERVER["REQUEST_METHOD"] == "POST")

{
	$totalItem1Price = $_POST["quantityItem1"]*$_POST["invoiceItem1Price"];
	$totalItem2Price = $_POST["quantityItem2"]*$_POST["invoiceItem2Price"];
	$totalItem3Price = $_POST["quantityItem3"]*$_POST["invoiceItem3Price"];
	$totalItem4Price = $_POST["quantityItem4"]*$_POST["invoiceItem4Price"];
	
	$tax = .07;
		
	$subTotal = $totalItem1Price + $totalItem2Price + $totalItem3Price + $totalItem4Price;
	$appliedTax = $subTotal * $tax;
	$totalCost = $subTotal + $appliedTax;

	
		if($_POST["quantityItem1"] == 0)
			$_POST["quantityItem1"] = 0;
		if($_POST["quantityItem2"] == 0)
			$_POST["quantityItem2"] = 0;
		if($_POST["quantityItem3"] == 0)
			$_POST["quantityItem3"] = 0;
		if($_POST["quantityItem4"] == 0)
			$_POST["quantityItem4"] = 0;
?>
			 <table>
		  <tr>
		    <th>Invoice Item Number</th>
		    <th>Item Price</th>		
		    <th>Quantity</th>
		    <th>Total Cost</th>
		  </tr>
		  <tr>
 				<td>Invoice Item 1: <?php 	echo $_POST["invoiceItem1"] ?></td> 
				<td>Price:  <?php 	echo $_POST["invoiceItem1Price"] ?></td>
				<td>Quantity:  <?php 	echo $_POST["quantityItem1"] ?></td>
				<td>Total Item 1 Cost:  <?php 	echo $totalItem1Price ?></td>
		  </tr>
	  	  <tr>
 				<td>Invoice Item 2: <?php 	echo $_POST["invoiceItem2"] ?></td> 
				<td>Price:  <?php 	echo $_POST["invoiceItem2Price"] ?></td>
				<td>Quantity:  <?php 	echo $_POST["quantityItem2"] ?></td>
				<td>Total Item 2 Cost:  <?php 	echo $totalItem2Price ?></td>
		  </tr>
	   	  <tr>
 				<td>Invoice Item 3: <?php 	echo $_POST["invoiceItem3"] ?></td> 
				<td>Price:  <?php 	echo $_POST["invoiceItem3Price"] ?></td>
				<td>Quantity:  <?php 	echo $_POST["quantityItem3"] ?></td>
				<td>Total Item 3 Cost:  <?php 	echo $totalItem3Price ?></td>
		  </tr>
	  	  <tr>
 				<td>Invoice Item 4: <?php 	echo $_POST["invoiceItem4"] ?></td> 
				<td>Price:  <?php 	echo $_POST["invoiceItem4Price"] ?></td>
				<td>Quantity:  <?php 	echo $_POST["quantityItem4"] ?></td>
				<td>Total Item 4 Cost:  <?php 	echo $totalItem4Price ?></td>
		  </tr>		  		  		  
	
			</table> 
			<br>
<?php	
	echo "Subtotal: " . $subTotal . "<br>";
	if(isset($_POST["applyTax"]) == true)
		{
			echo "Tax: " . $appliedTax . "<br>";
			echo "Total: " . $totalCost;
		}
	else 
		{
			$totalCost = $subTotal;
			echo "Total: " . $totalCost;
		}
}
?>

</body>
</html>
