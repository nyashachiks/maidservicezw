<?php
//check if form has been submitted
if(isset($_POST['photoSubmitted']))
	{
	//check for an uploaded file
	if(isset($_FILES['upload']))
		{
		//validate the type. should be JPG or PNG
		$allowed= array('image/jpeg', 'image/pjpeg', 'image/jpg', 'image/JPG', 'image/PNG', 'image/png', 'image/X-PNG', 'image/x-png');
		
		if(in_array($_FILES['upload']['type'], $allowed))
			{
			//update the name
			$test= 'Testing123';
			$newNameArray= explode(".", $_FILES['upload']['name']);
			$newName= $test.".".$newNameArray[1];
			
			//move the file over
			if(move_uploaded_file($_FILES['upload']['tmp_name'], "dist/img/".$newName))
				{
				echo "File has been successfully uploaded";
				}
			else
				{
				echo "Please upload a JPG or PNG file";	
				}
			}
		}
	if(file_exists($_FILES['upload']['tmp_name'])&&(is_file($_FILES['upload']['tmp_name'])))
		{
		unlink($_FILES['upload']['tmp_name']);	
		}
	}
?>

<form enctype="multipart/form-data" action="test1.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="5242880">
<fieldset><legend>Upload Image</legend>
File: <input type="file" name="upload">
</fieldset>
<div align="center">
<input type="submit" name="submit" value="Submit">
<input type="hidden" name="photoSubmitted" value="TRUE">
</div>


</form>