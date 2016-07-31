<?= $this->Html->script('isotope.js') ?>

<div class='container'>
	<div class="jumbotron">Your story matters
	<a href="/tell/">Tell us your story</a>
	</div>
	<h2>Other Australian stories</h2>
</div>

<?php
	$stories = array(
		array(
			'sector'=>'farming',
			'from'=>'Queensland',
			'story'=>'This is my story I am a fisherman and I like fish and I would like to see more fish in the ocean because fish are good'
		),
		array(
			'sector'=>'farming',
			'from'=>'Queensland',
			'story'=>'This is my story I am a fisherman and I like fish and I would like to see more fish in the ocean because fish are good'
		),
		array(
			'sector'=>'farming',
			'from'=>'Queensland',
			'story'=>'This is my story I am a fisherman and I like fish and I would like to see more fish in the ocean because fish are good'
		),
		array(
			'sector'=>'farming',
			'from'=>'Queensland',
			'story'=>'This is my story I am a fisherman and I like fish and I would like to see more fish in the ocean because fish are good'
		),
	);
?>


<div id='stories'>
<?php
	foreach($stories as $story) {
?>
	<div class='story'>
	<div class='inner'>
		<h3>From <?php echo $story['sector']; ?> in <?php echo $story['from']; ?></h3>
		<p><?php echo $story['story']; ?></p>
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