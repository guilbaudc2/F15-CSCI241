<?php
		
session_start();

if(!isset($_SESSION['uniqueID']))
{
    $_SESSION['uniqueID'] = uniqid();
	

}

$uniqueIDFilename = $_SESSION['uniqueID'] . ".txt";

createFile($uniqueIDFilename);

function readLines($fileName)
{
//open file
$fileResource = fopen($fileName,"r");
$contents = array();
//check if resource
	if(!is_resource($fileResource))
	{
		 echo "Could not open the file.";
		 exit();
	}
//read data from file
//echo file contents - title "|" &  location
while($line = fgets($fileResource))
	{
		$contents[] = $line;
	}
	
	fclose($fileResource);
	
	return $contents;
}

function appendLine($filename, $line)
{
	$fileResource = fopen($filename, "a");
	
	if(!is_resource($fileResource))
	{
		exit("Could not open the file for reading.");
	}
	
	fwrite($fileResource, $line);
	
	fclose($fileResource);
	
	return null;
	
}
function deleteLine($filename, $line)
{
	$contents = readLines($filename);
	
	unset($contents[$line]);
	
	$fileResource = fopen($filename, "w");
		
	if(!is_resource($fileResource))
	{
		exit("Could not open the file for reading.");
	}
	
	foreach($contents as $contentLine)
	{
		fwrite($fileResource, $contentLine);
	}	
	
	fclose($fileResource);
	
	return null;
	
}

function displayList($filename, $pageUrl, $removeText = "X")
{
	$items = readLines($filename);
echo "<ul>";
foreach($items as $itemIndex => $item)
{
	$item = explode("|", $item);
	echo "<li>{$item[0]} - {$item[1]}";
	?>
		<form action="<?php  echo $pageUrl; ?>" method="POST">
			<input type="hidden" name="deleteEvent" value="<?php  echo $itemIndex; ?>">
			<button type="submit" ><?php  echo $removeText ?></button>
		</form>
		</li>
<?php
}
echo "</ul>";
}

function deleteFile($filename)
{
	$fileResource = fopen($filename, "w");
		
	if(!is_resource($fileResource))
	{
		exit("Could not open the file for reading.");
	}
	
	fclose($fileResource);
	
	return null;
	
}

function createFile($filename)
{
	$fileResource = fopen($filename, "a");
		
	if(!is_resource($fileResource))
	{
		exit("Could not open the file for reading.");
	}
	
	fclose($fileResource);
	
	return null;
}
function messageBody($filename)
{
		$items = readLines($filename);
		echo "<ul>";
			foreach($items as $item)
			{
				$item = explode("|", $item);
				echo "<li>{$item[0]} - {$item[1]}</li>";
			}
		echo "</ul>";

}