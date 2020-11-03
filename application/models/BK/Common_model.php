<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {
        public function __construct()
        {
               // Call the CI_Model constructor
              parent::__construct();
        }
        public function insert_entry( $tbl, $entries )
        {
            $this->db->insert($tbl, $entries);
        }
        public function update_entry( $tbl, $update_array, $where_array)
        {
            if (is_array($update_array) && is_array($where_array)) 
            {
                $this->db->where($where_array);
                if($this->db->update($tbl,$update_array))
                {                
                    return true;
                }   
                else
                {
                    return false;
                }   
            } 
            else 
            {
                return false;
            }
        }
        public function delete_entry( $tbl, $where)
        {
            $this->db->delete( $tbl, $where);
        }
        public function getnumRow( $tbl, $where ){
            $this->db->where($where);
            return $num = $this->db->count_all_results( $tbl );
        }
        public function getOneRow( $select, $tbl, $where ){
            $num = $this->getnumRow( $tbl, $where );
            if ($num>0) {
                $this->db->select( $select );
                $this->db->from( $tbl );
                $this->db->where( $where );
                $query = $this->db->get();

                return $data = $query->row();
            }else return 0;
        }
        public function getOneRowArray( $select, $tbl, $where ){
            $num = $this->getnumRow( $tbl, $where );
            if ($num>0) {
                $this->db->select( $select );
                $this->db->from( $tbl );
                $this->db->where( $where );
                $query = $this->db->get();

                return $data = $query->row_array();
            }else return 0;
        }
        public function getAllRow( $select, $tbl, $where ){
            $this->db->select($select);
            $this->db->from($tbl);
            $this->db->where($where);
            $query = $this->db->get();
            
            return $rs = $query->result();
        }
        
        public function getAllRowArray( $select, $tbl, $where){
            $this->db->select($select);
            $this->db->from($tbl);
            $this->db->where($where);
            
            $query = $this->db->get();
            return $rs = $query->result_array();
        }
        public function getAllRowArray1( $select, $tbl, $where,$order_by = ''){
            $this->db->select($select);
            $this->db->from($tbl);
            $this->db->where($where);
            $this->db->order_by($order_by);
            $query = $this->db->get();
            return $rs = $query->result_array();
        }
        public function getSiteLogo(){
            $whereUp = 
            $res = $this->getOneRow('website_logo','`tbl_admin`',array('id' => '1'));
            return $res->website_logo;
        }
        public function add_records($table_name,$insert_array)
        {
            if (is_array($insert_array)) 
            {
                if ($this->db->insert($table_name,$insert_array))
                    return true;
                else
                    return false;
            }
            else 
            {
                return false; 
            }
        }
        public function genRandomString()
        {
            $length = 8;
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $string = '';    
            for ($p = 1; $p <=$length; $p++) {
                @$string .= $characters[mt_rand(0, strlen($characters))];
            }
            return $string;
         }  
        public function generateHashPassword($passwordValue)
         {
            if (!$passwordValue){
                return false;
            }else{
                if ( CRYPT_BLOWFISH && defined("CRYPT_BLOWFISH")) {
                    $saltValue = '$2y$11$' . substr(md5 (uniqid(rand(), true)), 0, 22);
                    return crypt($passwordValue, $saltValue);
                }  
            }
        }
        public function verifyHashPassword($passwordPlain,$hashedPassword) {
            if (!$passwordPlain || !$hashedPassword){
                return false;  //  echo "<br/>>>>>NOT MATCH";
            }else{
               $UserEnteredHash = crypt($passwordPlain, $hashedPassword);
                if($UserEnteredHash==$hashedPassword){
                    //echo "<br/> 1".crypt($passwordPlain, $hashedPassword);
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function getLogo(){
        $logo_data = $this->getOneRow("website_logo","tbl_admin","id =1");
        return $logo_data->website_logo;
        }
        
        
     
    //=============== 
     
}?>