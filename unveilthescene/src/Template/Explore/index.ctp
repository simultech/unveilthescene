    <?= $this->Html->script('everything.js') ?>
	<?= $this->Html->css('font-awesome.min.css') ?>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgfam8f4RewusCspcfX_kqnIOlt54yAVw&callback=initMap"></script>
	<div id="big-searchBar">
		<form>
		  <div class="form-group">
		    <input type="text" id="explore-input" autocomplete="off" class="form-control text-center" placeholder="Type to Start Exploring" autofocus>
		  </div> 
		</form>
	</div>

<div id="exploreBody" class="row">
	<h3 class='suggest_heading'>Suggestions</h3>
	<div class="" id="explore_sugestions">
		<!-- here comes all the suggestions when user lands in this page-->
		<div class="suggestion" onClick="addSuggestion('farm');">
			<i class='fa fa-tree'></i>
			farm
		</div>
		<div class="suggestion" onClick="addSuggestion('food');">
			<i class='fa fa-birthday-cake'></i>
			food
		</div>
		<div class="suggestion" onClick="addSuggestion('phd');">
			<i class='fa fa-graduation-cap'></i>
			phd
		</div>
		<div class="suggestion" onClick="addSuggestion('social');">
			<i class='fa fa-user'></i>
			social
		</div>
		<div class="suggestion" onClick="addSuggestion('mining');">
			<i class='fa fa-truck'></i>
			mining
		</div>
		<div class="suggestion" onClick="addSuggestion('travel');">
			<i class='fa fa-plane'></i>
			travel
		</div>
		<div class="suggestion" onClick="addSuggestion('environment');">
			<i class='fa fa-recycle'></i>
			environment
		</div>
		<div class="suggestion" onClick="addSuggestion('silicon');">
			<i class='fa fa-money'></i>
			silicon
		</div>
	</div>
	<div class="row" id="main_area">
		<div id="explore-list" class="col-sm-6 pull-right "></div>
		<div id="sidebar">
			<div class="col-sm-6 pull-left" style="height: 100%;width: 50%; position: relative">
				<div id="map"></div>
				<div id="tagcloud"></div>
			</div>
		</div>
	</div>
</div>

<!-- TEMPLATES -->

<script id="investor-template" type="text/x-handlebars-template">
  <div class="entry entry_investor panel panel-default">
<!-- 	   <div class="panel-heading"></div> -->
  	<div class="panel-body">
	  	<div class="col-sm-3 rich_media">
		  			  	<img src={{photo}}>

	  	</div>
    <h2 class="psh"><a href="{{user_link}}" target="_blank">{{user_name}}</a></h2>
    <div class="description psh">{{user_description}}</div>
    <div class="location psh">Located in <strong>{{location}}</strong></div>
    <div class="investments psh">Investments: <strong>{{investments}}</strong></div>
    <div class="followers psh">Angel List Followers: <strong>{{followers}}</strong></div>
	  	  </div>
  	</div>
  </div>
</script>


<script id="startup-template" type="text/x-handlebars-template">
  <div class="entry entry_startup panel panel-default r">
<!--   	<div class="panel-heading"> </div> -->
	<div class="panel-body">
	  	<div class="col-sm-3 rich_media" >
		  	<img src={{logo}}>
	  	</div>
		<div class="col-sm-9">
	  	  <h2><a href="{{user_link}}" target="_blank">{{user_name}}</a></h2>
	  	  <div class="description">{{user_description}}</div>
	  	  <div class="location">Located in <strong>{{location}}</strong></div>
	  	  <div class="location">Categories: <strong>{{tags}}</strong></div>
	  	  <div class="location">Website: <strong><a href="{{website}}" target="_blank">{{website}}</a></strong></div>
	  	  <div class="followers">Angel List Followers: <strong>{{followers}}</strong></div>
	 </div>
	</div>
  </div>
</script>

<script id="aq-template" type="text/x-handlebars-template">
  <div class="entry entry_aq panel panel-default">
	  <div class="panel-body">
		<div class="col-sm-12">
    <h1>{{program}}</h1>
    <h2>{{sector}}</h2>
    <h3>{{recipient}}</h3>
    <div class="description">{{summary}}</div>
    <div class="location">Located in {{location}}</div>
    <div class="partner">Partner <strong>{{partner}}</strong></div>
    <div class="funding">Funding: <strong>${{funding}}</strong></div>
    <div class="priority"><strong>{{priority}}</strong></div>
    <div class="timeframe_months">Timeframe: <strong>{{timeframe_months}} months</strong></div>
	  </div>
	  </div>
  </div>
</script>

<script id="research-template" type="text/x-handlebars-template">
  <div class="entry entry_research panel panel-default">
	  <div class="panel-body">
		<div class="col-sm-12">
    <h1>{{Name}}</h1>
    <h3>{{Sector}}</h3>
    <h4>{{recipient}}</h4>
    <div class="description">{{Description}}</div>
    <div class="partner">Located in <strong>{{Suburb}}</strong></div>
    <div class="funding">Postcode: <strong>{{Postcode}}</strong></div>
    <div class="funding">Keywords: <strong>{{keywords}}</strong></div>
    <div class="location">Website: <strong><a href="{{Weblink}}" target="_blank">{{Weblink}}</a></strong></div>
	  </div>
	  </div>
  </div>
</script>

<style>
	div#tagcloud span {
		cursor: pointer;
		transition:transform 200ms ease-in-out;
	}
	div#tagcloud span:hover {
		transform:scale(1.25);
	}
</style>
