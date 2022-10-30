<?php
$id = $_GET['id'];
$video_id = $_GET['video_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images for film</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/video.css">
    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 2em;
            border-radius: 1.5em;
            box-shadow: 0 0 20px;
            max-width: 500px;
        }

        .submit {
            width: 100%;
            padding: 1em;
            font-size: 1.2rem;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2em;
        }

        .images-container {
            width: 50%;
            max-width: 500px;
            border-radius: 1.5em;
            box-shadow: 0 0 20px;
            height: 560px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2em 0;
            overflow-y: hidden;
            position: relative;
        }

        .images-container .image-overlay {
            width: 300px;
            top:0;
            position: relative;
            aspect-ratio: 16 / 9;
        }

        .image-overlay img, .overlay-card {
            position: absolute;
            inset: 0;
            height: 100%;
            width: 100%;
        }

        .image-overlay img, .overlay-card {
            background-color: rgb(0 0 0 / .4);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .overlay-card {
            opacity: 0;
            transition: opacity 250ms ease;
        }

        .image-overlay:hover .overlay-card {
            opacity: 1;
        }

        .images {
            overflow-y: auto;
            position: relative;
            top: 0;
            height: 100%;
        }

        .images .image-overlay {
            margin-bottom: .5em;
        }

        .del_button {
            background-color: rgb(203, 0, 0);
            color: #fff;
            border: 0;
            padding: .5em 2em;
            cursor: pointer;
            transition: background-color 250ms ease;
            border-radius: 100vh;
        }

        .del_button:hover {
            background-color: rgb(146, 3, 3);
        }

        .bb {
            position: fixed;
            z-index: 1000;
            inset:1rem auto 1rem auto;
        }

        @media screen and (max-width: 768px) {
            main {
                flex-direction: column;
            }

            .images-container {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <div class="error">error</div>
    <div class="success">success</div>
    <?php
$key = "AIzaSyDlE_7PxSKhSBjiIbrFSWcaXZHAIf21Lro";
$url = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=$video_id&key=$key";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$jsonArr = json_decode($response, true);
$items = $jsonArr['items'][0];

$title = $items['snippet']['title'];
$thumb = $items['snippet']['thumbnails']['high']['url'];
?>

    <a href="videos.php" class="bb">Back</a>
    <main>
        <div class="form-container">
            <h1 class="title"><?php echo $title; ?></h1>
            <img src="<?php echo $thumb; ?>" width="300px" height="225px" alt="">
            <form>
                <input type="file" accept="image/*" name="convert" id="user_image">
                <label for="user_image" id="file_input_label">Select Image</label><br><br>
                <input type="hidden" id="id" value="<?php echo $id; ?>">
                <input type="button" value="submit" id="sub_button" class="submit">
            </form>
        </div>
        <div class="images-container">
            <h1>Images</h1>
            <div class="images">
                <?php
include 'php/connect.php';
$q = 'SELECT images FROM films WHERE film_id=\'' . $id . '\'';
$r = mysqli_query($conn, $q);

if ($r) {
 if (mysqli_num_rows($r) == 1) {
  $row = mysqli_fetch_array($r);
  $images = $row['images'];
  if ('' === $images) {
   echo 'no images to display';
  } else {
   $image = explode(',', $images);
   for ($i = 0; $i < count($image); $i++) {
    echo "<div class='image-overlay'>";
    echo "<picture>";
    echo "<source type='image/webp' srcset='https://virajshukla.com/filmImages/" . $image[$i] . ".webp'>";
    echo "<source type='image/jpeg' srcset='https://virajshukla.com/filmImages/" . $image[$i] . ".jpg'>";
    echo "<img src='https://virajshukla.com/filmImages/" . $image[$i] . ".jpg' alt='thumb image'>";
    echo "</picture>";
    echo "<div class='overlay-card'>";
    echo "<form method='post' action='php/deleteVideoImage.php' class='img_del_form'>";
    echo "<input type='hidden' value='$id' id='id' name='id'>";
    echo "<input type='hidden' value='$video_id' id='video_id' name='video_id'>";
    echo "<input type='hidden' value='" . $image[$i] . "' id='image_name' name='image_name'>";
    echo "<input type='submit' value='Delete' class='del_button'>";
    echo "</form>";
    echo "</div>";

    echo "</div>";
   }
  }
 }
} else {
 echo "Error: " . mysqli_error($conn);
}
?>
            </div>
        </div>
    </main>

    <script src="js/convertImage.js"></script>
</body>
</html>