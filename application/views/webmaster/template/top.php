<?php 	
    $select ="*";
    $where = array('1' => '1','notification' => '0' );
    $tbl_testimonials="tbl_testimonials";
    $tbl_guestbook="tbl_guestbook";
    $num_rec_testimonials = $this->common->getnumRow($tbl_testimonials,$where); 
    $num_rec_guestbook = $this->common->getnumRow($tbl_guestbook,$where);
    
    $data['dataDsn']='';
    $select_nft ="*";
    $where_nft = array('notification_status' => 'Pending');
    $tbl_user_master    ="notifications";
    $num_rec_nft = $this->common->getnumRow($tbl_user_master,$where_nft);
?>
<div class="row border-bottom">
	<nav style="margin-bottom: 0" role="navigation" class="navbar navbar-static-top">
		<div class="navbar-header">
			<a href="#" class="navbar-minimalize minimalize-styl-2 btn btn-primary "><i class="fa fa-bars"></i> </a>
		</div>
		<ul class="nav navbar-top-links navbar-right">
			<li class="divider"></li>
			<li> <a href="<?=site_url('webmaster/site_activity')?>">Site Activity<?php if($num_rec_nft==0) {} else { ?><span class="badge badge-danger"><?= $num_rec_nft;?></span><?php } ?></a></li>
			<li> <a href="<?=site_url('webmaster/guestbook/notification_guestbook')?>">Guestbook<?php if($num_rec_guestbook==0) {} else { ?><span class="badge badge-danger"><?= $num_rec_guestbook;?></span><?php } ?></a></li>
			<li> <a href="<?=site_url('webmaster/Testimonials/notification_testimonial')?>">Testimonial<?php if($num_rec_testimonials==0) {} else { ?><span class="badge badge-danger"><?= $num_rec_testimonials;?></span><?php } ?></a></li>
			<li> <a href="<?=site_url('home')?>" target="_blank"><i class="fa fa-sign-out"></i>View Website</a></li>
			<?php if($this->session->userdata('ADMIN_ID')!=""){ ?>
            <li> <a href="<?=site_url("webmaster/login/logoff");?>"> <i class="fa fa-sign-out"></i> Log out </a> </li>
            <?php }else{ ?>
            <li> <a href="<?=site_url("webmaster/secure");?>"> <i class="fa fa-sign-out"></i> Login Now </a> </li>
            <?php }?>
		</ul>
	</nav>
</div>