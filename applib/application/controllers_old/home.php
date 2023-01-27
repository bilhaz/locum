<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
        public function __construct() {
            parent::__construct(); 
            $this->load->model('admin_model');
            $this->load->model('site_model');
            $this->load->library("cart");
            date_default_timezone_set("Asia/Karachi");
            $this->load->library('user_agent');
//            if ($_SERVER["SERVER_PORT"] != 443)
//            {
//                redirect(str_replace("http://", "https://" , current_url()), "refresh");
//            }
            if (!($this->agent->is_mobile()))
            {
                echo '<script>window.location.replace("http://supplementstown.pk/");</script>';
            }
        }
	public function index()
	{   
//	$this->load->helper('text');
//            $data['cats']=$this->admin_model->get_cats();
            $data['slides']=$this->admin_model->get_slides();
            $data['page']='home';
            $this->load->view('template',$data);
	}
        public function getItemList($key='')
	{
		//echo json_encode($this->modProducts->getList(),JSON_PRETTY_PRINT);
		
		$items = $this->site_model->getItemList($key);
		$itemsArr = array();
		
		if(count($items)){
		foreach($items as $item)
		{
			// ritmId,ritmCode,ritmItem,ritmStock,supSupplier,cmpCompany,dptDepartment
			$itemsArr[] =
				$item->productTitle;									//6 //8

		}
                }
		
		echo json_encode($itemsArr);
    }
        public function products($subCat)
	{   
            $res=$this->admin_model->get_subcat($subCat);
            $data['subcatName']=$res['name'];
            $data['products']=$this->admin_model->get_products_by_subcat($subCat);
            $data['page']='products';
            $this->load->view('template',$data);
	}
        public function product_details($id)
	{   
            $data['product']=$this->admin_model->get_product($id);
            $data['page']='product_details';
            $this->load->view('template',$data);
	}
        public function suggest()
	{   
            $data['page']='suggest';
            $this->load->view('template',$data);
	}
        public function place_suggestion()
	{   
           $data['sugName']=$this->input->post('name');
            $data['sugMobile']=$this->input->post('mobile');
            $data['sugAddress']=$this->input->post('address');
            $data['sugComment']=$this->input->post('comment');
            $data['sugDate']=date('Y-m-d');
            $this->admin_model->add_suggest_product($data);
//            echo '<script>alert("Your suggestion has been succesfully submitted, we will try our best to add your demanded product to our stock and contact you. Thank You!"); window.location="'.  site_url('home').'"; </script>';
	redirect('home/suggest_msg');
            
        }
        public function suggest_msg()
	{   
           $data['page']='suggest_msg';
            $this->load->view('template',$data);
            
        }
        public function pages($id)
	{   
            $data['pages']=$this->admin_model->get_main_menu($id);
            $data['page']='main_pages';
            $this->load->view('template',$data);
	}
	 
	public function promotions()
	{   
            
            $data['page']='promotions';
            // Pagination
            $this->load->library('pagination');
            $data['products']=$this->admin_model->get_promotion_products(20,$this->uri->segment(3));
            $config['base_url']=site_url("home/promotions/");
            $config['total_rows']=$this->admin_model->get_promotion_products_rows();
            $config['per_page']=20;
            $config['uri_segment']=3;
            $config['num_links'] =4;
            $config['full_tag_open'] = '<ul class="pagination pull-right" style="margin-top:0px">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tagl_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tagl_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item disabled">';
            $config['first_tagl_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tagl_close'] = '</a></li>';
//            $config['use_page_numbers'] = TRUE;
            $config['attributes'] = array('class' => 'page-link');
            $this->pagination->initialize($config); // model function
            //
            $this->load->view('template',$data);
	}
        
        public function search($key=0)
	{   
           $data['page']='search';
            if(!($key))
                $key=$this->input->get('search');
            
            // Pagination
            $this->load->library('pagination');
            $data['products']=$this->admin_model->get_products_by_search($key,50,$this->uri->segment(4));
            $config['base_url']=site_url("home/search/$key/");
            $config['total_rows']=$this->admin_model->total_rows($key);
            $config['per_page']=50;
            $config['uri_segment']=4;
            $config['num_links'] =4;
            $config['full_tag_open'] = '<ul class="pagination pull-left" style="margin-top:0px;margin-left:13px;">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tagl_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tagl_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item ">';
            $config['first_tagl_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tagl_close'] = '</a></li>';
//            $config['use_page_numbers'] = TRUE;
            $config['attributes'] = array('class' => 'page-link');
            $this->pagination->initialize($config); // model function
            //
            $this->load->view('template',$data);
	}
