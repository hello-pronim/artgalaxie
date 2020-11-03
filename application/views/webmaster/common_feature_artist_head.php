	<div class="ibox-content m-b-sm border-bottom">
		<div class="p-xs">
		<!-- 	<div class="m-b-md"><img alt="image" class="img-circle circle-border" src="https://s3.amazonaws.com/uifaces/faces/twitter/ok/128.jpg"></div> -->
			<h2>
				Artist Name : <?=stripslashes($userDetails['first_name']." ".$userDetails['last_name'])?>
				<?php if($userDetails['is_featured']!='0000-00-00'){ ?>   &nbsp;
				<a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i>&nbsp;Featured</a><?php } ?>
				
				<span class="pull-right"><a  href="<?=site_url('webmaster/user/othersections/'.$userId)?>" 
					class="btn btn-info btn-xs"> << Back</a></span>
			</h2>
			<h4>Category: <span class="font-noraml"><?=stripslashes($galleryName)?></span></h4>
			<h4>Style : <span class="font-noraml"><?=stripslashes($styleName)?></span></h4>
		</div>
	</div>