    <?= $this->Html->script('everything.js') ?>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgfam8f4RewusCspcfX_kqnIOlt54yAVw&callback=initMap"></script>
	<div id="big-searchBar">
		<form>
		  <div class="form-group">
		    <input type="text" id="explore-input" class="form-control text-center" placeholder="Start Exploring">
		  </div> 
		</form>
	</div>

<div id="exploreBody" class="row">
	<div class="" id="explore_sugestions">
		<!-- here comes all the suggestions when user lands in this page-->
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
	  	<div class="col-sm-3">
		  			  	<img src={{somethng}}>

	  	</div>
	  		<div class="col-sm-9 rich_media">

    <h2><a href="{{user_link}}" target="_blank">{{user_name}}</a></h2>
    <div class="description">{{user_description}}</div>
    <div class="location">Located in {{location}}</div>
    <div class="investments">Investments: {{investments}}</div>
    <div class="followers">Angel List Followers: {{followers}}</div>
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
	  	  <div class="location">Located in {{location}}</div>
	  	  <div class="followers">Angel List Followers: {{followers}}</div>
	 </div>
	</div>
  </div>
</script>

<script id="aq-template" type="text/x-handlebars-template">
  <div class="entry entry_aq panel panel-default">
	  <div class="panel-body">
		  	  	<div class="col-sm-3 rich_media">
			  	  			  	<img src={{somethng}}>
		  	  	</div>

		<div class="col-sm-9">
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
	  </div>
  </div>
</script>
