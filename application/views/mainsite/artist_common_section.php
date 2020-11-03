<div class="section listartist-section" >
  <div class="container">
    <div class="col-lg-12">
      <h2 class="section-header text-center" style="padding:0 0 60px;">List of Artists</h2>
    </div>
  </div>
  <div class="listartist-tab-section-bg">
    <div class="container">
      <div class="row">
          <?php //sort($etojName); 
          //array_multisort(array_column($etojName, 'first_name'), SORT_ASC, array_column($etojName, 'last_name'), SORT_ASC, $etojName);
          $artilist = array_merge($atodName, $etojName, $ktomName, $ntosName, $ttozName); ?>
			<?php $com = new common();
				$listbtn = 0; $endartist = end($artilist); 
				//echo "<pre>"; print_r($atod); echo "</pre>"; ?>
				
        <div class="col-lg-12 col-md-12 col-sm-12">
          <ul class="nav nav-tabs artistsect-tabs text-center">
              
            <?php foreach($artilist as $atozName){ 
                 
                /*echo "<br>atoz is ".$atozName['first_name'];
                echo "<br>listbtn is ".$listbtn;
                echo "<pre>";print_r($endartist);echo "</pre>";*/
                
			if($listbtn==0){ ?>
			<li class="active"><a data-toggle="tab" href="#sectionAD1"><?php $string1=$atozName['first_name'];echo $string1[0]; } if((($listbtn>0 && $listbtn<=59) && ($atozName == $endartist)) || $listbtn==59){ echo " - "; $string2=$atozName['first_name'];echo $string2[0]; ?></a></li> <?php } ?>
            <?php if($listbtn==60){ ?>
			<li><a data-toggle="tab" href="#sectionDJ1"><?php $string3=$atozName['first_name'];echo $string3[0]; } if((($listbtn>60 && $listbtn<=119) && ($atozName == $endartist)) || $listbtn==119){ echo " - "; $string4=$atozName['first_name'];echo $string4[0]; ?></a></li> <?php } ?>
            <?php if($listbtn==120){ ?>
			<li><a data-toggle="tab" href="#sectionJM1" onClick="RefreshAnimation();"><?php $string5=$atozName['first_name'];echo $string5[0]; } if((($listbtn>120 && $listbtn<=179) && ($atozName == $endartist)) || $listbtn==179){ echo " - "; $string6=$atozName['first_name'];echo $string6[0]; ?></a></li> <?php } ?>
            <?php if($listbtn==180){ ?>
			<li><a data-toggle="tab" href="#sectionMS1"><?php $string7=$atozName['first_name'];echo $string7[0]; } if((($listbtn>180 && $listbtn<=239) && ($atozName == $endartist)) || $listbtn==239){ echo " - "; $string8=$atozName['first_name'];echo $string8[0]; ?></a></li> <?php } ?>
            <?php if($listbtn==240){ ?>
			<li><a data-toggle="tab" href="#sectionSZ1"><?php $string9=$atozName['first_name'];echo $string9[0]; } if((($listbtn>240 && $listbtn<=299) && ($atozName == $endartist)) || $listbtn==299){ echo " - "; $string10=$atozName['first_name'];echo $string10[0]; ?></a></li> <?php } ?>
			<?php if($listbtn==300){ ?>
			<li><a data-toggle="tab" href="#sectionSZ1"><?php $string11=$atozName['first_name'];echo $string11[0]; } if((($listbtn>300 && $listbtn<=359) && ($atozName == $endartist)) || $listbtn==359){ echo " - "; $string12=$atozName['first_name'];echo $string12[0]; ?></a></li> <?php } ?>
			<?php $listbtn++; } ?>
		  </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="section"> 
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="tab-content listartist-tab-inner-bg">
            <div id="sectionAD1" class="tab-pane fade in active">
              <div class="row">
                 <?php 
                  $com = new common();
                  $list11 = 0;    $columnCountst11 = 0;  $normalCount = 0;
                  $totalCountst1 = count($artilist);
                  foreach($artilist as $atodNameRs){ 
                  if($list11==0 || $list11%15==0){ ?>
                    <div class="col-lg-3 col-md-3 col-sm-3" data-aos="fade-up" data-aos-once="true">
                      <div class="artists-list-box <?php if($columnCountst11==0){  echo "artists-list-box-blue"; }else if($columnCountst11==1){  echo "artists-list-box-green"; }else if($columnCountst11==2){  echo "artists-list-box-orange"; }else if($columnCountst11==3){  echo "artists-list-box-red"; }  ?>"  >
                        <ul>
                    <?php } ?>       
                      <li><a href="<?=base_url('artists/details/'.$atodNameRs['id'].'/'.$this->common->create_slug(stripslashes($atodNameRs['first_name'].' '.$atodNameRs['last_name'])))?>"><?=stripslashes($atodNameRs['first_name'].' '.$atodNameRs['last_name'])?></a></li>
                    <?php $list11++; $normalCount++; if($list11==0 || $list11%15==0 || $totalCountst1==$normalCount){ ?> 
                    </ul>
                  </div>
                </div>
               <?php  $columnCountst11++; if($columnCountst11==4){ echo "<div class='clearfix'>&nbsp;</div>"; $columnCountst11 = 0; }   //4 column sampala ki be yeel. 
                   }// closing 
                   $st1brak=60; 
                if ($list11==$st1brak) {break ;} 
               }// forloopclossing ?>
             </div>
            </div>
        


           <div id="sectionDJ1" class="tab-pane fade">
             <div class="row">
              <?php  
                  $listb = 0;    $columnCountst2 = 0;  $normalCountst2 = 0;
                  $artilist1= array_slice($artilist,60);
				  $totalCountst2 = count($artilist1);
                  foreach($artilist1 as $etojNameRs){ 
				  
                  if($listb==0 || $listb%15==0){ 
                  ?>
				  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="artists-list-box <?php if($columnCountst2==0){  echo "artists-list-box-orange"; }else 
                    if($columnCountst2==1){  echo "artists-list-box-red"; }else if($columnCountst2==2){  echo "artists-list-box-blue2"; }else if($columnCountst2==3){  echo "artists-list-box-blue3"; }  ?>" >
                      <ul>
                  <?php }   ?>       
				  <li><a href="<?=base_url('artists/details/'.$etojNameRs['id'].'/'.$this->common->create_slug(stripslashes($etojNameRs['first_name'].' '.$etojNameRs['last_name'])))?>"><?=stripslashes($etojNameRs['first_name'].' '.$etojNameRs['last_name'])?></a></li> 
				  <?php  $listb++; $normalCountst2++; if($listb==0 || $listb%15==0 || $totalCountst2==$normalCountst2){ ?> 
                    </ul>
                  </div>
                </div>
				  <?php   $columnCountst2++; if($columnCountst2==4){ echo "<div class='clearfix'>&nbsp;</div>"; $columnCountst2 = 0; }   //4 column sampala ki be yeel. 
                   }// closing 
                $st2brak=60; 
                if ($listb==$st2brak) {break ;} 
				  }// forloopclossing ?>
              </div>
            </div>


            <div id="sectionJM1" class="tab-pane fade">
             <div class="row">
              <?php  
                  $listc = 0;     $columnCountstc = 0;  $normalCountstc = 0;
				  $artilist2= array_slice($artilist,120);
                  $totalCountstc = count($artilist2);
                  foreach($artilist2 as $ktomNameRs){ 
                  if($listc==0 || $listc%15==0){ ?>
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="artists-list-box <?php if($columnCountstc==0){  echo "artists-list-box-syn"; }else 
                    if($columnCountstc==1){  echo "artists-list-box-green2"; }else if($columnCountstc==2){  echo "artists-list-box-orange2"; }else if($columnCountstc==3){  echo "artists-list-box-purpal"; }  ?>" >
                      <ul>
                  <?php }  ?>       
                   <li><a href="<?=base_url('artists/details/'.$ktomNameRs['id'].'/'.$this->common->create_slug(stripslashes($ktomNameRs['first_name'].' '.$ktomNameRs['last_name'])))?>"><?=stripslashes($ktomNameRs['first_name'].' '.$ktomNameRs['last_name'])?></a></li>
                    <?php $listc++; $normalCountstc++; if($listc==0 || $listc%15==0 || $totalCountstc==$normalCountstc){ ?> 
                    </ul>
                  </div>
                </div>
               <?php  $columnCountstc++; if($columnCountstc==4){ echo "<div class='clearfix'>&nbsp;</div>"; $columnCountstc = 0; }   //4 column sampala ki be yeel. 
                   }// closing 
                $st3brak=60; 
                if ($listc==$st3brak) {break ;} 
               }// forloopclossing ?>
              </div>
            </div>


          
             <div id="sectionMS1" class="tab-pane fade">
             <div class="row">
              <?php  
                $listd = 0;     $columnCountstd = 0;  $normalCountstd = 0;
                $artilist3= array_slice($artilist,180);
				
				/***/
				  
						$trowOne=count($artilist3);
						if($trowOne<60){$narOne=(60-$trowOne);
						$nclmOne = array();
						foreach(range(1, $narOne) as $iOne) {
						array_push($artilist3, $narOne);
						}}
						
				  /***/  
				  $totalCountstd = count($artilist3);
				foreach($artilist3 as $ntosNameRs){ 
                  if($listd==0 || $listd%15==0){ ?>
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="artists-list-box <?php if($columnCountstd==0){  echo "artists-list-box-green"; }else 
                    if($columnCountstd==1){  echo "artists-list-box-red"; }else if($columnCountstd==2){  echo "artists-list-box-blue2"; }else if($columnCountstd==3){  echo "artists-list-box-orange"; }  ?>" >
                      <ul>
                  <?php }  ?>       
                   <li><a href="<?=base_url('artists/details/'.$ntosNameRs['id'].'/'.$this->common->create_slug(stripslashes($ntosNameRs['first_name'].' '.$ntosNameRs['last_name'])))?>"><?=stripslashes($ntosNameRs['first_name'].' '.$ntosNameRs['last_name'])?></a></li>
                    <?php $listd++; $normalCountstd++; if($listd==0 || $listd%15==0 || $totalCountstd==$normalCountstd){ ?> 
                    </ul>
                  </div>
                </div>
               <?php  $columnCountstd++; if($columnCountstd==4){ echo "<div class='clearfix'>&nbsp;</div>"; $columnCountstd = 0; }   //4 column sampala ki be yeel. 
                   }// closing 
                $st4brak=60; 
                if ($listd==$st4brak) {break ;}  
               }// forloopclossing ?>
              </div>
            </div>

           <div id="sectionSZ1" class="tab-pane fade">
             <div class="row">
              <?php  
                  $liste = 0;     $columnCountste = 0;  $normalCountste = 0;
				  $artilist4= array_slice($artilist,240);
                  $totalCountste = count($artilist4);
                  foreach($artilist4 as $ttozNameRs){ 
                  if($liste==0 || $liste%15==0){ ?>
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="artists-list-box <?php if($columnCountste==0){  echo "artists-list-box-green"; }else 
                    if($columnCountste==1){  echo "artists-list-box-orange"; }else if($columnCountste==2){  echo "artists-list-box-blue"; }else if($columnCountste==3){  echo "artists-list-box-red"; }  ?>" >
                      <ul>
                  <?php }  ?>       
                   <li><a href="<?=base_url('artists/details/'.$ttozNameRs['id'].'/'.$this->common->create_slug(stripslashes($ttozNameRs['first_name'].' '.$ttozNameRs['last_name'])))?>"><?=stripslashes($ttozNameRs['first_name'].' '.$ttozNameRs['last_name'])?></a></li>
                    <?php $liste++; $normalCountste++; if($liste==0 || $liste%15==0 || $totalCountste==$normalCountste){ ?> 
                    </ul>
                  </div>
                </div>
                <?php  $columnCountste++; if($columnCountste==4){ echo "<div class='clearfix'>&nbsp;</div>"; $columnCountste = 0; }   //4 column sampala ki be yeel. 
                   }// closing 
                $st5brak=60; 
                if ($liste==$st5brak) {break ;}   
               }// forloopclossing ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
