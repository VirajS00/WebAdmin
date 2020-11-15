<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Graph test</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<main>
		<img src="images/menu.svg" alt="menu sign" class="menuSign" height="30px" width="30px">
			<div class="chart_container">
				<div class="chart">
					<canvas id="layanan"></canvas>
				</div>
				<div class="chart">
					<canvas id="layanan_subbagian"></canvas>
				</div>
				<div class="chart">
					<canvas id="layanan_subbagian_one"></canvas>
				</div>
				<div class="chart">
					<canvas id="layanan_subbagian_two"></canvas>
				</div>
				<div class="chart">
					<canvas id="layanan_subbagian_three"></canvas>
				</div>
			</div>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		<script src="js/chartTest.js"></script>
	</body>
</html>
