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
    <title>Other</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/other.css" />
</head>
<body>
    <div class="loader-container">
		<div class="loader"></div>
	</div>
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
						<a href="other.php" class="link-menu act">Other content</a>
                        <ul class="subnav">
							<li class="subnavli"><a href="platforms.php" class="link-menu">Platforms</a></li>
						</ul>
					</li>
					<li class="nav-li">
						<a href="videos.php" class="link-menu">Videos</a>
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
            <h1 class="head">Other content <a href="addOther.php" class="add">+</a></h1>

            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Thumbnail Image</th>
                        <th>Very short Desc</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $q  = 'SELECT id, title, img_small, very_short_desc, sort FROM other ORDER BY sort';
                        $r = mysqli_query($conn, $q);
                        while ($row = mysqli_fetch_array($r)) {
                            echo("<tr draggable='true' class='draggable' data-position='".$row['sort']."' data-index='".$row['id']."'>
                                    <td>".$row['title']."</td>
                                    <td><img src='../".$row['img_small']."' height='80px'></td>
                                    <td>".$row['very_short_desc']."</td>
                                    <td><form method='post' action='php/delOther.php' class='delForm'><input type='hidden' value='".$row['id']."' name='other_id'><input type='submit' value='&times;' class='del-button'></form></td>
                                    <td><a href='editOther.php?id=".$row['id']."' class='editlink'>edit</a></td>
                                </tr>");
                        }
                    ?>
                </tbody>
            </table>
        </main>
    <script src="js/nav.js"></script>
    <script src="js/ChangeOrderOther.js"></script>
</body>
</html>