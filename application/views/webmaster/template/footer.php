<div class="footer">
    <div class="pull-right"><strong><?=SITENAME?></strong></div>
    <div><strong>Copyright</strong> <?=SITENAME?> &copy; <?=date('Y')?>
    
    
    <?php
    	$currentLiveSiteCount = 4500000;
		$newSiteCunt  =  $this->common->getnumRow('tbl_visitor',array('1' => 1 ));
		$allCount  = $currentLiveSiteCount + $newSiteCunt;
		
        $query2 = $this->db->query(" select  * FROM tbl_visitor WHERE date( `visited_date_time` ) > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY id DESC");
        $todayCount = $query2->num_rows(); 

        $query = $this->db->query("select * FROM tbl_visitor WHERE  date( `visited_date_time` ) = UTC_DATE() - INTERVAL 1 DAY");
        $yesterdaysCount = $query->num_rows();   
       

        $queryWeekdate = $this->db->query(" select * FROM tbl_visitor WHERE date( `visited_date_time` ) > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY id DESC");
        $weekCount = $queryWeekdate->num_rows(); 

        $queryMonthdate = $this->db->query("  select * FROM tbl_visitor WHERE date( `visited_date_time` ) > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY id DESC ");
        $monthCount = $queryMonthdate->num_rows(); 


        $queryLastMonth = $this->db->query("select * FROM tbl_visitor WHERE  date( `visited_date_time` ) = CURDATE() - INTERVAL 1 MONTH");
        $lastMonthCount = $queryLastMonth->num_rows();   

        //$myIp = $this->input->ip_address();

       echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>Total Count: </b>".$allCount;
       echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>Today Count: </b>".$todayCount;
       echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>Yesterday Count: </b>".$yesterdaysCount;
    ?>
    
    </div>
</div>