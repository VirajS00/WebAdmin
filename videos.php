<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header('location: index.php');
	}


	function sortArrayByKey(array &$array, array $orderArray) {

		$ordered = [];
		for($i = 0; $i < count($orderArray); $i++) {
			$ordered[$orderArray[$i]] = $array[$orderArray[$i]];
		}

		return $ordered;
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Videos</title>
		<link rel="stylesheet" href="css/style.css?v=1" />
		<link rel="stylesheet" href="css/video.css?v=3" />
	</head>
	<body>
		<div class="updated">Updated</div>
		<div class="nav-container">
			<nav>
				<ul class="nav-ul">
					<li class="nav-li"><h2 class="head-menu">Menu</h2></li>
					<li class="nav-li">
						<a href="home.php" class="link-menu">Home</a>
					</li>
					<li class="nav-li">
						<a href="photos.php" class="link-menu">Photos</a>
						<ul class="subnav">
							<li class="subnavli">
								<a href="photos.php?categ_id=1" class="link-menu">Abstract</a>
							</li>
							<li class="subnavli">
								<a href="photos.php?categ_id=2" class="link-menu">Nature</a>
							</li>
							<li class="subnavli">
								<a href="photos.php?categ_id=3" class="link-menu">Macro</a>
							</li>
						</ul>
					</li>
					<li class="nav-li">
						<a href="other.php" class="link-menu">Other content</a>
						<ul class="subnav">
							<li class="subnavli"><a href="platforms.php" class="link-menu">Platforms</a></li>
						</ul>
					</li>
					<li class="nav-li">
						<a href="videos.php" class="link-menu act">Videos</a>
					</li>
					<li class="nav-li">
						<a href="feedback.php" class="link-menu">Feedback</a>
					</li>
					<li class="nav-li">
						<a href="resources.php" class="link-menu">Resources</a>
					</li>
					<li class="nav-li">
						<a href="php/logout.php" class="link-menu">Logout</a>
					</li>
				</ul>
			</nav>
		</div>
		<main>
			<img
				src="images/menu.svg"
				alt="menu sign"
				class="menuSign"
				height="30px"
				width="30px"
			/>

			<section class="video-container"><h1 class="title">Videos
				<button id="updateDB">Update DB</button>
			</h1>
			<?php
				include('php/connect.php');
				$key = YOUR_KEY_HERE;
                $token = YOUR_TOKEN_HERE;

				$url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=20&playlistId=PLNUNNqPwkQe-67Wlv8WkoK7fZO96I07wf&access_token=$token&key=$key";
				$client = curl_init($url);
				curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
				$response = curl_exec($client);
                $jsonArr = json_decode($response, true);
				$items = $jsonArr['items'];
				$video_ids = [];

				for ($i=0; $i < sizeof($items); $i++) {
					$id = $items[$i]['id'];
					array_push($video_ids, $id);
				}

				$q = 'SELECT * FROM films';
				$r = mysqli_query($conn, $q);

				if($r) {
					$a = 0;
					$roles = [];
					$film_ids_db = [];
					$film_categories = [];
					while($row = mysqli_fetch_array($r)) {
						// add film id as index in array and roles as value
						$film_ids_db[$row['film_id']] = $row['my_role'];
						$film_categories[$row['film_id']] = $row['category'];
					}

					$sorted = sortArrayByKey($film_ids_db, $video_ids);
					$sorted_category = sortArrayByKey($film_categories, $video_ids);


					for($a = 0; $a < count($sorted); $a++) {
						$id = $items[$a]['id'];
						$thumbnail = $items[$a]['snippet']['thumbnails']['medium']['url'];
                    	$title = $items[$a]['snippet']['title'];
						$video_id = $items[$a]['snippet']['resourceId']['videoId'];

						echo '<div class="video">';
						echo '<img class="thumb" src="'.$thumbnail.'">';
						echo '<h3>'.$title.'</h3>';

						echo '<form class="update_form" style="display: inline-flex; gap: .5em;" data-video-id="'.$id.'">';
						echo '<input type="text" class="my_role" value="'.$sorted[$id].'">';
						echo '<input type="submit" value="&#8593;" class="update_btn">';
						echo '</form>';

						echo '<form class="update_form_category" style="display: inline-flex; gap: .5em;" data-video-id="'.$id.'">';
						echo '<input type="text" class="category" list="categories" value="'.$sorted_category[$id].'">';
						echo "<datalist id='categories'>";
						echo "<option value='demo_reel'>";
						echo "<option value='non_fiction'>";
						echo "<option value='fiction'>";
						echo "<option value='music_video'>";
						echo "<option value='experimental'>";
						echo "<option value='corporate_videos'>";
						echo "<option value='other'>";
						echo "</datalist>";
						echo '<input type="submit" value="&#8593;" class="update_btn">';
						echo '</form>';

						echo '<a href="videoImages.php?id='.$id.'&video_id='.$video_id.'" class="update_image_button">images</a>';

						echo '</div>';
					}
				} else {
					echo "MySQL Error: ".mysqli_error($conn);
				}

				echo "<input type='hidden' id='video_ids' value='".json_encode($video_ids)."'>";
				echo "<input type='hidden' id='total' value='".sizeof($items)."'>";
			?>

		</section>
		</main>

		<script src="js/nav.js"></script>
		<script src="js/updateFilmsTable.js?v=4"></script>
	</body>
</html>
