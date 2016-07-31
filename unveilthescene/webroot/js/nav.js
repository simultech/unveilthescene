var nav = [
	'<a href="/">Setting the scene</a>',
	'<a href="/explore/">Explore the scene</a>',
	'<a href="/facts/">Innovation facts</a>',
	'<a href="/stories/">Tell us your story</a>',
	'<a href="/about/">About</a>',
];

$('document').ready(function() {
	var act = -1;
	switch(window.location.pathname) {
		case '/':
			act = 0;
			break;
		case '/explore/':
			act = 1;
			break;
		case '/facts/':
			act = 2;
			break;
		case '/stories/':
			act = 3;
			break;
		case '/stories':
			act = 3;
			break;
		case '/tell/':
			act = 3;
			break;
		case '/about/':
			act = 4;
			break;
	}
	if(act > -1) {
		nav[act] = nav[act].replace('href', 'class="active" href');
	}
	var dommm = $('<div id="unveil-nav"></div>');
	dommm.append(nav);
	$('.section.section-header').append(dommm);
});