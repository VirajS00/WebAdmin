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
<main>
    <?php
        $q = 'SELECT * FROM other WHERE id = '.$_GET['id'];
        $r = mysqli_query($conn, $q);
        $data = mysqli_fetch_object($r);
    ?>
    <div class="form-container">
        <form action="php/updateOther.php" method="post">
            <input type="text" class="input textinput" name="title" value="<?php echo $data->title; ?>">
            <textarea name="very-short-desc" id="very-short-desc" class="input textarea"><?php echo $data->very_short_desc; ?></textarea>
            <!-- <textarea name="short-desc" id="short-desc" class="input textarea"><?php echo $data->short_desc; ?></textarea>
            <textarea name="desc" id="desc" class="input textarea"><?php echo $data->description; ?></textarea>
            <textarea name="video-img" id="video-img" class="input textarea"><?php echo $data->video_img; ?></textarea> -->
            <div class="textarea-container">
						<div class="controls">
							<button class="icon bold" id="bold"><b>B</b></button>
							<button class="icon italic" id="italic"><i>i</i></button>
							<button class="icon underline" id="underline"><u>U</u></button>
							<button class="icon link" id="link">
								<img src="RichTextArea/Assets/link.png" alt="link" class="btn-img" />
							</button>
							<button class="icon unlink" id="unlink">
								<img src="RichTextArea/Assets/unlink.png" alt="unlink" class="btn-img" />
							</button>
							<button class="icon image-upload" id="image-upload">
								<img src="RichTextArea/Assets/image.png" alt="image" class="btn-img" />
							</button>
							<button class="icon htmlcode" id="htmlcode">
								<img src="RichTextArea/Assets/code.png" alt="code" class="btn-img" />
							</button>
						</div>
						<iframe
							src="about:blank"
							contenteditable="true"
							style="width: 100%; height: 150px"
							name="iframe"
							id="iframe"
							class="richTextArea"
						></iframe>
                    </div>
            <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
            <input type="submit" class="input button">
        </form>
    </div>
</main>
<script src="RichTextArea/textarea.js"></script>
</body>
</html>