//        public function contact_us()
//	{   
//            $data['page']='contact_us';
//            $this->load->view('template',$data);
//	}
//        public function email_subscribe(){
//            $this->load->library('form_validation');
//            $this->form_validation->set_rules('email','Email','valid_email|required|unique[subs_email.email]');
//            $data['email']=$this->input->post('email');
//            if($this->form_validation->run() == FALSE){
//                    print '<script type="text/javascript">'."alert('".  trim(preg_replace('/\s\s+/', ' ', strip_tags(validation_errors()))) .". Please Try Again');document.location='".site_url($this->input->get('url'))."';
//                         </script>";
//            }
//           else {
//               $this->admin_model->add_email($data);
//               print '<script type="text/javascript">'."alert('Congrats! Your Email has been registered, Your will get our products news.');document.location='".site_url($this->input->get('url'))."';
//                         </script>";
//           }
//            
//	}
        public function mobile_subscribe()
	{   
             $this->load->library('form_validation');
            $this->form_validation->set_rules('mobile','Mobile Number','numeric|required|min_length[11]|max_length[11]');
            $data['mobile']=$this->input->post('mobile');
            if($this->form_validation->run() == FALSE){
                    print '<script type="text/javascript">'."alert('".  trim(preg_replace('/\s\s+/', ' ', strip_tags(validation_errors()))) .". Please Try Again');document.location='".site_url($this->input->get('url'))."';
                         </script>";
            }
           else {
               $this->admin_model->add_mobile($data);
               print '<script type="text/javascript">'."alert('Congrats! Your Mobile Number has been registered, Your will get our products news.');document.location='".site_url($this->input->get('url'))."';
                         </script>";
           }
	}
        public function category($name='',$id='')
	{   
            if($name==''||$id==''){
                redirect ('home');
            }
            $data['page']='category';
            $data['id']=$id;
            $data['name']=$name;
            // Pagination
            $this->load->library('pagination');
            $data['products']=$this->admin_model->get_products_by_cat($id,50,$this->uri->segment(5));
            $config['base_url']=site_url("home/category/$name/$id/");
            $config['total_rows']=$this->admin_model->get_products_by_cat_rows($id);
            $config['per_page']=50;
            $config['uri_segment']=5;
            $config['num_links'] =4;
            $config['full_tag_open'] = '<ul class="pagination pull-left" style="margin-top:0px;margin-left:13px;">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tagl_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tagl_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item ">';
            $config['first_tagl_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tagl_close'] = '</a></li>';
//            $config['use_page_numbers'] = TRUE;
            $config['attributes'] = array('class' => 'page-link');
            $this->pagination->initialize($config); // model function
            //
            $this->load->view('template',$data);
	}
        
