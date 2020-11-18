<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Add Photos</title>
		<link rel="stylesheet" href="css/photoAdd.css" />
	</head>
	<body>
		<div class="loader-container">
			<div class="loader"></div>
		</div>
		<main>
			<a href="javascript: history.go(-1);" class="back"><< Back</a>
			<div class="form-container">
				<h1 class="head">Upload Image</h1>
				<form action="" id="img-form">
					<label for="photo" class="input-label">Select Photo</label>
					<input type="file" name="photo" id="photo" class="input inputfile" />
					<textarea
						id="caption"
						class="input textarea"
						placeholder="Enter caption..."
					></textarea>
					<div class="custom-select">
						<select name="category" id="category" class="select">
							<option value="null">--Select Category --</option>
							<option value="Abstract">Abstract</option>
							<option value="Nature">Nature</option>
							<option value="Macro">Macro</option>
						</select>
						<input type="hidden" id="cat_id">
					</div>
					<input type="submit" class="input btn" />
				</form>
			</div>
		</main>
		<script src="js/fileUpload.js"></script>
	</body>
</html>
