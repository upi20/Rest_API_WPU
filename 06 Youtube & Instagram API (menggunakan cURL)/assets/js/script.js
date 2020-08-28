$(document).ready(function(){
	$(".page-scroll").on('click', function(event) {
		if (this.hash !== "") {
			$('html, body').animate({
				scrollTop: ($(this.hash).offset().top)-56
			}, 800);
			event.preventDefault();
		}
	});

});