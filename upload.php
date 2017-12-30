<?php
$work_id= $_POST["workid"];


include ('mysql.php');   //  this will set $resid which is the database connector

if (isset($_POST['submit']))
{

	$target = "./uploads/";
	$targetFile = $target . basename($_FILES['uploaded']['name']);
	if(file_exists($targetFile)){
		$check_attachment=MySQLi_Query($resid,"select * from Attachments where attachment='".$targetFile."'");
		$r_arrachment=MySQLi_Fetch_Row($check_attachment);
		if ($r_arrachment)
	     	{header("Location: index.php?param=1");}        //  file is already uploaded and saved in the database
		else{
			saveIntoDB($resid,$work_id, $targetFile);
		}
	}
	else{
		if (is_dir($target)) {
	 		 if (is_writable($target)) {
				if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $targetFile))
				{
					if (file_exists($targetFile)) {
 					   saveIntoDB($resid,$work_id, $targetFile);
					} else {
   					 	header("Location: index.php?param=30");   //  Upload doesn't work properly 
					}
				}
				else
				{
					header("Location: index.php?param=3");   //  there was a problem to upload the file 
				}
			 }
			else
				{header("Location: index.php?param=5"); }  //  Permission error to write on the target 
		}
		else
			{header("Location: index.php?param=4"); }  //  target directory doesn't exists 
		}
}


function saveIntoDB($resid,$work_id, $target){   //  saving file address in the database

			$targetCorrected= stripslashes($target);
			$query="insert into Attachments (work_id, attachment)
								values ('$work_id','$targetCorrected')";

			$res=MySQLi_Query($resid, $query);
			if($res){
				header("Location: index.php?param=20");   //  File is uploaded and saved in database
			}
			else{
				header("Location: index.php?param=21");   //  File is uploaded but not saved in database 
			}
}
?>