//        public function section($name,$id)
//	{   
//            $data['page']='section';
//            $data['id']=$id;
//            $data['name']=$name;
//            $this->load->view('template',$data);
//	}
	 public function submit_suggestions()
	{   
             $this->load->library('form_validation');
            $this->form_validation->set_rules('contact','Mobile Number','numeric|required|min_length[11]|max_length[11]');
            $this->form_validation->set_rules('msg','Message','required|min_length[20]');
            $data['contact']=$this->input->post('contact');
            $data['msg']=$this->input->post('msg');
            if($this->form_validation->run() == FALSE){
                    print '<script type="text/javascript">'."alert('".  trim(preg_replace('/\s\s+/', ' ', strip_tags(validation_errors()))) .". Please Try Again');document.location='".site_url($this->input->get('url'))."';
                         </script>";
            }
           else {
               $this->admin_model->add_suggestion($data);
               print '<script type="text/javascript">'."alert('Your Message has been submited. Thank you');document.location='".site_url($this->input->get('url'))."';
                         </script>";
           }
	}
        function add_cart(){
            $this->load->library("cart");
            if($this->cart_item_check($_POST["product_id"])!=true){
            
            $data = array(
                "id"  => $_POST["product_id"],
                "name"  => $_POST["product_name"],
                "image"  => $_POST["product_image"],
                "qty"  =>$_POST["quantity"],
                "price"  => $_POST["product_price"],
                
             );
            $this->cart->product_name_rules = '\d\D';
            $this->cart->insert($data);    }
            
        }
        function cart_item_check($id){
            foreach($this->cart->contents() as $items)
                            {
                             if($items['id']==$id){
                                 if($items['qty']<5)
                                 $items['qty']+=1;
                                 $this->cart->update($items);
                                 return true;
                             }
                            }
        }
        function load_cart(){
            $output='';
            $count = 0;
            $total=0;
              $output.='<div class="modal-dialog" style="z-index:1000000">

                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cart</h4>
                              </div>
                                <div class="modal-body" style=" max-height: 350px; overflow-y: scroll" >';
                            foreach($this->cart->contents() as $items)
                            {
                             $count++;
                             $total+=$items["qty"]*$items["price"];
                             $output .= '
                                 <div class="row" style=" border-bottom: 1px solid #e5e5e5;margin-bottom: 5px">
                                    <div class="col-xs-4"><img class=" img-responsive" src="'.app_url."assets/products_thumbs/".$items["image"].'"></div>
                                    <div class="col-xs-6"><p>'.$items["name"].'<br>'.$items["qty"].' x <b>Rs. '.$items["price"].'</b></p></div>
                                    <div class="col-xs-2" style="vertical-align: middle"><a href="#" class="btn btn-danger remove_from_cart_button" id="'.$items["rowid"].'" style="padding:2px 6px;">x</a></div>
                                  </div>
                             
                             ';
                            }
                            $output .= ' </div><div class="modal-footer" style="background-color: #fff">
                                            <span class=" pull-left"><b>Subtotal</b></span><span  class="pull-right"><b>Rs. '.$total.'</b></span><br>
                                            <a href="'.  site_url('home/cart_details').'" class="button wc-forward pull-left">View cart</a>
                                            <a href="'.  site_url('home/checkout').'" class="button checkout wc-forward ">Checkout</a>
                                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                        </div></div>
      ';                        

                            if($count == 0)
                            {
                             $output = '<div class="modal-dialog">

                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cart</h4>
                              </div>
                                <div class="modal-body" style=" max-height: 350px; overflow-y: scroll" >
                                <p>No products in the cart.</p>
                                </div>
                                </div>


';
                            } 
                            echo $output;
        }
        function remove_cart_item(){
            $this->load->library("cart");
            $row_id = $_POST["row_id"];
            $data = array(
             'rowid'  => $row_id,
             'qty'  => 0
            );
            $this->cart->update($data);
        }
        function remove_tbl_item($row_id){
            $this->load->library("cart");
            $data = array(
             'rowid'  => $row_id,
             'qty'  => 0
            );
            $this->cart->update($data);
            redirect('home/cart_details');
        }
        function update_tbl_item($row_id,$qty){
            $this->load->library("cart");
            if($qty<=5){
            $data = array(
             'rowid'  => $row_id,
             'qty'  => $qty
            );
            $this->cart->update($data); }
//            redirect('home/cart_details');
            $this->load->view('update_cart');
        }
        function delete_cart(){
            
            $this->cart->destroy();
            redirect();
        }
        function cart_count(){
            
            echo count($this->cart->contents());
        }
        function cart_details(){
            $this->checkcart();
             $data['page']='cart_details';
            $this->load->view('template',$data);
        }
        function get_updated_cart(){
             $data['page']='update_cart';
            $this->load->view('template',$data);
        }
        function order_complete($order){
            $this->checkcart();
            $res=$this->admin_model->get_order($order);
            $data['order']=$res->POrderNo;
            $data['page']='congrats';
            $this->load->view('template',$data);
        $this->cart->destroy();
        }
        function checkout(){
            $this->checkcart();
             $data['page']='checkout';
            $this->load->view('template',$data);
        }
        function checkcart(){
            if(count($this->cart->contents())==0)
                redirect ();
        }
        function save_order(){
            $orderNo=rand(100,999).'-'.$this->site_model->getNextId().'-'.rand(100,999);
            
                $formdata=array('customerName'=>$this->input->post('name'),
                                'Contact'=>$this->input->post('mobile'),
                                'POrderNo'=>$orderNo,
//                                'country'=>$this->input->post('country'),
                                'city'=>$this->input->post('city'),
//                                'region'=>$this->input->post('region'),
                                'address'=>$this->input->post('address'),
                                'comments'=>$this->input->post('comments'),
                                'date'=>date('Y-m-d H:i:s'),
                                'unit'=>$this->input->post('unit'),
                                'subsId'=>$this->input->post('subsId'),
                                'devCharges'=>250
                    );
                $this->db->insert('orders',$formdata);
                $id=$this->db->insert_id();
                
                echo "<script>window.location.replace('".  site_url("home/order_complete/$id")."');</script>";
             
        }
        function verification($id){
            $res=$this->admin_model->get_order($id);
//            print_r($res);exit;
            $code=$this->admin_model->get_code($res->Contact);
            $this->session->set_userdata('code',$code);
            $data['msg']= $this->session->userdata('msg');
//            if(!($this->session->userdata($res->Contact))){
                  //SMS
                    $APIKey = 'dd0f95e58eb7b8bd634879d95ebb301225e5350c';
                    $receiver = $res->Contact;
                    $sender = '8583';
                    $textmessage = 'Your verification code: P-'.$code;
                    $url = "http://api.smilesn.com/sendsms?hash=".$APIKey. "&receivernetwork=" .$this->session->userdata('network')."&receivenum=" .$receiver. "&sendernum=" .urlencode($sender)."&textmessage=" .urlencode($textmessage);
                    #----CURL Request Start
//                    echo $url;exit;
                    $ch = curl_init();
                    $timeout = 30;
                    curl_setopt ($ch,CURLOPT_URL, $url) ;
                    curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT, $timeout) ;
                    $response = curl_exec($ch) ;
                    curl_close($ch) ; 
                    #----CURL Request End, Output Response
