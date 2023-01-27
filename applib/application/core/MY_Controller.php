<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    
    public function __construct() {        
       parent::__construct();
       date_default_timezone_set('asia/karachi');
       //ini_set('output_buffering' ,'on');
       if(!($this->session->userdata('email'))){
           redirect('auth');
           exit();
       }
   }
 
}