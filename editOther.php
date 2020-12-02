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
				<textarea name="video-img" id="video-img" class="input textarea"><?php echo $data->video_img; ?></textarea>
				<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" id="id">
				<h2 class="head">Platforms</h2>
				<?php
					$q1 = 'SELECT platform FROM other WHERE id = '.$_GET['id'];
					$r1 = mysqli_query($conn, $q1);
					if($r1) {
						$data = mysqli_fetch_object($r1);
						$platfroms = $data->platform;
						$platform_arr = explode(',', $platfroms);
						$q2 = 'SELECT id, platform_name FROM platforms';
						$r2 = mysqli_query($conn, $q2);
						if($r2) {
							while($row = mysqli_fetch_array($r2)) {
								if(in_array($row['id'], $platform_arr)) {
									echo "<label><input type='checkbox' name='platform[]' value='".$row['id']."' checked>".$row['platform_name']."</label><br>";
								} else {
									echo "<label><input type='checkbox' name='platform[]' value='".$row['id']."'>".$row['platform_name']."</label><br>";
								}
							}
						} else {
							echo 'MySQL Error: ' . mysqli_error($conn);
						}
					} else {
						echo 'MySQL Error: '.mysqli_error($conn);
					}
				?><br>
				<input type="submit" class="button input">
        </form>
    </div>
</main>
<script src="RichTextArea/textarea.js"></script>
</body>
</html>