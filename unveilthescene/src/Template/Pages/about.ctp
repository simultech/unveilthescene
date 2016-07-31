<?= $this->Html->script('jquery.js') ?>
<?= $this->Html->script('nav.js') ?>
<?= $this->Html->css('nav.css') ?>
<style>
.scrollmation-two-column .scrollmation-slides {
	display:none;
}
aside {
	display:none !important;
}
.story .two-column-grid {
	background-color: inherit !important;
}
</style>
<?php
	$contents = file_get_contents('about/index.html');
	print_r($contents);
?>