
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class base_model extends CI_Model {
      
        public function array_from_posts() {
        $data['data'] = array();
        $data['rules']=array();
        foreach (array_keys($this->input->post()) as $field) {
            //echo $this->input->post($field) . '<BR>';
            $data['data'][$field] = $this->input->post($field);
            
            // validation
            
        $data['rules'][$field] = array(
            'field' => $field,
            'label'=>'',
            'rules' => 'required'//|callback__unique_code'
                );
        }

        return $data;
    }
    public function array_from_post_from_rules() {
        $data = array();

        foreach (array_keys($this->input->post()) as $field) {
            //echo $this->input->post($field) . '<BR>';
            $data[$field] = $this->input->post($field);
        }

        return $data;
    }
        
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
        
        public function get_categories_by_author($id){
            $this->db->select('*');
            $this->db->where('autId',$id);
            return $this->db->get('categories')->result();
        }
        
        public function get_books($id){
            $this->db->select('*');
            $this->db->where('products.catId',$id);
            $this->db->join('categories','categories.catId=products.catId');
            $this->db->order_by('products.seqNo','ASC');
            return $this->db->get('products')->result();
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
        
        public function get_authors(){
            $this->db->select('*');  
            $query=$this->db->get('authors');
            return $query->result();
        }
        
         
        public function get_categories(){
            $this->db->select('*');
            $this->db->order_by('order_no','ASC');
            $query=$this->db->get('categories');
            
            $result=$query->result();
            return $result;
        }
        
        
                
    }
    

