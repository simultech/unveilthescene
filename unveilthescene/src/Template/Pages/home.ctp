<?php
	$contents = file_get_contents('homepage/index.html');
	$contents = str_replace('./media', './homepage/media/', $contents);
	$contents = str_replace('./static', './homepage/static/', $contents);
	print_r($contents);
?>