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

    function num_categories($where = array()){
        $tbl="tbl_cms_pages";
        return $numRec = $this->common->getnumRow( $tbl, $where );
    }
    function get_categories($where = array()){
        $select ="cat_id, cat_name, p_id";
        $tbl="tbl_category_master";
        
        if($this->num_categories()>0){
            return $this->common->getAllRowArray( $select, $tbl, $where );
        }else return 0;
    }
    // ----------------------- User SECTION -------------------------------
    function num_users($where = array()){
         $tbl="tbl_user_master";
        return $numRec = $this->common->getnumRow( $tbl, $where );
    }
    function getUserList($select,$where = array()){
        $tbl="tbl_user_master";
        if($this->num_cms_pages()>0){
            return $this->common->getAllRowArray( $select, $tbl, $where );
        }else return 0;
    }
    function getUserList1($select,$where = array(),$order_by=''){
        $tbl="tbl_user_master";
        if($this->num_cms_pages()>0){
            return $this->common->getAllRowArray1( $select, $tbl, $where,$order_by );
        }else return 0;
    }
    
}?>