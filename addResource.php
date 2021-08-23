<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Add Resource</title>
		<link rel="stylesheet" href="css/photoAdd.css" />
		<style>
			* {
				box-sizing: border-box;
			}
			.form-container {
				height: fit-content;
				font-family: 'Montserrat', sans-serif;
				width: 450px;
			}
			.links {
				width: 100%;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.links input {
				background: #fff;
				color: #333;
				border: 2px solid #ccc;
				width: 35px;
				height: 35px;
				font-size: 1.8rem;
				border-radius: 0.2em;
				cursor: pointer;
			}

			.links input:hover {
				background-color: #ccc;
			}

			.link-box-container {
				padding: 1rem 0;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
			}

			.link-box-container .link {
				display: flex;
				margin: 0.5rem 0;
			}

			.link-box {
				border: 1px solid #ccc;
				border-radius: 0.3em;
				font-size: 1rem;
				padding: 0.3em 0.5em;
				font-family: 'Montserrat', sans-serif;
			}
		</style>
	</head>
	<body>
		<div class="loader-container">
			<div class="loader"></div>
		</div>
		<main>
			<a href="javascript: history.go(-1);" class="back"><< Back</a>
			<div class="form-container">
				<h1 class="head">Add Resource</h1>
				<form action="" id="resource-form">
					<input
						type="text"
						class="input"
						id="resource_name"
						style="
							border: 1px solid #ccc;
							border-radius: 0.3em;
							font-size: 1rem;
						"
						placeholder="Resource name"
					/>
					<input
						type="text"
						class="input"
						id="resource_type"
						style="
							border: 1px solid #ccc;
							border-radius: 0.3em;
							font-size: 1rem;
						"
						placeholder="Resource type"
					/>
					<textarea
						id="short_desc"
						class="input textarea"
						placeholder="Short Desc..."
					></textarea>
					<div class="custom-select">
						<select id="category" class="select">
							<option value="null">--Select Category --</option>
							<option value="CD">Coding and Design</option>
							<option value="PF">Photography and Filmmaking</option>
						</select>
					</div>
					<h2 class="links">
						Links <input type="button" id="addFeild" value="+" />
					</h2>
					<div class="link-box-container">
						<div class="link">
							<input
								type="text"
								class="link-box link_name"
								placeholder="name"
							/>
							<input type="text" class="link-box link_url" placeholder="url" />
						</div>
					</div>
					<input type="submit" class="input btn" />
				</form>
			</div>
		</main>
		<script src="js/resourcesAdd.js"></script>
	</body>
</html>
