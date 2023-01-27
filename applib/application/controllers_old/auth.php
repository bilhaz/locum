<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
            $this->login();
	}
        public function login()
	{
		$this->load->view('login/login');
	}
         public function can_login()
	{
            $data['password']=$this->input->post('password');
            $data['email']=$this->input->post('emails');
             $this->load->model('auth_model');
            if($this->auth_model->can_login($data)){
                $data['title']='Login';
                //$data['page']='admin/student';
                redirect(site_url('admin'));
            }
            else{
                $this->session->set_userdata('login_msg','ہم معذرت خواہ ہیں آپ کا اندراج ضحیح نہیں');
                redirect('auth');
            }
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */