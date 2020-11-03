<?php

?>

<div id="bottom2_modules" class="block_holder">


<?php if($this->params->get('bottom2_auto') != '1') : ?>
<?php if ($this->countModules('bottom-2a') || $this->countModules('bottom-2b') || $this->countModules('bottom-2c') || $this->countModules('bottom-2d') || $this->countModules('bottom-2e') || $this->countModules('bottom-2f')) { ?>
		<div id="wrapper_bottom-2" class="block_holder_margin">
		<?php if ($this->countModules('bottom-2a')) { ?> 
		<div class="bottom-2" style="width:<?php echo $bottom2_width ?>;"><jdoc:include type="modules" name="bottom-2a" style="mod_standard"/></div><?php } ?>
		<?php if ($this->countModules('bottom-2b')) { ?>
		<div class="bottom-2" style="width:<?php echo $bottom2_width ?>;"><jdoc:include type="modules" name="bottom-2b" style="mod_standard"/></div><?php } ?>
		<?php if ($this->countModules('bottom-2c')) { ?>
		<div class="bottom-2" style="width:<?php echo $bottom2_width ?>;"><jdoc:include type="modules" name="bottom-2c" style="mod_standard"/></div><?php } ?>
		<?php if ($this->countModules('bottom-2d')) { ?>
		<div class="bottom-2" style="width:<?php echo $bottom2_width ?>;"><jdoc:include type="modules" name="bottom-2d" style="mod_standard"/></div><?php } ?>
		<?php if ($this->countModules('bottom-2e')) { ?>
		<div class="bottom-2" style="width:<?php echo $bottom2_width ?>;"><jdoc:include type="modules" name="bottom-2e" style="mod_standard"/></div><?php } ?>
		<?php if ($this->countModules('bottom-2f')) { ?>
		<div class="bottom-2" style="width:<?php echo $bottom2_width ?>;"><jdoc:include type="modules" name="bottom-2f" style="mod_standard"/></div><?php } ?>
	<div class="clear"></div>
    </div>					
    <?php }?>
					
<?php else : ?>

<?php if ($this->countModules('bottom-2a') || $this->countModules('bottom-2b') || $this->countModules('bottom-2c') || $this->countModules('bottom-2d') || $this->countModules('bottom-2e') || $this->countModules('bottom-2f')) { ?>
    <div id="wrapper_top-2" class="block_holder_margin">
        <?php if ($this->countModules('bottom-2a')) { ?> 
        <div class="bottom-2" style="width:<?php echo $bottom_2a_manual ?>%;"><jdoc:include type="modules" name="bottom-2a" style="mod_standard"/></div><?php } ?>
        <?php if ($this->countModules('bottom-2b')) { ?>
        <div class="bottom-2" style="width:<?php echo $bottom_2b_manual ?>%;"><jdoc:include type="modules" name="bottom-2b" style="mod_standard"/></div><?php } ?>
        <?php if ($this->countModules('bottom-2c')) { ?>
        <div class="bottom-2" style="width:<?php echo $bottom_2c_manual ?>%;"><jdoc:include type="modules" name="bottom-2c" style="mod_standard"/></div><?php } ?>
        <?php if ($this->countModules('bottom-2d')) { ?>
        <div class="bottom-2" style="width:<?php echo $bottom_2d_manual ?>%;"><jdoc:include type="modules" name="bottom-2d" style="mod_standard"/></div><?php } ?>
        <?php if ($this->countModules('bottom-2e')) { ?>
        <div class="bottom-2" style="width:<?php echo $bottom_2e_manual ?>%;"><jdoc:include type="modules" name="bottom-2e" style="mod_standard"/></div><?php } ?>
        <?php if ($this->countModules('bottom-2f')) { ?>
        <div class="bottom-2" style="width:<?php echo $bottom_2f_manual ?>%;"><jdoc:include type="modules" name="bottom-2f" style="mod_standard"/></div><?php } ?>
        <div class="clear"></div>
     </div>
    <?php }?>
<?php endif; ?>

</div>

