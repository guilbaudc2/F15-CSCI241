<?php
		$counter = 0;		
		foreach($views as $view)
		 {
		 	
			$counter++;
			if($counter > 4)
			{
				header("Location: subscription.php");
			}
		 }
		
function readLines($fileName)
{
//open file
$fileResource = fopen($fileName,"r");
$contents = array();
//check if resource
if(!is_resource($fileResource))
{ echo "Could not open the file.";
	exit();
	}
//read data from file
//echo file contents - title "|" &  article

while($line = fgets($fileResource))
	{
	$contents[] = explode("|",$line);
	}
	
	fclose($fileResource);
	
	return $contents;
}