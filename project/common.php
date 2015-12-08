<?php
		
session_start();

function readLines($fileName)
{

	$fileResource = fopen($fileName,"r");
	$contents = array();
		if(!is_resource($fileResource))
		{
			 echo "Could not open the file.";
			 exit();
		}
	while($line = fgets($fileResource))
		{
			$contents[] = $line;
		}
		
		fclose($fileResource);
		
		return $contents;
}

function displayComments($filename, $pageUrl, $commentAction = "spam", $removeText = "X")
{
		$items = readLines($filename);
		echo "<dl>";
		foreach($items as $itemIndex => $item)
		{
			$item = explode("|", $item);
			echo "<dt>{$item[0]}:</dt>";
			echo "<dd>{$item[1]}</dd>";
		?>
				<form action="<?php  echo $pageUrl; ?>" method="POST">
					<input type="hidden" name="<?php  echo $commentAction; ?>" value="<?php  echo $itemIndex; ?>">
					<button type="submit" ><?php  echo $removeText ?></button>
				</form>
		<?php
			echo "<br>";
			echo "<hr>";
		}

		echo "</dl>";
}

function addComment($filename, $line)
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

function addEntry($filename, $line)
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

function horizontalPosters($filename,$title)
{
		$items = readLines($filename);
			?>
			<table>
				<caption><?php echo $title ?></caption>
				<?php
	foreach($items as $itemIndex => $item)
	{
		$item = explode("|", $item);
		?>
		<tr>
			<th colspan="3"><h2><?php echo $item[1] ?></h2></th>
		</tr>
		<tr>
			<th><a href="<?php echo $item[0]; ?>" target="_blank"><img src="<?php echo $item[0]; ?>" height="125" width="175" alt="<?php $item[1]; ?>"></a></th>
			<td>
			<table class="tableright">
							<tr>
								<th colspan="2">Drama Ratings</th>
							</tr>
							<tr>
								<th>Overall</th>
								<td><?php echo $item[2] ?></td>
							</tr>
							<tr>
								<th>Story</th>
								<td><?php echo $item[3] ?></td>
							</tr>
							<tr>
								<th>Acting/Cast</th>
								<td><?php echo $item[4] ?></td>
							</tr>
							<tr>
								<th>Personal Enjoyment</th>
								<td><?php echo $item[5] ?></td>
							</tr>
						</table>
					<h3>Summary:</h3>
						<p><?php echo $item[6] ?></p>
					<h3>Why I Like This Drama:</h3>
						<p><?php echo $item[7] ?></p>
				</td>
			</tr>
	<?php
	}
	echo "</table>";
}

function verticalPosters($filename,$title)
{
		$items = readLines($filename);
			?>
			<table>
				<caption><?php echo $title ?></caption>
				<?php
	foreach($items as $itemIndex => $item)
	{
		$item = explode("|", $item);
		?>
		<tr>
			<th colspan="3"><h2><?php echo $item[1] ?></h2></th>
		</tr>
		<tr><th><a href="<?php echo $item[0]; ?>" target="_blank"><img src="<?php echo $item[0]; ?>" height="175" width="125" alt="<?php $item[1]; ?>"></a></th>
			<td>
			<table class="tableright">
							<tr>
								<th colspan="2">Drama Ratings</th>
							</tr>
							<tr>
								<th>Overall</th>
								<td><?php echo $item[2] ?></td>
							</tr>
							<tr>
								<th>Story</th>
								<td><?php echo $item[3] ?></td>
							</tr>
							<tr>
								<th>Acting/Cast</th>
								<td><?php echo $item[4] ?></td>
							</tr>
							<tr>
								<th>Personal Enjoyment</th>
								<td><?php echo $item[5] ?></td>
							</tr>
						</table>
					<h3>Summary:</h3>
						<p><?php echo $item[6] ?></p>
					<h3>Why I Like This Drama:</h3>
						<p><?php echo $item[7] ?></p>
				</td>
			</tr>
	<?php
	}
	echo "</table>";
}

