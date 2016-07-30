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
    <?= $this->Html->css('nav.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    
<?= $this->Html->script('nav.js') ?>
    
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
    
    <?= $this->fetch('content') ?>
</body>
</html>
