<!DOCTYPE html>
<html>
<head>
 <? $this->load->view('webmaster/template/head'); ?>
  <!-- Data Tables -->

 
 <link data-require="datatables@*" data-semver="1.9.4" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables_themeroller.css" />
  <link data-require="datatables@*" data-semver="1.9.4" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.css" />
  <link data-require="datatables@*" data-semver="1.9.4" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table_jui.css" />
  <link data-require="datatables@*" data-semver="1.9.4" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table.css" />
  <link data-require="datatables@*" data-semver="1.9.4" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_page.css" />
  <script src="https://code.jquery.com/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery@2.0.3"></script>
  <script data-require="datatables@*" data-semver="1.10.12" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  
  
</head>
<body>
<div id="alert_popover1">
    <div class="wrapper1">
         <div class="content-notify">
            <?php 
            $i = 1; 
            $count = count($dataDsn); 
            foreach($dataDsn as $dataRs1)
            { 
                if($i == $count) 
                { 
                ?>
                <div class="alert alert_default1">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <small><em> <?php  echo stripslashes($dataRs1['notification_text']); ?></em></small>
                </div>
                <?php 
                }
            $i++; 
            } 
            ?>
         </div>
    </div>
</div>
   
<? $this->load->view('webmaster/template/head'); ?>
<div id="wrapper">
    <!--- Nav start -->
    <? $this->load->view('webmaster/template/left_nav'); ?>
    <!--- Nav end -->
    <div id="page-wrapper" class="gray-bg dashbard-1">
      <? $this->load->view('webmaster/template/top'); ?>
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
          <h2>Notification  </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Notification</a></li>
            <li class="active"><strong>Notifications</strong></li>
          </ol>
        </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                <!--  <div class="ibox-title"></div> -->
                <br>
                <?php 
                if($this->session->flashdata('Success'))
                {
                ?>
                    <div class="alert alert-success alert-dismissable" align="center">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?=$this->session->flashdata('Success')?>
                    </div>
                <?php 
                } 
                ?>
                
                <div class="table-filter-title">
                <h3>Filter by:</h3>
                </div>
                <div class="table-filter">
                    <input onchange="filterme()" type="checkbox" name="type" value="New User">New User
                    <input onchange="filterme()" type="checkbox" name="type" value="New Comments">New Comments
                    <input onchange="filterme()" type="checkbox" name="type" value="Profile Update">Profile Update
                    <input onchange="filterme()" type="checkbox" name="type" value="Text Update">Text Update
                    <input onchange="filterme()" type="checkbox" name="type" value="Video Update">Video Update
                    <input onchange="filterme()" type="checkbox" name="type" value="New Video">New Video
                    <input onchange="filterme()" type="checkbox" name="type" value="New Gallery">New Gallery
                </div>
                
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                	<div class="ibox-title ">
                  <h5 class="pull-left">Notification List</h5>
                   <div class="clearfix"> </div>
                  </div>
                	<div class="panel-body">
                		<div class="table-responsive" style="overflow:  hidden;">
                			<form name="frmcustlist" method="post"  class="form-horizontal" > 
                                <table class="table table-striped table-bordered table-hover dataTables-example" id="dt" cellspacing="0" >
                				<thead>
                					<tr>
                						<th>Type</th>
                						<th>From</th>
                						<th>Notification</th>
                						<th>On</th>
                						<th>Status</th>
                					</tr>
                				</thead>
                				<tbody>
                				    <?php 
                				    $i=1;
                				    foreach ($dataDs as $row) { ?>
                				    <tr>
                				        <td><?php echo $row['notification_type']; ?></td>
                				        <td><?php echo $row['notification_from_user_id']; ?></td>
                				        <td><?php echo $row['notification_text']; ?></td>
                				        <td><?php echo $row['notification_datetime']; ?></td>
                				        <td style="text-align:  center;">
                				            <?php if($row['notification_status']=='Seen'){ ?>
                				            <a href="#">
                				            <i id="ns_'.$i.'" class="fa fa-eye change_noti" aria-hidden="true"  style="cursor:pointer;color: #9b9b9b;"></i>
                				            </a>&nbsp; &nbsp; 
                				            <a href="<?=site_url('webmaster/site_activity/delete/'.$row['id']);?>">
                				            <i id="ns_'.$row['id'].'" class="fa fa-trash-o change_noti" aria-hidden="true" title="delete"></i>
                				            </a>
                				            <?php 
                				            }else{ 
                				            ?>
                				            
                				            <a href="<?=site_url('webmaster/site_activity/update/'.$row['id']);?>">
                				            <i id="ns_'.$row['id'].'" class="fa fa-eye change_noti" aria-hidden="true" title="click to change status to SEEN" style="cursor:pointer;color: #1dca20;"></i>
                				            </a>
                				            &nbsp; &nbsp; 
                				            <a href="<?=site_url('webmaster/site_activity/delete/'.$row['id']);?>">
                				            <i id="ns_'.$row['id'].'" class="fa fa-trash-o change_noti" aria-hidden="true" title="delete"></i>
                				            </a>
                				            <?php 
                				            } 
                				            ?>
                				        </td>
                				    </tr>
                				    <?php 
                				        $i++;
                				    }
                				    ?>
                				</tbody>
                			</table>
                			 </form> 
                		</div>
                	</div>
                </div>
		        <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <? $this->load->view("webmaster/template/footer")?>
    </div>
</div>
<!-- Mainly scripts -->
<? $this->load->view('webmaster/template/bot_script'); ?>
<!-- Data Tables -->
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
<!-- Page-Level Scripts -->
<script>
$(document).ready(function() {
  $('.dataTables-example').dataTable({
    responsive: true,
    "aaSorting": []
  });
});
</script>

<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>webmaster/site_activity/ajaxPaginationData/'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>
<script>
// Code goes here

$(function() {
  otable = $('#dt').dataTable();
})

function filterme() {
  //build a regex filter string with an or(|) condition
  var types = $('input:checkbox[name="type"]:checked').map(function() {
    return '^' + this.value + '\$';
  }).get().join('|');
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(types, 0, true, false, false, false);

  //use radio values
  var frees = $('input:radio[name="free"]:checked')[0].value;
  //now filter in column 2, with no regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(frees, 2, false, false, false, false);
}
</script>

</body>
</html>
