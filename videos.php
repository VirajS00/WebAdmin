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
		<title>Videos</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/video.css" />
	</head>
	<body>
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

			<section class="video-container"><h1 class="title">Videos</h1></section>
		</main>

		<script src="js/nav.js"></script>
		<script src="js/getVideo.js"></script>
	</body>
</html>
