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
		<title>Admin - Photos</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/photos.css" />
	</head>
	<body>
		<div class="nav-container">
			<nav>
				<ul class="nav-ul">
					<li class="nav-li"><h2 class="head-menu">Menu</h2></li>
					<li class="nav-li"><a href="home.php" class="link-menu">Home</a></li>
					<li class="nav-li"><a href="#" class="link-menu">Photos</a></li>
					<li class="nav-li">
						<a href="#" class="link-menu">Other content</a>
					</li>
					<li class="nav-li"><a href="#" class="link-menu">Feedback</a></li>
					<li class="nav-li">
						<a href="php/logout.php" class="link-menu">Logout</a>
					</li>
				</ul>
			</nav>
		</div>
		<main>
			<div class="photos_container">
				<img
					src="images/menu.svg"
					alt="menu sign"
					class="menuSign"
					height="30px"
					width="30px"
				/>
				<h1 class="head">Photos</h1>
				<table>
					<tr>
						<th>Desc</th>
						<th>Image</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
					<?php
						$q = 'SELECT * FROM images';
						$r = mysqli_query($conn, $q);
						while($row = mysqli_fetch_array($r)) {
							echo "<tr>";
							echo "<td>".$row['caption']."</td>";
							echo "<td><img src='".$row['url_small']."' height='80px' class='img' loading='lazy'></td>";
							echo "<td><form action=''><input type='hidden' value='".$row['img_id']."' />
								  <input type='button' value='&times;' class='del-button' /></form></td>";
							echo "<td><a href='#' class='editlink'>edit</a></td>";
							echo "</tr>";
						}
					?>
				</table>
			</div>
		</main>
		<script src="js/nav.js"></script>
	</body>
</html>
