
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class base_model extends CI_Model {
      
        // Main Menu
        public function get_main_menus($fields){
            $this->db->select($fields);
            $this->db->order_by('sequence','ASC');
            $query=$this->db->get('main_menus');
            $result=$query->result();
            return $result;
        }
        public function get_favrite(){
            $this->db->select('*');
//            $this->db->order_by('favId','ASC');
            $query=$this->db->get('pyzie_frontfavrite');
            $result=$query->result();
            return $result;
        }
        public function get_subcat_name($id){
            $this->db->select('name');
            $this->db->where('subCatId',$id);
            $query=$this->db->get('subcategories');
            $result=$query->row();
            return $result->name;
        }
        
        public function get_stypes(){
            $this->db->select('*');  
            $this->db->order_by('stId','Asc'); 
            $query=$this->db->get('substypes');
            $result=$query->result();
            return $result;
        }
        // Cats
        public function get_subcats(){
            $this->db->select('*');  
            $this->db->order_by('catId','Asc'); 
            $query=$this->db->get('subcategories');
            $result=$query->result();
            return $result;
        }
        
         
        public function get_categories(){
            $this->db->select('*');
            $this->db->order_by('order_no','ASC');
            $query=$this->db->get('categories');
            
            $result=$query->result();
            return $result;
        }
        
        
                
    }
    

