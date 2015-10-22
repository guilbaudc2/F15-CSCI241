<!DOCTYPE html>
<head>
<title>Lab 5 - Paystub</title>
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

function calculateEmployeePay($hoursWorked, $payRate = 7.25)

{
	//Check if Employee has worked overtime and subtract overtime hours
	if ($hoursWorked <= 40)
	{$regularPay = $hoursWorked * $payRate;
//	$regularPay = round($regularPay, 2);
	
	$overTime = 0;
	$overTimePay = 0;
	
	$totalHours = $hoursWorked;
	}
	//Multiple hours by payrate
	
	//if overtime, multiple hours by time and a half
	else 
	{$overTime = $hoursWorked - 40;
	$hoursWorked = 40;
	$totalHours = 40 + $overTime;
	
	$overTimePay = $overTime * ($payRate * 1.5);
	$overTimePay = round($overTimePay, 2);
	
	$regularPay = 40 * $payRate;
	$regularPay = round($regularPay, 2);
	//add normal pay and any overtime
	}	
	$totalPay = $overTimePay + $regularPay;
//	$totalPay = round($totalPay,2);
	//Return Total pay
?>

		<table>
			<tr>
				<th></th>
				<th>Hours</th>
				<th>Gross Pay</th>
			</tr>
			<tr>
				<th>Regular:</th>
				<td><?php echo $hoursWorked ?></td>
				<td><?php echo $regularPay ?></td>
			</tr>
			<tr>
				<th>Overtime:</th>
				<td><?php echo $overTime ?></td>
				<td><?php echo $overTimePay ?></td>
			</tr>
			<tr><td></td><td></td><td></td></tr>	 
			<tr>
				<th>Total:</th>
				<td><?php echo $totalHours ?></td>
				<td><?php echo $totalPay ?></td>				
		    </tr>
		</table>
		
<?php return $totalPay;
}

function payEmployee($totalPay)
{
	global $hourWork;
	global $hourWage;
$totalPay = calculateEmployeePay($hourWork, $hourWage);
$dollars = (int)($totalPay);
$cents = ($totalPay - $dollars);
$cents*=100;
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

		<h1>Paystub Generator</h1>
		<?php
		if($_SERVER["REQUEST_METHOD"] == "GET")
		{
			?>
		<form method="POST" action="paystub.php">
				 
			 <table>
				  <tr>
						<td>Employee ID: <input type="number" name="employeeId"></td>
				  </tr>
				  <tr>
						<td>Employee Name: <input type="text" name="employeeName"></td>
				  </tr>
				  <tr>
						<td>Hourly Wage: <input type="text" name="hourlyWage"></td>
				  </tr>				  
				  <tr>
						<td>Hours Worked: <input type="text" name="hoursWorked"></td>
				  </tr>				
			</table> 
		<input type="submit" value="Submit">
		</form>
<?php	
		} else if($_SERVER["REQUEST_METHOD"] == "POST")
		{
						
			(int)$empId = $_POST["employeeId"];
			$empName = $_POST["employeeName"];
			$hourWage = empty($_POST["hourlyWage"]) ?  7.25 : $_POST["hourlyWage"];
			$hourWork = $_POST["hoursWorked"];
			
			
if($hourWage<7.25 || $_POST["hourlyWage"] === "0" || $hourWork < 0)
			{
				echo "Please enter a valid number.";
		}else
			{
			
?>

<h2>Name: <?php echo $empName ?></h2>
<h2>ID: <?php echo $empId ?></h2>


<?php

	echo payEmployee($hourWork, $hourWage);

		}
			
	}
		?>
</body>
</html>