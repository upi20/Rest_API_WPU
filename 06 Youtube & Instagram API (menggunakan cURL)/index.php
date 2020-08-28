<?php 
// key api yt: AIzaSyBBfL9A3VencI_9qgNwFYgc4s4AEGcGrDg
function getCurl($url){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);
	return json_decode($result);
}

$result = getCurl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key=AIzaSyBBfL9A3VencI_9qgNwFYgc4s4AEGcGrDg');

$ytProfilePicture = $result->items[0]->snippet->thumbnails->medium->url;
$ytTitle = $result->items[0]->snippet->title;
$ytSubs = $result->items[0]->statistics->subscriberCount;


// lates video
$latesVideo = getCurl('https://www.googleapis.com/youtube/v3/search?key=AIzaSyBBfL9A3VencI_9qgNwFYgc4s4AEGcGrDg&channelId=UCkXmLjEr95LVtGuIm3l2dPg&maxResults=1&order=date&part=snippet');


 ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<title>Portfolio</title>
	</head>
	<body>
		<header class="pt-5">
			<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand page-scroll" href="#profile">Isep Lutpi Nur</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
						<div class="navbar-nav">
							<a class="nav-link page-scroll" href="#about">About</a>
							<a class="nav-link page-scroll" href="#social">Social</a>
							<a class="nav-link page-scroll" href="#portfolio">Portfolio</a>
							<a class="nav-link page-scroll" href="#contact">Contact</a>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<main>
			<section id="profile" class="profile">
				<div class="jumbotron jumbotron-fluid m-0">
					<div class="container text-center">
						<img src="assets/img/profile1.png" alt="Profile" width="25%" class="rounded-circle img-thumbnail card-hover">
						<h2 class="display-4">Isep Lutpi Nur</h2>
						<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, animi, nulla eveniet iusto natus sed est ducimus nihil. Possimus deserunt adipisci ipsum quis vel quo rem iste quia suscipit totam.</p>
					</div>
				</div>
			</section>
			<section id="about" class="about">
				<div class="container text-center">
					<div class="row mb-4 pt-4">
						<div class="col">
							<h2>About</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-5">
							<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa id eveniet, deserunt iusto repellat quia placeat corrupti accusantium et provident natus commodi sequi molestias quis? Harum quo mollitia, obcaecati deleniti!</p>
						</div>
						<div class="col-md-5">
							<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa id eveniet, deserunt iusto repellat quia placeat corrupti accusantium et provident natus commodi sequi molestias quis? Harum quo mollitia, obcaecati deleniti!</p>
						</div>
					</div>
				</div>
			</section>
			<section class="social bg-light pb-4" id="social">
				<div class="container">
					<div class="row">
						<div class="col text-center mb-4 pt-4">
							<h2>Social Media</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-5">
							<div class="row card-hover">
								<div class="col-md-4">
									<img src="<?= $ytProfilePicture; ?>" alt="Web Programing Unpas" width="100" class="rounded-circle img-thumbnail">
								</div>
								<div class="col-md-8">
									<h5><?= $ytTitle; ?></h5>
									<p><?= $ytSubs; ?> Subscribes.</p>
									<div class="g-ytsubscribe" data-channelid="UCkXmLjEr95LVtGuIm3l2dPg" data-layout="default" data-count="default"></div>
								</div>
							</div>
							<div class="row pt-3">
								<div class="col">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe src="https://www.youtube.com/embed/<?= $latesVideo->items["0"]->id->videoId; ?>?rel=0" class="embed-responsive-item" allowfullscreen></iframe>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="row card-hover">
								<div class="col-md-4">
									<img src="assets/img/profile1.png" alt="Web Programing Unpas" width="100" class="rounded-circle img-thumbnail">
								</div>
								<div class="col-md-8">
									<h5>@iseplutpinur</h5>
									<p>70000 Followers.</p>
								</div>
							</div>
							<div class="row pt-3">
								<div class="col">
									<div class="ig-thumbnail">
										<img src="assets/img/thumbs/1.png" alt="">
									</div>
									<div class="ig-thumbnail">
										<img src="assets/img/thumbs/1.png" alt="">
									</div>
									<div class="ig-thumbnail">
										<img src="assets/img/thumbs/1.png" alt="">
									</div>
									<div class="ig-thumbnail">
										<img src="assets/img/thumbs/1.png" alt="">
									</div>
									<div class="ig-thumbnail">
										<img src="assets/img/thumbs/1.png" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="portfolio" class="portfolio">
				<div class="container">
					<div class="row mb-4 pt-4">
						<div class="col text-center">
							<h2>Portfolio</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md mb-4">
							<div class="card card-hover">
								<img src="assets/img/thumbs/4.png" class="card-img-top" alt="">
								<div class="card-body">
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
							</div>
						</div>
						<div class="col-md mb-4">
							<div class="card card-hover">
								<img src="assets/img/thumbs/5.png" class="card-img-top" alt="">
								<div class="card-body">
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
							</div>
						</div>
						<div class="col-md mb-4">
							<div class="card card-hover">
								<img src="assets/img/thumbs/6.png" class="card-img-top" alt="">
								<div class="card-body">
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md mb-4">
							<div class="card card-hover">
								<img src="assets/img/thumbs/4.png" class="card-img-top" alt="">
								<div class="card-body">
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
							</div>
						</div>
						<div class="col-md mb-4">
							<div class="card card-hover">
								<img src="assets/img/thumbs/5.png" class="card-img-top" alt="">
								<div class="card-body">
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
							</div>
						</div>
						<div class="col-md mb-4">
							<div class="card card-hover">
								<img src="assets/img/thumbs/6.png" class="card-img-top" alt="">
								<div class="card-body">
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<aside id="contact" class="contact  bg-light pb-4">
				<div class="container mb-5">
					<div class="row py-4 mt-5">
						<div class="col text-center">
							<h2>Contact Us</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-4 pb-4">
							<div class="card text-white bg-primary mb-3">
								<div class="card-body">
									<h5 class="card-title">Contact Us</h5>
									<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, modi.</p>
								</div>
							</div>
							<ul class="list-group">
								<li class="list-group-item"><h2>Location</h2></li>
								<li class="list-group-item">My Home</li>
								<li class="list-group-item">Jl. Mekarwangi Cikadu Cianjur</li>
								<li class="list-group-item">West Java, Indonesia 43272</li>
							</ul>
						</div>
						<div class="col-lg-6">
							<form>
								<div class="form-group">
									<label for="nama">Nama</label>
									<input type="text" class="form-control" id="nama">
								</div>
								<div class="form-group">
									<label for="email">E-Mail</label>
									<input type="email" class="form-control" id="email">
								</div>
								<div class="form-group">
									<label for="pesan">Pesan</label>
									<textarea name="pesan" id="pesan" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Kirim pesan!</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</aside>
		</main>
		<footer class="bg-dark text-white">
			<div class="container py-3">
				<div class="row text-center">
					<div class="col">Copyright 2020. Isep Lutpi Nur</div>
				</div>
			</div>
		</footer>
		<script src="assets/jquery/jquery.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="https://apis.google.com/js/platform.js"></script>
	</body>
</html>