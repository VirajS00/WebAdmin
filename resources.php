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
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Admin - Resources</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/resources.css" />
</head>
<body>
    <div class="loader-container">
			<div class="loader"></div>
		</div>
    <div class="nav-container">
			<nav>
				<ul class="nav-ul">
					<li class="nav-li"><h2 class="head-menu">Menu</h2></li>
					<li class="nav-li"><a href="#" class="link-menu act">Home</a></li>
					<li class="nav-li"><a href="photos.php" class="link-menu">Photos</a>
						<ul class="subnav">
							<li class="subnavli"><a href="photos.php?categ_id=1" class="link-menu">Abstract</a></li>
							<li class="subnavli"><a href="photos.php?categ_id=2" class="link-menu">Nature</a></li>
							<li class="subnavli"><a href="photos.php?categ_id=3" class="link-menu">Macro</a></li>
						</ul>
					</li>
					<li class="nav-li"><a href="other.php" class="link-menu">Other content</a>
						<ul class="subnav">
							<li class="subnavli"><a href="platforms.php" class="link-menu">Platforms</a></li>
						</ul>
					</li>
					<li class="nav-li"><a href="videos.php" class="link-menu">Videos</a></li>
					<li class="nav-li">
						<a href="feedback.php" class="link-menu">Feedback</a>
					</li>
                    <li class="nav-li">
						<a href="resources.php" class="link-menu act">Resources</a>
					</li>
					<li class="nav-li"><a href="php/logout.php" class="link-menu">Logout</a></li>
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
            <h1 class="head">Resources <a href="addResource.php" class="add">+</a></h1>
            <table class='draggable-container'>
				<thead>
				<tr>
					<th>Name</th>
					<th>Short Desc</th>
					<th>Resource Type</th>
					<th>Links</th>
					<th>Category</th>
                    <th>Delete</th>
                    <th>Edit</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$q = 'SELECT * FROM resources ORDER BY sort';
					$r = mysqli_query($conn, $q);
					while($row = mysqli_fetch_array($r)) {
                        $links = json_decode($row['links'], true);
						echo "<tr draggable='true' class='draggable' data-position='".$row['sort']."' data-index='".$row['id']."'>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['short_desc']."</td>";
						echo "<td>".$row['type']."</td>";
                        echo "<td>";
                        foreach($links as $link) {
                            echo "<a class='editlink' target='_blank' href='".$link['url']."'>".$link['link_type']."</a>, ";
                        }
                        echo "</td>";
						echo "<td>".$row['category']."</td>";
						echo "<td><form action='php/delResource.php' method='post' class='delForm'>
                            <input type='hidden' id='resource_id' name='resource_id' value='".$row['id']."' />
							<input type='submit' value='&times;' class='del-button' /></form></td>";
						echo "<td><a href='editResource.php?id=".$row['id']."' class='editlink'>edit</a></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
        </main>
        <script src="js/nav.js"></script>
        <script src="js/resources.js"></script>
</body>
</html>