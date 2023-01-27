<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Auth_model extends CI_Model {
      
        public function can_login($data){
            
            $this->db->select('*');
            $this->db->where($data);
            $query=$this->db->get('users')->row_array();
            //echo $this->db->last_query();exit;
            if($this->db->affected_rows()<1):
                return FALSE;
            else: 
                $id=$query['email'];
                $name=$query['name'];
                
                
                $this->session->set_userdata(array('email'=>$id,'name'=>$name));
              
                return TRUE;
            
            endif;
                      
        }
        public function is_logged_in(){
            
        }
        
        
    }
    

