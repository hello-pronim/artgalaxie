<? $act_id='CMS';?>
<!DOCTYPE html>
<html>
<head>
    <? $this->load->view('webmaster/template/head'); ?>
    <link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?=base_url()?>webmaster_assets/ckeditor/ckeditor.js"></script>
</head>
<body >
<div id="wrapper">
    <!--- Nav start -->
    <? $this->load->view('webmaster/template/left_nav'); ?>
    <!--- Nav end -->
    <div id="page-wrapper" class="gray-bg dashbard-1">
    
    <? $this->load->view('webmaster/template/top'); ?>
    
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
              <h2>Art Of Giving</h2>
              <ol class="breadcrumb">
                <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
                <li><a>Manage View Competitions</a></li>
                <li class="active"><strong>View Competitions</strong></li>
              </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_of_giving/view_competitions')?>">Back to the list</a>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row ">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?=$btnCapt?> Categories</h5>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="ibox-content">
                         <? if($this->session->flashdata('Error')){ ?>
                         <div class="alert alert-danger alert-dismissable" align="center">
                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                          <?=$this->session->flashdata('Error')?>
                        </div>
                        <? } ?>
                        <form action="<?=site_url('webmaster/art_of_giving/manage_view_competitions/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">&nbsp;Competitions Name/Title</label>
                            <div class="col-lg-10">
                                <input  type="text" name="comp_title" id="comp_title" class="form-control"  value="<?=@$form_data['comp_title']?>">
                                <span class="help-block text-danger">
                                    <?php if(form_error('comp_title')!=""){  echo  form_error('comp_title'); } ?>
                                </span>  
                            </div>  
                       </div>
                       
                        <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;Competitions Introduction</label>
                                <div class="col-lg-10">
                                <textarea name="comp_intro" id="comp_intro" class="form-control"  rows="7"><?=@$form_data['comp_intro']?></textarea>
                                <span class="help-block text-danger">
                                     <?php if(form_error('comp_intro')!=""){  echo  form_error('comp_intro'); } ?>
                                </span>  
                             </div>  
                        </div>
                        
                            <?php 
                            $artist=''; 
                            if(@$form_data['artist_name']!='')
                            {
                                $artist = @explode(',',$form_data['artist_name']); 
                            }
                            ?>
                            <div class="form-group">
                             <label class="col-lg-2 control-label">Artist</label>
                              <div class="col-lg-10">
                                <select name="user_artist[]" id="user_artist" class="form-control" multiple <?php if($id==0){ ?> required <?php } ?>> 
                                  <?php foreach ($user_artist as $user_artistRs) { ?>
                                     <option value="<?=stripslashes($user_artistRs['id'])?>" <?php if(@in_array($user_artistRs['id'],$artist,true)){ ?>  selected="selected" <?php } ?>>
                                      <?=stripslashes($user_artistRs['first_name']." ".$user_artistRs['last_name'])?>
                                    </option>
                                  <?php }?>
                                </select>
                               <span class="help-block text-danger">
                                  <?php if(form_error('user_artist')!=""){  echo  form_error('user_artist'); } ?>
                                </span> 
                              </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;From Date</label>
                                <div class="col-lg-10">
                                <div class='input-group date' id='datetimepicker6'>
                                   <input type="text" name="from_date" id="from_date" class="form-control" value="<?=@$form_data['from_date']?>" style="width:205px">
                                    <span class="input-group-addon" style="width:0%">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <span class="help-block text-danger">
                                  <?php if(form_error('from_date')!=""){  echo  form_error('from_date'); } ?>
                                </span>  
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                 <label class="col-lg-2 control-label">&nbsp;To Date</label>
                                 <div class="col-lg-10">
                                      <div class='input-group date' id='datetimepicker7'>
                                            <input type="text" name="to_date" id="to_date" class="form-control" value="<?=@$form_data['to_date']?>" style="width:205px">
                                            <span class="input-group-addon" style="width:0%">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        <span class="help-block text-danger">
                                          <?php if(form_error('to_date')!=""){  echo  form_error('to_date'); } ?>
                                        </span>  
                                 </div>  
                            </div>
                            
                            <div class="form-group"><label class="col-lg-2 control-label">Banner Image</label>
                                <div class="col-lg-10">
                                    <div class="radio i-checks">
                                         <input type="file" name="banner_image" id="banner_image" > 
                                         <input type="hidden" name="old_banner_image" id="old_banner_image"  value="<?=@$form_data['banner_image']?>" <? if($id==0){ ?> required <?php } ?>> 
                                         <span style="font-size:10px;color:gray;">Image Size (1920 X 747)<span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php 
                            $artist=''; 
                            if(@$form_data['winner_user_id']!='')
                            {
                                $artist = @explode(',',$form_data['winner_user_id']); 
                            }
                            ?>
                            <div class="form-group">
                             <label class="col-lg-2 control-label">Winner Artist</label>
                              <div class="col-lg-10">
                                <select name="winner_user_id" id="user_artist" class="form-control" <?php if($id==0){ ?> required <?php } ?>> 
                                    <option value="0">None</option>
                                  <?php foreach ($user_artist as $user_artistRs) { ?>
                                     <option value="<?=stripslashes($user_artistRs['id'])?>" <?php if(@in_array($user_artistRs['id'],$artist,true)){ ?>  selected="selected" <?php } ?>>
                                      <?=stripslashes($user_artistRs['first_name']." ".$user_artistRs['last_name'])?>
                                    </option>
                                  <?php }?>
                                </select>
                               <span class="help-block text-danger">
                                  <?php if(form_error('user_artist')!=""){  echo  form_error('user_artist'); } ?>
                                </span> 
                              </div>
                            </div>
        
                            <div class="form-group">
                                 <label class="col-lg-2 control-label">&nbsp;Status</label>
                                 <div class="col-lg-10">
                                    <select name="comp_status" class="form-control" style="width:205px">
                                     <?php
                                        if($btnCapt=='add')
                                        {
                                     ?>
                                      <option value="None" selected>None</option>
                                      <option value="Running">Running</option>
                                      <option value="Close">Close</option>
                                     
                                     <?php
                                        }else{
                                     ?>
                                     
                                      <option value="None" <?php if ($form_data['comp_status'] == 'None'){ echo 'selected'; } ?>>None</option>
                                      <option value="Running" <?php if ($form_data['comp_status'] == 'Running'){ echo 'selected'; } ?>>Running</option>
                                      <option value="Close" <?php if ($form_data['comp_status'] == 'Close'){ echo 'selected'; }?>>Close</option>
                                     
                                     <?php
                                        }
                                    ?>
                                     
                                    </select>
                                 </div>  
                            </div>
                            
        
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?>" name="btnsave">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? $this->load->view("webmaster/template/footer")?>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() 
{
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
});
</script>
</body>
</html>