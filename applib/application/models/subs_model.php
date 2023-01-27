<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subs_model extends CI_Model {

	
        public function comment_save($data) {
         $this->db->insert('ses_tbl_comments', $data);
        }
        
        public function get_profile() {
            return $this->db->where('subsId',  $this->session->userdata('subsId'))->get('subscriptions')->row();
        }
        public function get_orders(){
            return $this->db->where('subsId',  $this->session->userdata('subsId'))->join('ordersdetail','ordersdetail.orderNo=orders.orderId')->join('products','products.productId=ordersdetail.productId')->order_by('date','desc')->get('orders')->result();
        }
        
        public function get_subscriptions() {
            return $this->db->where('subrId',  $this->session->userdata('subrId'))->order_by('subsStartDate','DESC')->get('ses_tbl_subscription')->result();
        }
        function get_book_id_by_grdId($grdId){
            return $this->db->where('grdId',  $grdId)->get('ses_tbl_gradebooks')->row()->bokId; // getting any book from gradebook table.
        }
        
}
