<div id="header-1141" class="section section-header">
  <div class="header-panel header-logo-panel">
    
  </div>


  <div class="header-panel header-social-panel " style="margin-top:-7px;">
    
    <ul class="header-social-list" data-social-widgets="" data-social-counts="true">
      
    </ul>
    
  </div>
  <div class="small-menu ">
    <a href="#">
      <i class="icon-menu"></i>
    </a>
  </div>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p class='hero'>To illustrate the current state of start-up innovation within Australia, we have used data science methods using R to analyse a number of government data sets.  To learn more about how this data is generated, click "show code" on the right hand side".  </p>

<div id='hideshow'>
	<a href="/facts/code/">Show code</a>
	<a href="/facts/" class="active">Hide code</a>
</div>

<style>
	#header {
		display:none;
	} 
	.hero {
		font-size:120%;
		padding:20px;
		color:#444;
		background:#ddd;
		font-style:italic;
		padding:10px 40px;
		margin-top:70px;
	}
	#hideshow {
		position:fixed;
		width:400px;
		height:100px;
		top:65px;
		right:15px;
		z-index:99999;
	}
	#hideshow a {
		background:#ccc;
		display:block;
		float:right;
		padding:10px;
		color:#fff;
		border-radius:10px;
		margin-left:10px;
	}
	#hideshow a.active {
		background:teal;
	}
	#hideshow a:hover {
		color:#ddd;
		text-decoration:none;
	}
</style>

<?= $this->Html->script('jquery.js') ?>
<?= $this->Html->script('nav.js') ?>
<?= $this->Html->css('nav.css') ?>
<?php

	$state = 'Queensland';

	$contents = file_get_contents('facts/facts.html');
	$contents = str_replace('./media', './homepage/media/', $contents);
	$contents = str_replace('./static', './homepage/static/', $contents);
	$contents = str_replace('${STATE}', $state, $contents);
	print_r($contents);
?>