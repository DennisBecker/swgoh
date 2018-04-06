$(document).ready(function() {
	$('.collapse').click(function(event) {
		event.preventDefault();
		console.log(event.target);
	});
});