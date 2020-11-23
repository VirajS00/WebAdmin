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
	<a href="javascript: history.go(-1);" class="back"><< Back</a>
	<div class="code-container">
	<textarea id="code" class="code"></textarea>
		<button class="update">Update</button>
	</div>
	<div class="file-upload-container">
	<div class="form-upload-container">
		<form>
			<label for="TAimg" class="uploadLabelTA">Upload File</label>
			<input type="file" id="TAimg" class="inputfile" />
			</form>
		</div>
	</div>
<main>
    <?php
        $q = 'SELECT * FROM other WHERE id = '.$_GET['id'];
        $r = mysqli_query($conn, $q);
        $data = mysqli_fetch_object($r);
    ?>
    <div class="form-container">
        <form action="php/updateOther.php" method="post" id='other-form'>
            <input type="text" class="input textinput" name="title" value="<?php echo $data->title; ?>">
            <textarea name="very-short-desc" id="very-short-desc" class="input textarea"><?php echo $data->very_short_desc; ?></textarea>
            <textarea name="short_desc" id="short_desc" class="textarea input inputText" style="display: none"><?php echo $data->short_desc; ?></textarea>
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
					<textarea name="desc" id="desc" class="textarea input inputText" style="display: none"><?php echo $data->description; ?></textarea>
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
				<textarea name="video-img" id="video-img" class="input textarea"><?php echo $data->video_img; ?></textarea>
				<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" id="id">
				<input type="submit" class="button input">
        </form>
    </div>
</main>
<script src="RichTextArea/textarea.js"></script>
</body>
</html>