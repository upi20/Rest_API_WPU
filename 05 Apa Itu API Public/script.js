$('#search-button').on('click', searchMovie);
$('#search-input').on('keyup', event => {
	if (event.keyCode == 13) searchMovie();
});

function searchMovie(){
	$('#movie-list').html(`
		<div class="col">
			<h1 class="text-center">Loading...</h1>
		</div>
	`);	
	$.ajax({
		url: 'http://www.omdbapi.com',
		type: 'get',
		dataType: 'json',
		data: {
			'apikey': 'd9bc1b6b',
			's': $('#search-input').val()
		},
		success: result => {
			if (result.Response == "True") {
				$('#movie-list').html('');
				$.each(result.Search, (i, data)=>{
					let html = `
						<div class="col-md-3 mb-4">
							<div class="card">
								<img class="card-img-top" src="${data.Poster}" alt="${data.Title}">
								<div class="card-body">
									<h5 class="card-title">${data.Title}</h5>
									<h6 class="card-subtitle mb-2 text-muted">${data.Year}</h6>
									<button class="btn btn-primary" data-toggle="modal" data-target=".bd-detail-modal-xl" onclick="renderDetailModal('${data.imdbID}')">See Detail</button>
								</div>
							</div>
						</div>
					`;
					$("#movie-list").append(html);
				});
				$('#search-input').val('');
			} else {
				$('#movie-list').html(`
					<div class="col">
						<h1 class="text-center">${result.Error}</h1>
					</div>
				`);
			}
		}
	});
}

function renderDetailModal(id){
	$('.modal-body').html(`
		<div class="col">
			<h1 class="text-center">Loading...</h1>
		</div>
	`);	
	$.ajax({
		url: 'http://www.omdbapi.com',
		type: 'get',
		dataType: 'json',
		data: {
			'apikey': 'd9bc1b6b',
			'i': id
		},
		success: result => {
			$('.modal-body').html('');
			if (result.Response == "True") {
				$(".modal-body").html(`
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4">
								<img src="${result.Poster}" alt="${result.Title}">
							</div>
							<div class="col-md-8">
								<ul class="list-group list-group-flush">
								  <li class="list-group-item"><h3>${result.Title}</h3></li>
								  <li class="list-group-item">Released: ${result.Released}</li>
								  <li class="list-group-item">Director: ${result.Director}</li>
								  <li class="list-group-item">Runtime: ${result.Runtime}</li>
								  <li class="list-group-item">Actors: ${result.Actors}</li>
								  <li class="list-group-item">Writer: ${result.Writer}</li>
								  <li class="list-group-item">Plot: ${result.Plot}</li>
								  <li class="list-group-item">Production: ${result.Production}</li>
								</ul>
							</div>
						</div>
					</div>
				`);
			} else {
				$('.modal-body').html(`
					<div class="col">
						<h1 class="text-center">${result.Error}</h1>
					</div>
				`);
			}
		}
	});
}
