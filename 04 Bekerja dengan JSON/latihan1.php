<?php
	$menu = json_decode(file_get_contents('http://localhost/aplikasi/Rest_API_WPU/04%20Bekerja%20dengan%20JSON/data-source.php?data=meals'), true);
	$menu = $menu['meals'];
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
		<title>Ok Food</title>
		<style>
			.card {
			    transition: all 0.3s ease-in-out
			}

			.card:hover {
			    transform: scale(1.03, 1.03);
			    cursor: pointer
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#"><h3>Ok Food</h3></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link active" href="#">Home</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row mt-3">
				<div class="col">
					<h1>All Menu</h1>
				</div>
			</div>
			<div class="row">
				<?php foreach ($menu as $m): ?>
				<div class="col-md-4 mb-3">
					<div class="card">
						<img class="card-img-top" src="<?= $m["strMealThumb"]; ?>" alt="<?= $m["strMeal"]; ?>">
						<div class="card-body">
							<h5 class="card-title"><?= $m["strMeal"]; ?></h5>
							<p class="card-text">Rp. <?= number_format($m["idMeal"],2,',','.'); ?></p>
							<a href="#" class="btn btn-primary">Beli</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<script src="../assets/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="../assets/bootstrap//js/bootstrap.min.js"></script>
	</body>
</html>