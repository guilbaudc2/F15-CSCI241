<?php

$grades = array(
	"Andrew" => array("test1" => 88, "hw1" => 92, "hw2" => 75, "midterm" => 97),
	"Bob" => array("test1" => 79, "hw1" => 84, "hw2" => 91, "midterm" => 85),
	"Alice" => array("test1" => 70, "hw1" => 60, "hw2" => 80, "midterm" => 95)
);

function averageScore($grades, $item)
{
	

		foreach($grades as $studentName => $assignments)
		{
			if ($assignments[$item])
				 {
				 	$items[] =  $assignments[$item];
				 }
			
		}
		
		$itemAverage = (array_sum($items)/count($items));
		
	return $itemAverage; 
}

echo "The average for the midterm is " . averageScore($grades, "midterm") . "%";
echo"<br>";
echo "The average for homework 1 is " . averageScore($grades, "hw1") . "%";

