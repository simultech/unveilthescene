<?= $this->Html->script('isotope.js') ?>

<div class='container'>
	<div class="jumbotron">Your story matters
	<a href="/tell/">Tell us your story</a>
	</div>
	<h2>Other Australian stories</h2>
</div>

<div id='stories'>
<?php
	foreach($stories as $story) {
?>
	<div class='story'>
	<div class='inner'>
		<h3>I am a <?php echo $story['sector']; ?> from <?php echo $story['location']; ?></h3>
		<p><?php echo $story['story']; ?></p>
		<p class='date'>Added at <?php echo $story['created']; ?></p>
	</div>
	</div>
<?php
	}
?>
</div>

<script>
$('#stories').isotope({
  itemSelector: '.story',
});
setTimeout(function() {
	$('#stories').isotope('layout');
}, 200);
</script>


<style>
	.jumbotron {
		margin-top:100px;
		font-size:280%;
	}
	div.container {
		text-align:center;
	}
	div.container a {
		font-size:120%;
		font-weight:bold;
		display:block;
		color:teal;
	}
	div.story {
		width:400px;
		padding:20px;
	}
	div.inner {
		border:1px solid #eee;
		border-radius:4px;
		background:#fafafa;
		padding:10px;
		color:#333;
	}
</style>