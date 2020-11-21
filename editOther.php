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
            <textarea name="short-desc" id="short-desc" class="input textarea"><?php echo $data->short_desc; ?></textarea>
            <textarea name="desc" id="desc" class="input textarea"><?php echo $data->description; ?></textarea>
            <textarea name="video-img" id="video-img" class="input textarea"><?php echo $data->video_img; ?></textarea>
            <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
            <input type="submit" class="input button">
        </form>
    </div>
</main>
</body>
</html>