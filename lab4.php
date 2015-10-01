<!DOCTYPE html>
<head></head>

<body>

<?php
$start = -5;
$end = 5;
?>
<table>
<?php
for($r = $start; $r <= $end; $r++)
{
?>
  <tr>
  	<?php
  	echo $r; 
     for($c = $start; $c <= $end; $c++ ) 
     {?>
     <td><?php echo $r*$c ?> </td>
	<?php 
	 } ?>
    </tr>
<?php
}
?>
</table>

</body>
</html>