<?php

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["filename"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$supported=array('jpeg','png','jpg','bmp','gif');   // you can add more extensions here
	$message="";

	if(isset($_POST["submit"])) 

	{
    	if(in_array($imageFileType,$supported))
    	{
    		if(file_exists($target_file))
    		{
    			$message="Sorry, this image is already uploaded";
    		}
    		else
    		{
    			if($_FILES["filename"]["size"]>200000) // 20 MB limit. you can change the value
    			{
    				$message="sorry, Image is too large to be upload";
    			}
    			else
    			{
    				$up=move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file);
    				if($up)
    				{
    					$message="Image upload successfully";
    				}
    				else
    				{
    					$message="sorry Some error occured please try again";
    				}
    			}
    		}
    	}

    	else
    	{
    		$message="uploaded image is not a image.";
    	}
	}	
?>


<?php echo $message; ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="filename" id="filename">
    <input type="submit" value="Upload Image" name="submit">
</form>
