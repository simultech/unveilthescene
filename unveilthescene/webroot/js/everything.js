var maxItems = 100;
var lastSearch = '';

$(document).ready(function() {
	$('#explore-input').keyup(function() {
		
		if (lastSearch === $('#explore-input').val()) {
			return;
		}
		
		var filters = $('#explore-input').val().toLowerCase().split(' ');
		
		var toRenderItems = [];
		
		resetItems();
		shuffle(items);
		var curItems = 0;
		for(var i in items) {
			var context = items[i];
			context['rating'] = 0;
			for(var f in filters) {
				if (filters[f] !== '' && context['_search'].indexOf(filters[f]) !== -1) {
					context['rating']++;
				}
			}
			if (context['rating'] > 0) {
				toRenderItems.push(context);
				curItems++;
				if(curItems > maxItems) {
					break;
				}
			}
		}
		
		var yuckwords = [];
		
		toRenderItems.sort(comparez);
		for(i in toRenderItems) {
			addItem(toRenderItems[i]);
			yuckwords = yuckwords.concat(toRenderItems[i]['_search'].split(' '));
		}
		
		lastSearch = $('#explore-input').val();
		
		
		//var yuckwords = ['mat','mat','sat','sat','sat','sat'];
		
		var objwords = {};
		for(var y in yuckwords) {
			if (yuckwords[y] !== 'startup') {
				if (!objwords[yuckwords[y]]) {
					objwords[yuckwords[y]] = 0;
				}
				objwords[yuckwords[y]]++;
			}
		}
		var words = [];
		for(var o in objwords) {
			if (objwords[o] > 1) {
				var obj = {};
				obj['text'] = o;
				obj['weight'] = objwords[o];
				words.push(obj);
			}
		}
		$('#tagcloud').jQCloud('destroy');
		$('#tagcloud').jQCloud(words);
	});
});

function comparez(a,b) {
  if (a.rating < b.rating)
    return 1;
  if (a.rating > b.rating)
    return -1;
  return 0;
}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function resetItems() {
	$('#explore-list').empty();
}

function addItem(context) {
	var el = doRender(context);
	$('#explore-list').append($(el));
}

function doRender(context) {
	var source   = $("#"+context['_template']+"-template").html();
	var template = Handlebars.compile(source);
	var html    = template(context);
	return html;
}

var items = [];

function loadData() {
	urls = {
		'aq': '/api/aq-funding-recipients',
		'investor': '/api/angel_list_investors',
		'startup': '/api/angel_list_startups',
	};
	for(var url in urls) {
		(function() {
			var typ = url;
			$.ajax({
				dataType: "json",
				url: urls[url],
				success: function(data) {
					for(var dat in data) {
						data[dat]['_template'] = typ;
						data[dat]['_search'] = '';
						for(var attr in data[dat]) {
							data[dat]['_search'] += ' '+data[dat][attr].toLowerCase();
						}
					}
					items = items.concat(data);
				}
			});
		})(url);
	}
}

function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }

loadData();