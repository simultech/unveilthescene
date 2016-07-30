var nav = [
	'<a href="/">Setting the scene</a>',
	'<a href="/explore/">Explore the data</a>',
	'<a href="/tell/">Tell your story</a>',
	'<a href="/about/">About us</a>',
];

$('document').ready(function() {
	nav
	var dommm = $('<div id="unveil-nav"></div>');
	dommm.append(nav);
	$('.section.section-header').append(dommm);
});