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
</head>
<body>
	<div class="code-container">
	<textarea id="code" class="code"></textarea>
		<button class="update">Update</button>
	</div>
	<div class="file-upload-container">
	<div class="form-upload-container">
		<form>
			<label for="TAimg" class="uploadLabelTA"><span class="labelcontent" id="TAimgLabel">Choose cover Image</span><div class="inp-loader" id="TAimgLoader"></div></label>
			<input type="file" id="TAimg" class="inputfile" />
			</form>
		</div>
	</div>
<main>
	<a href="javascript: history.go(-1);" class="back"><< Back</a>
    <div class="form-container">
        <div class="image_uplaod_container">
            <form id="img_small_upload_form">
                <label for="img_small_upload" class="fileInputLabel"><span class="labelcontent">Choose cover Image</span><div class="inp-loader"></div></label>
                <input type="file" id="img_small_upload" name="img_small_upload" class="inputfile" />
            </form>
            <form id="img_upload_form">
                <label for="img_upload" class="fileInputLabel"><span class="labelcontent">Choose Large Image</span><div class="inp-loader"></div></label><br>
                <input type="file" id="img_upload" name="img_upload" class="inputfile" />
            </form>
        </div><br>
        <form action="php/addOther.php" method="post" id='other-form'>
            <input type="text" class="input textinput" name="title" value="" placeholder="Enter title">
            <textarea name="very-short-desc" id="very-short-desc" class="input textarea" placeholder="Enter very short description"></textarea>
            <textarea name="short_desc" id="short_desc" class="textarea input inputText" style="display: none"><span style="color: #999;">Enter Short Description</span></textarea>
					<div class="textarea-container">
						<div class="controls">
							<button class="icon bold"><b>B</b></button>
							<button class="icon italic"><i>i</i></button>
							<button class="icon underline"><u>U</u></button>
							<button class="icon link">
								<img src="RichTextArea/Assets/link.png" alt="link" class="btn-img" />
							</button>
							<button class="icon unlink">
								<img src="RichTextArea/Assets/unlink.png" alt="unlink" class="btn-img" />
							</button>
						</div>
						<iframe
							src="about:blank"
							contenteditable="true"
							style="width: 100%; height: 200px"
							name="iframe"
							id="iframe"
							class="richTextArea iframe"
						></iframe>
					</div>
					<textarea name="desc" id="desc" class="textarea input inputText" style="display: none"><span style="color: #999;">Enter Description</span></textarea>
					<div class="textarea-container">
						<div class="controls">
							<button class="icon bold"><b>B</b></button>
							<button class="icon italic"><i>i</i></button>
							<button class="icon underline"><u>U</u></button>
							<button class="icon link">
								<img src="RichTextArea/Assets/link.png" alt="link" class="btn-img" />
							</button>
							<button class="icon unlink">
								<img src="RichTextArea/Assets/unlink.png" alt="unlink" class="btn-img" />
							</button>
							<button class="icon image-upload">
								<img src="RichTextArea/Assets/image.png" alt="image" class="btn-img" />
							</button>
							<button class="icon htmlcode">
								<img src="RichTextArea/Assets/code.png" alt="code" class="btn-img" />
							</button>
							<button class="icon codeblock">
								<img src="RichTextArea/Assets/code1.png" alt="code" class="btn-img" />
							</button>
						</div>
						<iframe
							src="about:blank"
							contenteditable="true"
							style="width: 100%; height: 300px"
							name="iframe"
							id="iframe"
							class="richTextArea iframe"
						></iframe>
					</div>
                <textarea name="video-img" id="video-img" class="input textarea" placeholder="Video Image"></textarea>
                <input type="hidden" name="img_small" id="img_small">
                <input type="hidden" name="img_large" id="img_large">
				<p class='para' style='font-size: 1.2rem;'>Platform<br>
				<?php
					$q1 = 'SELECT * FROM platforms';
					$r1 = mysqli_query($conn, $q1);
					if($r1) {
						while($row = mysqli_fetch_array($r1)){
							echo "<label style='font-size: .8em;'><input type='checkbox' class='check' value='".$row['id']."' name='platform[]'>".$row['platform_name']."</label><br>";
						}
					} else {
						echo "MySQL Error: ".mysqli_error($conn);
					}
				?>
				</p>
				<br>
				<input type="submit" class="button input">
        </form>
    </div>
</main>
<script src="RichTextArea/textarea.js"></script>
<script src="js/addOther.js"></script>
</body>
</html>