function adminHorizontalPosters($filename,$title)
{
		$items = readLines($filename);
			?>
			<table>
				<caption><?php echo $title ?></caption>
				<?php
	foreach($items as $itemIndex => $item)
	{
		$item = explode("|", $item);
		?>
		<tr>
			<th colspan="2"><h2><?php echo $item[1] ?></h2></th>
			<td>
				<form action="admin.php" method="POST">
					<input type="hidden" name="deleteEntry" value="<?php  echo $itemIndex; ?>">
					<input type="hidden" name="fileName" value="<?php  echo $filename ?>">
					<button type="submit" >Delete Entry</button>
				</form>
			</td>
		</tr>
		<tr>
			<th><a href="<?php echo $item[0]; ?>" target="_blank"><img src="<?php echo $item[0]; ?>" height="125" width="175" alt="<?php $item[1]; ?>"></a></th>
			<td>
			<table class="tableright">
							<tr>
								<th colspan="2">Drama Ratings</th>
							</tr>
							<tr>
								<th>Overall</th>
								<td><?php echo $item[2] ?></td>
							</tr>
							<tr>
								<th>Story</th>
								<td><?php echo $item[3] ?></td>
							</tr>
							<tr>
								<th>Acting/Cast</th>
								<td><?php echo $item[4] ?></td>
							</tr>
							<tr>
								<th>Personal Enjoyment</th>
								<td><?php echo $item[5] ?></td>
							</tr>
						</table>
					<h3>Summary:</h3>
						<p><?php echo $item[6] ?></p>
					<h3>Why I Like This Drama:</h3>
						<p><?php echo $item[7] ?></p>
				</td>
			</tr>
	<?php
	}
	echo "</table>";
}

function adminVerticalPosters($filename,$title)
{
		$items = readLines($filename);
			?>
			<table>
				<caption><?php echo $title ?></caption>
				<?php
	foreach($items as $itemIndex => $item)
	{
		$item = explode("|", $item);
		?>
			<th colspan="2"><h2><?php echo $item[1] ?></h2></th>
			<td>
				<form action="admin.php" method="POST">
					<input type="hidden" name="deleteEntry" value="<?php  echo $itemIndex; ?>">
					<input type="hidden" name="fileName" value="<?php  echo $filename ?>">
					<button type="submit" >Delete Entry</button>
				</form>
			</td>
		<tr><th><a href="<?php echo $item[0]; ?>" target="_blank"><img src="<?php echo $item[0]; ?>" height="175" width="125" alt="<?php $item[1]; ?>"></a></th>
			<td>
			<table class="tableright">
							<tr>
								<th colspan="2">Drama Ratings</th>
							</tr>
							<tr>
								<th>Overall</th>
								<td><?php echo $item[2] ?></td>
							</tr>
							<tr>
								<th>Story</th>
								<td><?php echo $item[3] ?></td>
							</tr>
							<tr>
								<th>Acting/Cast</th>
								<td><?php echo $item[4] ?></td>
							</tr>
							<tr>
								<th>Personal Enjoyment</th>
								<td><?php echo $item[5] ?></td>
							</tr>
						</table>
					<h3>Summary:</h3>
						<p><?php echo $item[6] ?></p>
					<h3>Why I Like This Drama:</h3>
						<p><?php echo $item[7] ?></p>
				</td>
			</tr>
	<?php
	}
	echo "</table>";
}

function returnFilename($filename)
{
	return $filename;
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

function getFileExtension($mimeType)
{
		
	switch ($mimeType)
	{
		case "image/png":
			return ".png";
		case "image/gif":
			return ".gif";
		case "image/jpeg":
			return ".jpg";
		case "image/pjpeg":
			return ".jpg";
		default: 
			return ".unknown";
	}
	
}

function isUploadAllowed($mimeType)
{
	
	switch ($mimeType)
	{
		case "image/png":
		case "image/gif":
		case "image/jpeg":
		case "image/pjpeg":
			return true;
		default: 
			return false;
	}
	
}