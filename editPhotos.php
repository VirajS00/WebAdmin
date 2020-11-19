<?php
	include('php/connect.php');
	session_start();
	if(!isset($_SESSION['user_id'])){
		header('location: index.php');
	}
	$id = $_GET['img_id'];
	$q = "SELECT * FROM images WHERE img_id = $id";
	$r = mysqli_query($conn, $q);
	if(!$r) {
		echo "MySQL Error: ".mysqli_error($conn);
	}
	$data = mysqli_fetch_object($r);
	$categ_id = $data->categ_id;
	$category = $data->category;
	$caption = $data->caption;
	$url_small = $data->url_small;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Edit Photo</title>
		<link rel="stylesheet" href="css/photoAdd.css" />
		<style>
			.textarea {
				margin-top: 20px;
			}
			.form-container {
				height: 450px;
			}
		</style>
	</head>
	<body>
		<main>
			<a href="javascript: history.go(-1);" class="back"><< Back</a>
			<div class="form-container">
				<img
					src="<?php echo $url_small; ?>"
					alt="star trails"
					height="150px"
					class="img_prev"
				/>
				<form action="php/updatePhoto.php" method="post" id="img-edit">
					<textarea
						name="caption"
						id="caption"
						class="input textarea"
					> <?php echo $caption; ?> </textarea>
					<div class="custom-select">
						<select name="category" id="category" class="select">
							<option value="null">--Select Category --</option>
							<option value="Abstract" <?php if($categ_id == 1) { echo 'selected'; } ?>>Abstract</option>
							<option value="Nature" <?php if($categ_id == 2) { echo 'selected'; } ?>>Nature</option>
							<option value="Macro" <?php if($categ_id == 3) { echo 'selected'; } ?>>Macro</option>
						</select>
						<input type="hidden" id="categ_id" name="categ_id" value="<?php echo $categ_id;?>" />
					</div>
					<input type="hidden" value="<?php echo $id; ?>" name="img_id" value="img_id">
					<input type="submit" value="Submit" class="input btn">
				</form>
			</div>
		</main>
		<script>
			const category = document.getElementById('category');
			const categ_id = document.getElementById('categ_id');
			category.addEventListener('change', () => {
				if(category.value == "Abstract") categ_id.value = 1;
				else if(category.value == "Nature") categ_id.value = 2;
				else if(category.value == "Macro") categ_id.value = 3;
			});
		</script>
	</body>
</html>
