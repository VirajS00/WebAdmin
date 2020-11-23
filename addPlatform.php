<?php
    session_start();
	if(!isset($_SESSION['user_id'])){
		header('location: index.php');
    }
    include('php/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Other content</title>
    <link rel="stylesheet" href="css/other.css">
    <link rel="stylesheet" href="RichTextArea/textArea.css">
    <style>
        #platforms-form {
            width: calc(100% - 100px);
        }
        main {
            display: grid;
            place-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
<main>
	<a href="javascript: history.go(-1);" class="back"><< Back</a>
    <div class="form-container">
        <div class="image_uplaod_container">
            <form id="platform_img_upload">
                <label for="platfrom_img" class="fileInputLabel"><span class="labelcontent">Choose Platform Image</span><div class="inp-loader"></div></label>
                <input type="file" id="platfrom_img" name="platfrom_img" class="inputfile" />
            </form>
        </div>
        <form action="php/addPlatform.php" method="post" id='platforms-form'>
            <input type="text" class="input textinput" name="platform_name" value="" placeholder="Enter Platform Name">
            <input type="text" class="input textinput" name="platform_link" placeholder="Enter Link"><br><br>
            <input type="hidden" id="platform_img_url" name="platform_img_url">
			<input type="submit" class="button input">
        </form>
    </div>
</main>
<script src="js/platform.js"></script>
</body>
</html>