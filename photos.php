<?php
include 'php/connect.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
}
if (isset($_GET['categ_id'])) {
    $q0 = 'SELECT category, COUNT(img_id) AS total_pics FROM images WHERE categ_id = ' . $_GET['categ_id'] . ' LIMIT 1';
    $r0 = mysqli_query($conn, $q0);
    $data0 = mysqli_fetch_array($r0);
    $category = $data0['category'];
    $total_pics = $data0['total_pics'];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Admin - Photos <?php if (isset($category)) {echo " - $category";} ?></title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/photos.css" />
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
					<li class="nav-li"><a href="photos.php" class="link-menu act">Photos</a>
						<ul class="subnav">
							<li class="subnavli"><a href="photos.php?categ_id=1" class="link-menu <?php if (isset($_GET['categ_id'])) {if (1 == $_GET['categ_id']) {echo "act";}} ?>">Abstract</a></li>
							<li class="subnavli"><a href="photos.php?categ_id=2" class="link-menu <?php if (isset($_GET['categ_id'])) {if (2 == $_GET['categ_id']) {echo "act";}} ?>">Nature</a></li>
							<li class="subnavli"><a href="photos.php?categ_id=3" class="link-menu <?php if (isset($_GET['categ_id'])) {if (3 == $_GET['categ_id']) {echo "act";}} ?>">Macro</a></li>
						</ul>
					</li>
					<li class="nav-li">
						<a href="other.php" class="link-menu">Other content</a>
						<ul class="subnav">
							<li class="subnavli"><a href="platforms.php" class="link-menu">Platforms</a></li>
						</ul>
					</li>
					<li class="nav-li"><a href="videos.php" class="link-menu">Videos</a></li>
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
			<div class="photos_container">
				<img
					src="images/menu.svg"
					alt="menu sign"
					class="menuSign"
					height="30px"
					width="30px"
				/>
				<h1 class="head">Photos <?php if (isset($category)) {echo " - $category - $total_pics Photos";} ?> <a href="addPhotos.php" class="add">+</a></h1>
				<table class='draggable-container'>
						<thead>
						<tr>
							<th>Desc</th>
							<th>Image</th>
							<th>Category</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
						</thead>
						<tbody>
						<?php
if (!isset($_GET['categ_id'])) {
    $q = 'SELECT * FROM images ORDER BY sort';
} else {
    $q = "SELECT * FROM images WHERE categ_id = " . $_GET['categ_id'] . " ORDER BY sort";
}
$r = mysqli_query($conn, $q);
while ($row = mysqli_fetch_array($r)) {
    echo "<tr draggable='true' class='draggable' data-position='" . $row['sort'] . "' data-index='" . $row['img_id'] . "'>";
    echo "<td>" . $row['caption'] . "</td>";
    if (substr($row['url_small'], 0, 5) === "pics/") {
        echo "<td><img src='https://virajshukla.com/" . $row['url_small'] . "' height='80px' class='img' loading='lazy'></td>";
    } else {
        echo "<td><img src='" . $row['url_small'] . "' height='80px' class='img' loading='lazy'></td>";
    }
    echo "<td>" . $row['category'] . "</td>";
    echo "<td><form action='php/delPhoto.php' method='post' class='delForm'><input type='hidden' name='img_id' id='img_id' value='" . $row['img_id'] . "' />
										<input type='hidden' value='" . $row['categ_id'] . "' name='categ_id' id='categ_id'>
									<input type='submit' value='&times;' class='del-button' /></form></td>";
    echo "<td><a href='editPhotos.php?img_id=" . $row['img_id'] . "' class='editlink'>edit</a></td>";
    echo "</tr>";
}
?>
					</tbody>
				</table>
			</div>
		</main>
		<script src="js/nav.js"></script>
		<script src='js/draggable.js'></script>
	</body>
</html>
