<?php
$url = "guestBlogger.php";
require_once("common.php");
if(!($_SESSION["username"] == "blogger" || $_SESSION["username"] == "admin"))
{
	header("Location: login.php");
}
if($_SERVER["REQUEST_METHOD"] == "GET")
{
			require_once("header.php");
			
$kdramas = horizontalPosters("kordramas.txt","Korean Dramas");
$kfilms = verticalPosters("korfilms.txt", "Korean Films");
$jdramas = verticalPosters("japdramas.txt","Japanese Dramas");
$jfilms = verticalPosters("japfilms.txt","Japanese Films");

echo $kdramas;
echo $kfilms;
echo $jdramas;
echo $jfilms;
?>
<h3>New Blog Entry:</h3>
<form action="guestBlogger.php" method="POST" enctype="multipart/form-data">
				<label>
					Category Designation: 
					<select name="categoryDesignation" required="required">
						<?php
							$categories = readLines("categories.csv");
							
							foreach($categories as $category)
							{
								$category = explode(",", $category);
								echo "<option value='{$category[0]}'>{$category[1]}</option>";
							}
						?>
					</select>
				</label>
		<fieldset>
				<legend>Ratings</legend>
				<label>Overall: <input type="number" name="ratingOverall" min="0" max="10" required="required"></label>
				<br>
				<label>Story: <input type="number" name="ratingStory" min="0" max="10" required="required"></label>
				<br>
				<label>Acting/Cast: <input type="number" name="ratingCasting" min="0" max="10" required="required"></label>
				<br>
				<label>Personal Enjoyment: <input type="number" name="ratingEnjoyment" min="0" max="10" required="required"></label>
		</fieldset>
				<label>
					Drama/Film Title: <input type="text" name="mediaTitle" required="required">
				</label>
				<br>
				<label>
					Media Poster: <input type="file" name="mediaPoster" required="required">
				</label>
				<br>
				<label>
					Summary: <textarea name="mediaSummary" required="required"></textarea>
				</label>
				<br>
				<label>
					Why I Like this Drama/Film: <textarea name="mediaImpression" required="required"></textarea>
				</label>
				<br>

				<button type="submit">Submit</button>
	</form>
	
<?php
require_once("footer.php");
}
else if($_SERVER["REQUEST_METHOD"] == "POST")
{
		
	if(isset($_FILES["mediaPoster"]))
	{
	//ccontinue processing	
		if($_FILES["mediaPoster"]["error"] == UPLOAD_ERR_OK)
		{
			//continue processing
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			$fileType = $finfo->file($_FILES['mediaPoster']['tmp_name']);
			
					if(isUploadAllowed($fileType))
					{			
						$filePath = "/home/ACC.guilbaudc2/public_html/F15-CSCI241/project/images/";
									
						
						$hash = md5_file($_FILES["mediaPoster"]["tmp_name"]);
						$filename = $hash;
						
						$ext = getFileExtension($fileType);
							
						
						while(file_exists($filePath . $filename . $ext))
						{
							$rand = bin2hex(openssl_random_pseudo_bytes(5));
							
							$filename = $hash . "-" . $rand;
							
						}
						
						move_uploaded_file($_FILES["mediaPoster"]["tmp_name"], $filePath . $filename . $ext);
														
						
			} else {
				echo "The file you are trying to upload is not allowed.";
			}
				
		} else
		{
			echo "Some error occured in uploading the file.  I will fix later.";
		}
	} else {
		echo "No file was detected.";
	} 
	
	if(isset($_POST["categoryDesignation"]))
	{
		$newMedia = array();
		 
		
		$newMedia[] = "images/" . $filename . $ext;
		$newMedia[] = $_POST["mediaTitle"];
		$newMedia[] = $_POST["ratingOverall"];
		$newMedia[] = $_POST["ratingStory"];
		$newMedia[] = $_POST["ratingCasting"];
		$newMedia[] = $_POST["ratingEnjoyment"];
		$newMedia[] = $_POST["mediaSummary"];
		$newMedia[] = $_POST["mediaImpression"];
		
		
		switch ($_POST["categoryDesignation"])
		{
			case "jdrama":
				addEntry("japdramas.txt", implode("|",$newMedia) . "\r\n");
				setrawcookie("flash", base64_encode("You've successfully added a new Japanese Drama entry."), time() + (5 * 60));
				header("Location: guestBlogger.php");
				break;
			case "jfilm":
				addEntry("japfilms.txt", implode("|",$newMedia) . "\r\n");
				setrawcookie("flash", base64_encode("You've successfully added a new Japanese Film entry."), time() + (5 * 60));
				header("Location: guestBlogger.php");
				break;
			case "kdrama":
				addEntry("kordramas.txt", implode("|",$newMedia) . "\r\n");
				setrawcookie("flash", base64_encode("You've successfully added a new Korean Drama entry."), time() + (5 * 60));
				header("Location: guestBlogger.php");
				break;
			case "kfilm":
				addEntry("korfilms.txt", implode("|",$newMedia) . "\r\n");
				setrawcookie("flash", base64_encode("You've successfully added a new Korean Film entry."), time() + (5 * 60));
				header("Location: guestBlogger.php");
			default: 
				return false;
				header("Location: guestBlogger.php");
			
		}		
		header("Location: guestBlogger.php");
	}
	
	}
	
