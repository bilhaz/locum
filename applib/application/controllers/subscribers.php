<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class subscribers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('asia/karachi');
       //ini_set('output_buffering' ,'on');
       if(!($this->session->userdata('subsId'))){
           redirect('home/login');
           exit();
       }
        $this->load->model('admin_model');
        $this->load->model('subs_model');
        $this->load->model('site_model');
        $this->load->library("cart");
        date_default_timezone_set("Asia/Karachi");
        $this->load->library('user_agent');
        if (!($this->agent->is_mobile()))
            {
                echo '<script>window.location.replace("http://supplementstown.pk/");</script>';
            }
//            else {
//            if ($_SERVER["SERVER_PORT"] != 443)
//            {
//                redirect(str_replace("http://", "https://" , current_url()), "refresh");
//            }
//            }
    }

    public function profile() {
//	$this->load->helper('text');
//            $data['cats']=$this->admin_model->get_cats();
        $data['profile'] = $this->subs_model->get_profile();
//            print_r($data);exit;
        $data['page'] = 'profile';
        $this->load->view('template', $data);
    }

    public function update_profile() {
//        print_r($this->session->userdata('subrId'));exit;
        $result = $this->base_model->array_from_posts();
        unset($result['rules']['subsPassword']);
        unset($result['rules']['subsConfPassword']);
        $this->form_validation->set_rules($result['rules']);
        if ($this->form_validation->run() == TRUE) {
            if ($result['data']['subsPassword'] == $result['data']['subsConfPassword']) {
                if (!empty($result['data']['subsPassword']))
                    unset($result['data']['subsConfPassword']);
                else {
                    unset($result['data']['subsPassword']);
                    unset($result['data']['subsConfPassword']);
                }
                $this->db->where('subrId',$result['data']['subrId']);
                $this->db->update('subscriptions', $result['data']);
                $this->session->set_flashdata('msg', 'Profile Update Successfully');
                redirect('subscribers/profile');
            } else {
                $this->session->set_flashdata('msg', 'Profile not updated (Password Not Matched) please try again');
                redirect('subscribers/profile');
            }
        } else {
            $this->profile();
        }
    }

    public function orders() {
//	$this->load->helper('text');
//            $data['cats']=$this->admin_model->get_cats();
        $data['orders'] = $this->subs_model->get_orders();
//            print_r($data);exit;
        $data['page'] = 'orders';
        $this->load->view('template', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_userdata('login_msg', 'Logout');
        redirect('home/login');
    }

}
