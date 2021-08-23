<?php
	include('php/connect.php');
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
		<title>Admin - Platforms</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/feedback.css" />
		<style>
			.loader {
				display: none;
			}
		</style>
	</head>
	<body>
		<div class="loader-container">
			<div class="loader"></div>
		</div>
		<div class="nav-container">
			<nav>
				<ul class="nav-ul">
					<li class="nav-li"><h2 class="head-menu">Menu</h2></li>
					<li class="nav-li"><a href="home.php" class="link-menu">Home</a></li>
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
							<li class="subnavli">
								<a href="platforms.php" class="link-menu">Platforms</a>
							</li>
						</ul>
					</li>
					<li class="nav-li">
						<a href="videos.php" class="link-menu">Videos</a>
					</li>
					<li class="nav-li">
						<a href="feedback.php" class="link-menu act">Feedback</a>
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
			<div class="feedback-container">
				<div class="loader"></div>
				<?php
					$q1 = 'SELECT id, name, email, message FROM feedback ORDER BY id DESC';
					$r1 = mysqli_query($conn, $q1);
					if($r1) {
						while($row = mysqli_fetch_array($r1)) {
							echo '<div class="feedback-card">
								<a class="delete-cross" href="javascript:void(0);" data-index="'.$row['id'].'">&times;</a>
								<h2 class="name">'.$row['name'].'</h2>
								<p class="email">'.$row['email'].'</p>
								<p class="message">'.$row['message'].'</p>
							</div>';
						}
					} else {
						echo "MySQL Error: ".mysqli_error($conn);
					}
				?>
			</div>
		</main>
		<script src="js/nav.js"></script>
		<script src="js/feedback.js"></script>
	</body>
</html>
