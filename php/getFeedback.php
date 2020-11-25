<?php
    include('connect.php');
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