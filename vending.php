<!DOCTYPE html>
<head>
<title>Lab 5 - Vending</title>
<meta charset="utf-8">
<link rel="stylesheet" href="lab5.css">
<!--[if lt IE9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
</head>
<body>
<?php

//Create form for Employee to fill out


function payCustomer($totalPay)
{
$dollars = (int)($totalPay);
$cents = ($totalPay - $dollars);
$cents*=100;
$cents = round($cents);
//check number of 100 dollar bills to give out and give the set number of bills

$hundreds = (int)($dollars/100);
$totalHundreds = $hundreds*100;
$dollars = $dollars % 100;

//check number of 50 dollar bills to give out and give the set number of bills

$fifties = (int)($dollars/50);
$totalFifties = $fifties*50;
$dollars = $dollars % 50;
//check number of 20 dollar bills to give out and give the set number of bills

$twenties = (int)($dollars/20);
$totalTwenties = $twenties*20;
$dollars  = $dollars % 20;

//check number of 10 dollar bills to give out and give the set number of bills

$tens = (int)($dollars/10);
$totalTens = $tens*10;
$dollars  = $dollars  % 10;

//check number of 5 dollar bills to give out and give the set number of bills

$fives = (int)($dollars/5);
$totalFives = $fives*5;
$dollars  = $dollars % 5;
$totalDollars = $dollars*1;

//check number of 1 dollar bills to give out and give the set number of bills
//done 

//check number of quartars to give out and give the set number of coins
$cents = (int)($cents);
$quarters = (int)($cents/25);
$totalQuarters = $quarters*25;
$cents = $cents % 25;
//check number of dimes to give out and give the set number of coins
$dimes = (int)($cents/10);
$totalDimes = $dimes*10;
$cents = $cents % 10;
//check number of nickels to give out and give the set number of coins
$nickels = (int)($cents/5);

$totalNickels = $nickels*5;
$cents = $cents % 5;

$totalCents = $cents*1;
//check number of pennies to give out and give the set number of coins
?>
		<table>
			<caption>Disbursement</caption>
			<tr>
				<th>Demoniation</th>
				<th>Oty</th>
				<th>Disbursed</th>
			</tr>
			<tr>
				<th>$100:</th>
				<td><?php echo $hundreds ?></td>
				<td>$<?php echo $totalHundreds ?></td>
			</tr>
			<tr>
				<th>$50:</th>
				<td><?php echo $fifties ?></td>
				<td>$<?php echo $totalFifties ?></td>
			</tr> 
			<tr>
				<th>$20:</th>
				<td><?php echo $twenties ?></td>
				<td>$<?php echo $totalTwenties ?></td>				
		    </tr>
			<tr>
				<th>$10:</th>
				<td><?php echo $tens ?></td>
				<td>$<?php echo $totalTens ?></td>
			</tr>
			<tr>
				<th>$5:</th>
				<td><?php echo $fives ?></td>
				<td>$<?php echo $totalFives ?></td>
			</tr>	 
			<tr>
				<th>$1:</th>
				<td><?php echo $dollars ?></td>
				<td>$<?php echo $totalDollars ?></td>				
		    </tr>
		    			<tr>
				<th>25¢:</th>
				<td><?php echo $quarters ?></td>
				<td><?php echo $totalQuarters ?>¢</td>
			</tr>
			<tr>
				<th>10¢:</th>
				<td><?php echo $dimes ?></td>
				<td><?php echo $totalDimes ?>¢</td>
			</tr>	 
			<tr>
				<th>5¢:</th>
				<td><?php echo $nickels ?></td>
				<td><?php echo $totalNickels ?>¢</td>				
		    </tr>
		    <tr>
				<th>1¢:</th>
				<td><?php echo $cents ?></td>
				<td><?php echo $totalCents ?>¢</td>
			</tr>
			<tr>
				<th>Total:</th>
				<td></td>
				<td>$<?php echo $totalPay ?></td>				
		    </tr>		    
		</table>
<?php

}
?>

		<h1>POS Helper</h1>
		<?php
		if($_SERVER["REQUEST_METHOD"] == "GET")
		{
			?>
			<
		<form method="POST" action="vending.php">
				 
			 <table>
				  <tr>
						<td>Total Bill: <input type="text" name="totalBill"></td>
				  </tr>
				  <tr>
						<td>Tendered: <input type="text" name="tendered"></td>
				  </tr>
			</table> 
		<input type="submit" value="Submit">
		</form>
<?php	
		} else if($_SERVER["REQUEST_METHOD"] == "POST")
		{
						
			$totalBill = $_POST["totalBill"];
			$tendered = $_POST["tendered"];
			
        if($tendered < 0 || $totalBill < 0)
			{
				echo "<p>Please enter a valid values for Total Billed and Tendered.</p>";
		} else if($tendered < $totalBill) 
			{
				echo "<p>This is not enough money. Please enter a valid amount.</p>";
			} 
	
	else{	 	
			$change = $tendered - $totalBill;
			$change = round($change,2);
			
			

			
?>
<h1>Recipt</h1>
<h2>Total Bill: <?php echo $totalBill ?></h2>
<h2>Tendered: <?php echo $tendered ?></h2>
<h2>Change: <?php echo $change ?></h2>


<?php

	echo payCustomer($change);

		}
			
	}
			
		?>
</body>
</html>