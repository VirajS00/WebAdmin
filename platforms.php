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
		<link rel="stylesheet" href="css/other.css" />
        <style>
            main {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: initial;
            }
            h1.head {
                display: flex;
                justify-content: space-around;
                align-items: center;
                width: 100%;
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
					<li class="nav-li"><a href="photos.php" class="link-menu">Photos</a>
						<ul class="subnav">
							<li class="subnavli"><a href="photos.php?categ_id=1" class="link-menu">Abstract</a></li>
							<li class="subnavli"><a href="photos.php?categ_id=2" class="link-menu">Nature</a></li>
							<li class="subnavli"><a href="photos.php?categ_id=3" class="link-menu">Macro</a></li>
						</ul>
					</li>
					<li class="nav-li">
						<a href="other.php" class="link-menu act">Other content</a>
						<ul class="subnav">
							<li class="subnavli"><a href="platforms.php" class="link-menu act">Platforms</a></li>
						</ul>
					</li>
					<li class="nav-li"><a href="videos.php" class="link-menu">Videos</a></li>
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
        <h1 class="head">Platforms <a href="addPlatform.php" class="add">+</a></h1>
            <section class="platforms-container">
            <?php
                $q1 = 'SELECT * FROM platforms ORDER BY id DESC';
                $r1 = mysqli_query($conn, $q1);
                if($r1) {
                    while($row = mysqli_fetch_array($r1)){
                        echo "<div class='platform'>";
                        echo $row['img_code'];
                        echo "<h3 class='platform-name'>".$row['platform_name']."</h3>";
                        echo "<form class='delForm' method='post' action='php/delPlatform.php'><input type='hidden' value='".$row['id']."' name='platform_id'><input type='hidden' name='platform_img_src' class='platform_img_src'><input type='submit' value='&times;' class='del-button'></form>";
                        echo '</div>';
                    }
                } else {
                    echo "Mysql Error: ".mysqli_error($conn);
                }
            ?>
            </section>
        </main>
        <script src="js/nav.js"></script>
        <script src="js/platform.js"></script>
        <script>
            changePaths();
            document.querySelectorAll('.delForm').forEach((form) => {
                form.addEventListener('submit', e => {
                    e.preventDefault();
                    if (confirm('are you sure you want to delete')) {
                        form.submit();
                    } else {
                        return;
                    }
                });
            });
        </script>
	</body>
</html>
