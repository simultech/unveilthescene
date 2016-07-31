<?= $this->Html->script('jquery.js') ?>
<?= $this->Html->script('nav.js') ?>
<?= $this->Html->css('nav.css') ?>

<style>
aside {
	visibility:hidden;
}
</style>
<script>
$('document').ready(function() {
	setTimeout(function() {
		$('aside').css({visibility:'visible'});		
	}, 8000);
});
</script>

<?php

	$state = 'Queensland';

	$contents = file_get_contents('homepage/index.html');
	$contents = str_replace('./media', './homepage/media/', $contents);
	$contents = str_replace('./static', './homepage/static/', $contents);
	$contents = str_replace('${STATE}', $state, $contents);
	print_r($contents);
?>