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

        public function update_entry( $tbl, $entries, $where)
        {
            $this->db->update( $tbl, $entries, $where);
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
        public function getAllRowArray( $select, $tbl, $where ){
            $this->db->select($select);
            $this->db->from($tbl);
            $this->db->where($where);
            $query = $this->db->get();
            
            return $rs = $query->result_array();
        }
        public function getSiteLogo(){
            $whereUp = 
            $res = $this->getOneRow('website_logo','`tbl_admin`',array('id' => '1'));
            return $res->website_logo;
        }
     /*  public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        */
}?>