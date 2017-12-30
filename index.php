
<html>
	<head>
		<style>
			.redtext{
				color: red;
			}
			.greentext{
				color: green;
			}
			.bluetext{
				color:blue;
			}

		</style>
		
	</head>
<body>
<form action="upload.php" enctype="multipart/form-data" method="post"> 
Please choose a file: 
<input name="uploaded" type="file" /><br /> 
	<br>
	<label for ="workid"> Work Id:</label>
<input name="workid" id="workid" type="text" /><br /> 
		<br>
<input type="submit" name="submit" value="Upload" />

<?php
	if (!empty($_GET["param"]) && $_GET["param"]=="1") { echo "<p class='redtext' ><b>This file is already uploaded...</b></p>"; } 
	if (!empty($_GET["param"]) && $_GET["param"]=="21") { echo "<p class='bluetext'><b>File is uploaded but not saved in the database. </b></p>"; } 
	if (!empty($_GET["param"]) && $_GET["param"]=="20") { echo "<p class='greentext'><b>File is uploaded and saved in the database. </b></p>"; } 
	if (!empty($_GET["param"]) && $_GET["param"]=="3") { echo "<p class='redtext'><b>There was an unknown problem to upload the file...</b></p>"; }
	if (!empty($_GET["param"]) && $_GET["param"]=="30") { echo "<p class='redtext'><b>Upload doesn't work properly.</b></p>"; } 
	if (!empty($_GET["param"]) && $_GET["param"]=="4") { echo "<p class='redtext'><b>Upload directory does not exist.</b></p>"; } 
	if (!empty($_GET["param"]) && $_GET["param"]=="5") { echo "<p class='redtext'><b>Upload directory is not writable</b></p>"; } 
	 
?>
</form>
	
	
	
	
</body>