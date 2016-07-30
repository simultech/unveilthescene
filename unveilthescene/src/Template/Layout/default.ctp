<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    	Unveil the scene
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('handlebars-v4.0.5.js') ?>
    <?= $this->Html->script('jqcloud.js') ?>
    <?= $this->Html->script('everything.js') ?>

	<?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('jqcloud.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
