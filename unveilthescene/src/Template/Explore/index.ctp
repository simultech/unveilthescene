<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgfam8f4RewusCspcfX_kqnIOlt54yAVw&callback=initMap">
    </script>
<div id="header" data-spy="affix" data-offset-top="0px">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Unveil the scene</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">The Startup Story <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="#">Explore our country</a></li>
      </ul>
    </div>
  </div>
</nav>
<h1>Unveil the scene</h1>
<form>
  <div class="form-group">
    <input type="text" id="explore-input" class="form-control" placeholder="Filter">
  </div>
</form>
</div>
<div id="sidebar">
	<div id="map" style="width:100%; height:50%;"></div>
	<div id="tagcloud" style="width:100%; height:50%;"></div>
</div>
<div id="explore-list"></div>



<!-- TEMPLATES -->

<script id="investor-template" type="text/x-handlebars-template">
  <div class="entry entry_investor">
    <h1><a href="{{user_link}}" target="_blank">{{user_name}}</a></h1>
    <div class="description">{{user_description}}</div>
    <div class="location">Located in {{location}}</div>
    <div class="investments">Investments: {{investments}}</div>
    <div class="followers">Angel List Followers: {{followers}}</div>
  </div>
</script>


<script id="startup-template" type="text/x-handlebars-template">
  <div class="entry entry_startup">
    <h1><a href="{{user_link}}" target="_blank">{{user_name}}</a></h1>
    <div class="description">{{user_description}}</div>
    <div class="location">Located in {{location}}</div>
    <div class="followers">Angel List Followers: {{followers}}</div>
  </div>
</script>

<script id="aq-template" type="text/x-handlebars-template">
  <div class="entry entry_aq">
    <h1>{{program}}</h1>
    <h2>{{sector}}</h2>
    <h3>{{recipient}}</h3>
    <div class="description">{{summary}}</div>
    <div class="location">Located in {{location}}</div>
    <div class="partner">Partner {{partner}}</div>
    <div class="funding">${{funding}}</div>
    <div class="priority">{{priority}}</div>
    <div class="timeframe_months">{{timeframe_months}} months</div>
  </div>
</script>

