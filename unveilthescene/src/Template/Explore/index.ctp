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
<div id="explore-list"></div>



<!-- TEMPLATES -->

<script id="investor-template" type="text/x-handlebars-template">
  <div class="entry">
    <h1><a href="{{user_link}}" target="_blank">{{user_name}}</a></h1>
    <div class="description">{{user_description}}</div>
    <div class="location">Located in {{location}}</div>
    <div class="investments">Investments: {{investments}}</div>
    <div class="followers">Angel List Followers: {{followers}}</div>
  </div>
</script>


<script id="startup-template" type="text/x-handlebars-template">
  <div class="entry">
    <h1><a href="{{user_link}}" target="_blank">{{user_name}}</a></h1>
    <div class="description">{{user_description}}</div>
    <div class="location">Located in {{location}}</div>
    <div class="followers">Angel List Followers: {{followers}}</div>
  </div>
</script>

<script id="aq-template" type="text/x-handlebars-template">
  <div class="entry">
    <h1>{{program}})</h1>
    <h2>{{sector}}</h2>
    <div class="body">
      {{collaborator}}
    </div>
  </div>
</script>