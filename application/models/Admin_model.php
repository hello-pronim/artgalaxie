<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    // ----------------------- CMS SECTION -------------------------------
    function num_cms_pages($where = array()){
        $select ="pageid, page_title, page_status";
        $tbl="tbl_cms_pages";
        return $numRec = $this->common->getnumRow( $tbl, $where );
    }
    function get_cms_pages($where = array()){
        $select ="pageid, page_title, page_status";
        $tbl="tbl_cms_pages";
        
        if($this->num_cms_pages()>0){
            return $this->common->getAllRowArray( $select, $tbl, $where );
        }else return 0;
    }
    function get_subpages($parent_pageid){
        $where = array( 'parent_page_id' => $parent_pageid);
        return $this->get_cms_pages($where);
    }
    function setGalleryImageUnFeatured($userId,$id=0){
        $data=array('is_feature'=>0);
        if($id>0){
            $this->db->where_not_in('id',$id);
        }
        $this->db->where('user_id',$userId);
        $this->db->update('tbl_artist_gallery',$data);
    }
    
    
    function getOtherPageSlidersNumRow($where = array()){
       
        $tbl="tbl_image_video_slider";
        return $numRec = $this->common->getnumRow( $tbl, $where );
    }
    function getOtherPageSliders($where = array()){
        $select ="*";
        $tbl="tbl_image_video_slider";
        if($this->getOtherPageSlidersNumRow()>0){
            return $this->common->getAllRowArray( $select, $tbl, $where );
        }else return 0;
    }
    function deletePublicationsBooks($deleteId){
        $where= array("id " => $deleteId);
        $dataRs = $this->common->getOneRowArray("*","tbl_publication_book_images",$where);
        @unlink('./page/thumb/'.$dataRs['image_name']);
        @unlink('./page/'.$dataRs['image_name']);
        $this->common->delete_entry("tbl_publication_book_images",$where);
        return true;
    }
    

    function recursiveFilter($pid=0,$selectId=''){
      $strname = '';
      $where =  array('pid' => $pid );
        $row1 = $this->common->getAllRowArray( '*', 'tbl_blog_filter', $where );
        foreach ($row1 as $row  ){
            $selected1 = '';
            if($selectId!=''){
                 $selectedValueArray = explode(',',$selectId);
                  if(@in_array($row['id'],$selectedValueArray,true)){
                            $selected1 = " selected = 'selected'";
                 } 
            }
           
           
          $strname.='<option value="'.$row['id'].'"'.$selected1.'"><b>'.$row['cat_name'].'</b></option>';
              $isParent =  $this->common->getnumRow( 'tbl_blog_filter',array('pid' => $row['id'] ));
                if($isParent>0){
                    $row1 = $this->common->getAllRowArray( '*', 'tbl_blog_filter', array('pid' => $row['id'] ) );
                    foreach ($row1 as $rowRs1  ){

                        $selected2 = '';
                        if($selectId!=''){
                              if(@in_array($rowRs1['id'],$selectedValueArray,true)){
                                        $selected2 = " selected = 'selected'";
                             } 
                        }

                         $strname.='<option value="'.$rowRs1['id'].'"'.$selected2.'"><b>&nbsp;&nbsp;&nbsp;'.$rowRs1['cat_name'].'</b></option>';
                         $isParent1 =  $this->common->getnumRow( 'tbl_blog_filter',array('pid' => $rowRs1['id'] ));
                              if($isParent1>0){
                                $row2 = $this->common->getAllRowArray( '*', 'tbl_blog_filter', array('pid' => $rowRs1['id'] ) );
                                foreach ($row2 as $rowRs2  ){
                                     $selected3 = '';
                                     if($selectId!=''){
                                              if(@in_array($rowRs2['id'],$selectedValueArray,true)){
                                                        $selected3 = " selected = 'selected'";
                                             } 
                                        }
                                $strname.='<option value="'.$rowRs2['id'].'"'.$selected3.'"><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rowRs2['cat_name'].'</strong></option>';
                                }
                        
                        }

                    }
                }
            
        }
         return $strname;
     
    }
    
    
    
    

     
   
}?>