<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
    <ul class="nav navbar-nav nav-justified">
        <li class="dropdown m4"><a href="#" href="#" data-toggle="dropdown" class="dropdown-toggle"><?=stripslashes($parentCat[0]['cat_name'])?></a>
            <ul class="dropdown-menu">
            <?php  
            $subCats2 =  $this->common->getFilterHavingParentId($parentCat[0]['id']);
            foreach($subCats2 as $subCatsRs2){  
                $isSubSubExists2 = $this->common->checkIfparent($subCatsRs2['id']);  
                if( $isSubSubExists2>0){  //subcategories exits.. ?>
                <li class="dropdown-submenu">
                    <div class="submenudiv">
                        <a class="test" tabindex="-1" href="#"><?=stripslashes($subCatsRs2['cat_name'])?></a>
                        <ul class="dropdown-menu">
                        <?php   
                        $subSubCats2 =  $this->common->getFilterHavingParentId($subCatsRs2['id']);
                        foreach($subSubCats2 as $subSubCatsRs2){    ?>
                            <li><a tabindex="-1" href="<?=site_url('blog/filter/'.$subSubCatsRs2['id'].'/'.$this->common->create_slug($subSubCatsRs2['cat_name']))?>"><?=stripslashes($subSubCatsRs2['cat_name'])?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </li>
                <?php }else{ ?>
                <li><a href="<?=site_url('blog/filter/'.$subCatsRs2['id'].'/0/'.$this->common->create_slug($subCatsRs2['cat_name']))?>"><?=stripslashes($subCatsRs2['cat_name'])?></a></li>
                <?php } }  ?>
            </ul>
        </li>
        
        <li class="dropdown m1">
            <div class="submenudiv">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?=stripslashes($parentCat[1]['cat_name'])?></a>
                <ul class="dropdown-menu">
                <?php  
                $subCats1 =  $this->common->getFilterHavingParentId($parentCat[1]['id']);
                foreach($subCats1 as $subCatsRs1){   ?>
                    <li><a href="<?=site_url('blog/filter/'.$subCatsRs1['id'].'/'.$this->common->create_slug($subCatsRs1['cat_name']))?>"><?=stripslashes($subCatsRs1['cat_name'])?></a></li>
                <?php } ?>
                </ul>
            </div>
        </li>
        <li class="dropdown m2">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?=stripslashes($parentCat[2]['cat_name'])?></a>
            <ul class="dropdown-menu">
            <?php  
            $subCats =  $this->common->getFilterHavingParentId($parentCat[2]['id']);
            foreach($subCats as $subCatsRs){  
                $isSubSubExists = $this->common->checkIfparent($subCatsRs['id']);  
                if( $isSubSubExists>0){  //subcategories exits.. ?>
                <li class="dropdown-submenu">
                    <div class="submenudiv">
                        <a class="test" tabindex="-1" href="<?=site_url('blog/filter/'.$subCatsRs['id'].'/'.$this->common->create_slug($subCatsRs['cat_name']))?>"><?=stripslashes($subCatsRs['cat_name'])?></a>
                        <ul class="dropdown-menu">
                        <?php   
                            $subSubCats =  $this->common->getFilterHavingParentId($subCatsRs['id']);
                            foreach($subSubCats as $subSubCatsRs){    ?>
                            <li><a tabindex="-1" href="<?=site_url('blog/filter/'.$subSubCatsRs['id'].'/'.$this->common->create_slug($subSubCatsRs['cat_name']))?>"><?=stripslashes($subSubCatsRs['cat_name'])?></a></li>
                        <?php } ?>
                         </ul>
                    </div>
                </li>
                <?php }else{ ?>
                <li><a href="#"><?=stripslashes($subCatsRs['cat_name'])?></a></li>
                <?php } }  ?>
               <!--  <li><a href="#">World Region</a></li>
                <li><a href="#">Style</a></li> -->
            </ul>
        </li>
        <li class="dropdown m3">
            <div class="submenudiv">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?=stripslashes($parentCat[3]['cat_name'])?></a>
                <ul class="dropdown-menu">
                <?php  
                $subCats1 =  $this->common->getFilterHavingParentId($parentCat[3]['id']);
                foreach($subCats1 as $subCatsRs1){   ?>
                    <li><a href="<?=site_url('blog/filter/'.$subCatsRs1['id'].'/'.$this->common->create_slug($subCatsRs1['cat_name']))?>"><?=stripslashes($subCatsRs1['cat_name'])?></a></li>
                <?php } ?>
                </ul>
            </div>
        </li>
        
        <li class="m5">
            <form name="blog-from-search" id="blog-from-search" method="post" action="<?=site_url('blog/filter')?>" >
                <input type='hidden' name="search_mode" id="search_mode" value="1">
                <input type="text" placeholder="Search..." class="blog-srch" id="search-blog"  name="search_blog" onKeyPress="javascript: submitSearchForm();" autocomplete="off">
            </form>
        </li>
    </ul>
</div><!-- /.navbar-collapse -->
