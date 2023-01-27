
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class site_model extends CI_Model {
      
        // Main Menu
        public function get_section_post($id){
            $this->db->select('tbl_section.secName,tbl_post.*');   
            $this->db->order_by('tbl_post.postDate','ASC');   
            $this->db->join('tbl_section','tbl_section.secId=tbl_post.secId');   
            $this->db->where('tbl_post.secId',$id);   
            $query=$this->db->get('tbl_post');
            $result=$query->result();
            return $result;
        }
        public function get_section_name($id){
            $this->db->select('tbl_section.secName');   
            $this->db->where('tbl_section.secId',$id);   
            $query=$this->db->get('tbl_section');
            $result=$query->row_array();
            return $result['secName'];
        }
        public function getItemList($key){
            $this->db->select('productTitle');   
//            $this->db->order_by('productTitle','ASC');   
//            $this->db->like('productTitle', strtolower(urldecode($key)));  
//            $this->db->limit(15,0);  
            $query=$this->db->get('products');
            $result=$query->result();
            return $result;
        }
        public function getNextId()
    {
        $next = $this->db->query("SHOW TABLE STATUS LIKE 'orders'");
        $next = $next->row(0);
        $next->Auto_increment;
        return $next->Auto_increment;

//        $strSQL = "SELECT AUTO_INCREMENT "
//                . " FROM information_schema.tables "
//                . " WHERE table_name = " . $this->_table_name 
//                . " AND table_schema = " . $this->db->database;
    }
    }