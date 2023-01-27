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
            echo '<script>alert("Your suggestion has been succesfully submitted, we will try our best to add your demanded product to our stock and contact you. Thank You!"); window.location="'.  site_url('home').'"; </script>';
	}
        public function pages($id)
	{   
            $data['pages']=$this->admin_model->get_main_menu($id);
            $data['page']='main_pages';
            $this->load->view('template',$data);
	}
	 
	 
        public function search($key=0)
	{   
           $data['page']='search';
            if(!($key))
                $key=$this->input->get('search');
            
            // Pagination
            $this->load->library('pagination');
            $data['products']=$this->admin_model->get_products_by_search($key,12,$this->uri->segment(4));
            $config['base_url']=site_url("home/search/$key/");
            $config['total_rows']=$this->admin_model->total_rows($key);
            $config['per_page']=12;
            $config['uri_segment']=4;
            $config['num_links'] =4;
            $config['full_tag_open'] = '<ul class="pagination" style="margin-top:0px">';
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
            $data['products']=$this->admin_model->get_products_by_subcat($id,12,$this->uri->segment(5));
            $config['base_url']=site_url("home/category/$name/$id/");
            $config['total_rows']=$this->admin_model->get_products_by_subcat_rows($id);
            $config['per_page']=12;
            $config['uri_segment']=5;
            $config['num_links'] =4;
            $config['full_tag_open'] = '<ul class="pagination" style="margin-top:0px">';
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
            $test=$this->cart->insert($data);    }
            
            $output='';
            $count = 0;
            $total=0;
              $output.='<ul class="woocommerce-mini-cart cart_list product_list_widget ">';
                            foreach($this->cart->contents() as $items)
                            {
                             $count++;
                             $total+=$items["qty"]*$items["price"];
                             $output .= '
                             <li class="woocommerce-mini-cart-item mini_cart_item">
                                 <a href="#" class="remove remove_from_cart_button" id="'.$items["rowid"].'" aria-label="Remove this item" data-product_id="31" >×</a>													
                                 <a href="#">
                                     <img width="300" height="300" src="'.site_url("assets/products_thumbs/").'/'.$items["image"].'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" >'.$items["name"].'&nbsp;							</a>
                                 <span class="quantity">'.$items["qty"].' × <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;'.$items["price"].'</span></span></span>					
                             </li>
                             ';
                            }
                            $output .= '</ul>

                                <p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;'.$total.'</span></span></p>


                                <p class="woocommerce-mini-cart__buttons buttons"><a href="'.  site_url('home/cart_details').'" class="button wc-forward">View cart</a><a href="'.  site_url('home/checkout').'" class="button checkout wc-forward">Checkout</a></p>

                            ';

                            if($count == 0)
                            {
                             $output = '<p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>';
                            } 
                            echo $output;
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
              $output.='<ul class="woocommerce-mini-cart cart_list product_list_widget ">';
                            foreach($this->cart->contents() as $items)
                            {
                             $count++;
                             $total+=$items["qty"]*$items["price"];
                             $output .= '
                             <li class="woocommerce-mini-cart-item mini_cart_item">
                                 <a href="#" class="remove remove_from_cart_button" id="'.$items["rowid"].'" aria-label="Remove this item" data-product_id="31" >×</a>													
                                 <a href="#">
                                     <img width="300" height="300" src="'.site_url("assets/products_thumbs/").'/'.$items["image"].'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" >'.$items["name"].'&nbsp;							</a>
                                 <span class="quantity">'.$items["qty"].' × <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;'.$items["price"].'</span></span></span>					
                             </li>
                             ';
                            }
                            $output .= '</ul>

                                <p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span class="woocs_special_price_code"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;'.$total.'</span></span></p>


                                <p class="woocommerce-mini-cart__buttons buttons"><a href="'.  site_url('home/cart_details').'" class="button wc-forward">View cart</a><a href="'.  site_url('home/checkout').'" class="button checkout wc-forward">Checkout</a></p>

                            ';

                            if($count == 0)
                            {
                             $output = '<p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>';
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
            if($this->input->post('devFlag')==0){
                $duration=$this->input->post('duration');
                $formdata=array('customerName'=>$this->input->post('name'),
                                'Contact'=>$this->input->post('mobile'),
                                'POrderNo'=>$orderNo,
                                'country'=>$this->input->post('country'),
                                'city'=>$this->input->post('city'),
                                'region'=>$this->input->post('region'),
                                'address'=>$this->input->post('address'),
                                'comments'=>$this->input->post('comments'),
                                'date'=>date('Y-m-d H:i:s'),
                                'devCharges'=>$this->input->post('devPrice')
                    );
                $this->db->insert('orders',$formdata);
                $id=$this->db->insert_id();
                $this->db->where('subsContact',$this->input->post('mobile'));
                $this->db->delete('subscriptions');
                $subdata=array('subsName'=>$this->input->post('name'),
                                'subsContact'=>$this->input->post('mobile'),
                                'subsCountry'=>$this->input->post('country'),
                                'subsCity'=>$this->input->post('city'),
                                'subsRegion'=>$this->input->post('region'),
                                'subsAddress'=>$this->input->post('address'),
                                'subsdate'=>date('Y-m-d'),
                                'stId'=>$this->input->post('delivery'),
                                'subsExpDate'=>date('Y-m-d', strtotime("+$duration days"))
                    );
                $this->db->insert('subscriptions',$subdata);
                $item=array();
                foreach($this->cart->contents() as $items){
                    $item['quantity']=$items['qty'];
                    $item['productId']=$items['id'];
                    $item['orderNo']=$id;
                    $this->db->insert('ordersdetail',$item);
                }
//                $data=array();
//                $data['page']='verification';
                redirect("home/verification/$id");
                
                
            }else {
                $formdata=$this->get_info($this->input->post('mobile'));
                $formdata=array(
                            'customerName'=>$formdata['subsName'],
                            'Contact'=>$formdata['subsContact'],
                            'country'=>$formdata['subsCountry'],
                            'city'=>$formdata['subsCity'],
                            'region'=>$formdata['subsRegion'],
                            'address'=>$formdata['subsAddress'],
                            'date'=>date('Y-m-d H:i:s'),
                            'POrderNo'=>$orderNo,
                            'devCharges'=>$this->input->post('devPrice'),
                            'verification'=>1
                );
                $this->db->insert('orders',$formdata);
                $id=$this->db->insert_id();
                
               $item=array();
                foreach($this->cart->contents() as $items){
                    $item['quantity']=$items['qty'];
                    $item['productId']=$items['id'];
                    $item['orderNo']=$id;
                    $this->db->insert('ordersdetail',$item);
                }
                redirect("home/order_complete/$id");
            }
             
        }
        function verification($id){
            $res=$this->admin_model->get_order($id);
//            print_r($res);exit;
            $code=$this->admin_model->get_code($res->Contact);
            $this->session->set_userdata('code',$code);
            $data['msg']= $this->session->userdata('msg');
            if(!($this->session->userdata($res->Contact))){
                  //SMS
                    $APIKey = 'dd0f95e58eb7b8bd634879d95ebb301225e5350c';
                    $receiver = $res->Contact;
                    $sender = '8583';
                    $textmessage = 'Your pyzie verification code: P-'.$code;
                    $url = "http://api.smilesn.com/sendsms?hash=".$APIKey. "&receivenum=" .$receiver. "&sendernum=" .urlencode($sender)."&textmessage=" .urlencode($textmessage);
                    #----CURL Request Start
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
            }
            $data['page']='verification';
            $data['id']=$id;
            $this->load->view('verification',$data);
        }
                function go_verify($id){
            $res=$this->admin_model->get_order($id);
            if($this->session->userdata('code')==$this->input->post('vercode')){
                $this->admin_model->get_verified($res->Contact,$id);
                            $this->session->set_userdata($res->Contact,0);

                redirect("home/order_complete/$id");
            }
            else {
                $this->session->set_userdata($res->Contact,0);
                $this->session->set_userdata('msg','Wrong code entered, Please try again.');
                redirect("home/verification/$id");
            }
        }
        function get_info($num){
            $this->db->where('subsContact',$num);
            $this->db->join('substypes','substypes.stId=subscriptions.stId');
            $this->db->where('subsExpDate >',date('Y-m-d'));
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
