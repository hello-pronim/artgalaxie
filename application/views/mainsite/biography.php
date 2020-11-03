<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body>
<?php $this->load->view('mainsite/common/header');?>
<div class="slider4-section">
	<div class="container">
		<div class="row">        
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div data-aos-once="true" data-aos="fade-up" class="aos-init aos-animate">
					<div class="create-account-form-bg" data-aos-once="true" data-aos="fade-up">
						<h2 class="create-account-form-heding text-center">My Biography</h2>
						<div class="create-account-form">
							<form action="<?=site_url($fieldName);?>" name="frm_pass" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="curr_pass">Biography</label>
											<textarea class="form-control" rows="15"  id="description" name="description" placeholder="Description" required><?=@$artist_data[$fieldName]?></textarea>
											<span class="help-block text-danger">
											<?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
											</span>  
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
										<button type="submit" class="btn btn-primary create-account-submit-btn">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<? $this->load->view('mainsite/common/footer');?>
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script>
<script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script>
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script type="text/JavaScript">
AOS.init({
easing: 'ease-out-back',
duration: 1500
});
</script>
<script src="<?=base_url()?>front_assets/readmore.js"></script>
<? $this->load->view('mainsite/common/login-registration-common-js');?>
</body>
</html>