//                    echo $response ;
                //SMS ends
                  $this->session->set_userdata($res->Contact,1);
//            }
            $data['page']='verification';
            $data['id']=$id;
            $this->load->view('verification',$data);
        }
        function go_verify($id){
            $res=$this->admin_model->get_order($id);
            if($this->session->userdata('code')==$this->input->post('vercode')){
                $this->admin_model->get_verified($res->Contact,$id);
//                            $this->session->set_userdata($res->Contact,0);
                 echo "<script>window.location.replace('".  site_url("home/order_complete/$id")."');</script>";
//                redirect("home/order_complete/$id");
            }
            else {
//                $this->session->set_userdata($res->Contact,0);
                $this->session->set_userdata('msg','Wrong code entered, Please try again.');
                 echo "<script>window.location.replace('".  site_url("home/verification/$id")."');</script>";
//                redirect("home/verification/$id");
            }
        }
        function get_info($num){
            $this->db->where('subsContact',$num);
            $this->db->join('substypes','substypes.stId=subscriptions.stId');
            $this->db->where('subsExpDate >',date('Y-m-d'));
            $this->db->where('subVerification',1);
           return $this->db->get('subscriptions')->row_array();
        }
        function get_customer_info($num){
           $res=  $this->get_info($num);
           if(count($res))
               echo '1';
           else 
               echo '0';
        }
        
}
