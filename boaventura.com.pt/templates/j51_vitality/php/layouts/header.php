<div id="logo">
  <?php if($this->params->get('logoImage') == '1') : ?>
  <div class="logo_container">    
  <div class="logo"> <a href="index.php" title="<?php echo $siteName; ?>">
      <?php if($this->params->get('logoimagefile') == '') : ?>
          <img class="logo-image" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/images/logo.png" alt="Logo" />
      <?php elseif($this->params->get('logoimagefile') != '') : ?>
          <img class="logo-image" src="<?php echo $this->baseurl ?>/<?php echo $logoimagefile; ?>" alt="Logo" />
      <?php endif; ?>
      </a> </div>
  </div>
  <?php else : ?>
  <h1 class="logo-text"> <a href="index.php" title="<?php echo $this->params->get('siteName'); ?>"><span>
    <?php echo $this->params->get('logoText'); ?>
    </span></a> </h1>
    <p class="site-slogan"><?php echo $this->params->get('sloganText'); ?></p>
  <?php endif; ?>
</div>     
<div class="clear"></div>