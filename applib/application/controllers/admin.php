<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends MY_Controller {

	public function __construct() {
            parent::__construct(); 
            $this->load->model('admin_model');
            
        }
	public function index()
	{   
            $data['breadcrumb']=' Dashboard';
            $data['page']='admin/dashboard';
            $this->load->view('admin/template',$data);
	}
        // Main Menus
        public function main_menu()
	{   
            $data['breadcrumb']=' Main Menus';
            $data['main_menus']=$this->admin_model->get_main_menus('*');
            $data['page']='admin/main_menus/main_menus';
            $this->load->view('admin/template',$data);
	}
        public function main_menu_add(){         
            $data['breadcrumb']=' Main Menus / Add New Menu';         
            $data['post_controller']=site_url("admin/main_menu_save/");
            $data['page']='admin/main_menus/main_menu_add';
            $data['title']='';            
            $this->load->view('admin/template',$data);
	}
        public function main_menu_save(){        
            $data['name']=$this->input->post('name');
            $data['sequence']=$this->input->post('sequence');
            $data['hassub']=$this->input->post('hassub');
            $data['content']=$this->input->post('content');      
            $this->admin_model->add_main_menu($data);
            $this->session->set_userdata('msg','New Main Menu Added Successfull');
            redirect('admin/main_menu');
	}
        public function main_menu_update($id){ 
            $data['breadcrumb']=' Main Menus / Update Menu';
            $data['menu']=$this->admin_model->get_main_menu($id);         
            $data['post_controller']=site_url("admin/main_menu_edit/$id");
            $data['page']='admin/main_menus/main_menu_update';
            $data['title']='Update Main Menu';            
            $this->load->view('admin/template',$data);
	}
        public function main_menu_edit($id){ 
            $data['name']=$this->input->post('name');
            $data['sequence']=$this->input->post('sequence');
            $data['hassub']=$this->input->post('hassub');
            $data['content']=$this->input->post('content'); 
            $this->admin_model->update_main_menu($id,$data);
            $this->session->set_userdata('msg','Main Menu Updated Successfull');
            redirect('admin/main_menu');
	}
        public function main_menu_delete($id){ 
            
            $this->admin_model->delete_main_menu($id);
            $this->session->set_userdata('msg','Main Menu Deleted Successfull');
            redirect('admin/main_menu');
	}
         // Categories
        public function categories()
	{   
            $data['breadcrumb']=' Categories';
            $data['categories']=$this->admin_model->get_categories();
            $data['page']='admin/categories/categories';
            $this->load->view('admin/template',$data);
	}
        public function category_add(){         
            $data['breadcrumb']=' Categories / Add New Category';         
            $data['post_controller']=site_url("admin/category_save/");
            $data['page']='admin/categories/category_add';
            $data['title']='';            
            $this->load->view('admin/template',$data);
	}
        public function category_save(){        
            $data['name']=$this->input->post('name'); 
//            $data['hasCat']=$this->input->post('hassub'); 
            $this->admin_model->add_category($data);
            $this->session->set_userdata('msg','New Category Added Successfull');
            redirect('admin/categories');
	}
        public function category_update($id){ 
            $data['breadcrumb']=' Categories / Update Category';
            $data['category']=$this->admin_model->get_category($id);         
            $data['post_controller']=site_url("admin/category_edit/$id");
            $data['page']='admin/categories/category_update';
            $data['title']='Update Main Menu';            
            $this->load->view('admin/template',$data);
	}
        public function category_edit($id){ 
            $data['name']=$this->input->post('name');
            $this->admin_model->update_category($id,$data);
            $this->session->set_userdata('msg','Category Updated Successfull');
            redirect('admin/categories');
	}
        public function category_delete($id){ 
            
            $this->admin_model->delete_category($id);
            $this->session->set_userdata('msg','Category Deleted Successfull');
            redirect('admin/categories');
	}
         // Authors
        public function authors()
	{   
            $data['breadcrumb']=' Authors';
            $data['authors']=$this->admin_model->get_authors();
            $data['page']='admin/authors/authors';
            $this->load->view('admin/template',$data);
	}
        public function author_add(){         
            $data['breadcrumb']=' Authors / Add New Author';         
            $data['post_controller']=site_url("admin/author_save/");
            $data['page']='admin/authors/author_add';
            $data['title']='';            
            $this->load->view('admin/template',$data);
	}
        public function author_save(){        
            $data['name']=$this->input->post('name');     
            $this->admin_model->add_author($data);
            $this->session->set_userdata('msg','New Author Added Successfull');
            redirect('admin/authors');
	}
        public function author_update($id){ 
            $data['breadcrumb']=' Authors / Update Author';
            $data['author']=$this->admin_model->get_author($id);         
            $data['post_controller']=site_url("admin/author_edit/$id");
            $data['page']='admin/authors/author_update';
            $data['title']='Update Author';            
            $this->load->view('admin/template',$data);
	}
        public function author_edit($id){ 
            $data['name']=$this->input->post('name');
            $this->admin_model->update_author($id,$data);
            $this->session->set_userdata('msg','Author Updated Successfull');
            redirect('admin/authors');
	}
        public function author_delete($id){ 
            
            $this->admin_model->delete_author($id);
            $this->session->set_userdata('msg','Author Deleted Successfull');
            redirect('admin/authors');
	}
        // Cats
        public function subcats()
	{   
            $data['breadcrumb']='Sub Categories';
            $data['subCats']=$this->admin_model->get_subcats();
            $data['page']='admin/subcats/subcats';
            $this->load->view('admin/template',$data);
	}
        public function subcat_add(){  
            $data['categories']=$this->admin_model->get_categories();
            $data['breadcrumb']=' Cats / Add New Cat';
            
            $data['subcat_controller']=site_url("admin/subcat_save/");
            $data['page']='admin/subcats/subcat_add';
            $data['title']='';            
            $this->load->view('admin/template',$data);
	}
        public function subcat_save(){
            $this->load->library('upload');
            $data['name']=$this->input->post('title');
            $data['catId']=$this->input->post('cat');

            $this->admin_model->add_subCat($data);
            $this->session->set_userdata('msg','New Category Added Successfull');
            redirect('admin/subcats');
	}
        public function subcat_update($id){
            $data['categories']=$this->admin_model->get_categories('catId,secName');
            $data['breadcrumb']=' Cats / Update Menu';
            $data['subcat']=$this->admin_model->get_subcat($id);         
            $data['subcat_controller']=site_url("admin/subcat_edit/$id");
            $data['page']='admin/subcats/subcat_update';
            $data['title']='Update Cat';            
            $this->load->view('admin/template',$data);
	}
        public function subcat_edit($id){ 
            $data['name']=$this->input->post('title');
            $data['catId']=$this->input->post('cat');
//            if($_FILES['thumb']['name']!=null){ // if picture  selected
//                $this->load->library('upload');
//                    $config['upload_path'] = "./assets/subCats_thumbs/";
//            $config['allowed_types'] = 'gif|jpg|png|JPG';
//            // initialize before upload
//             $this->upload->initialize($config);
//             $this->upload->do_upload("thumb"); 
//              //[ MAIN IMAGE ]
//                                    $this->load->library('image_lib'); 
////                                    echo $this->upload->file_name;
//                                    $config3['image_library'] = 'gd2';
//                                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
//                                    $config3['new_image'] = "./assets/subCats_thumbs/";
//                                    $config3['dest_folder'] = "./assets/subCats_thumbs/";
////                                    $config3['maintain_ratio'] = TRUE;
//                                    $config3['width'] = 191;
//                                    $config3['height'] = 140;
//                                    $this->image_lib->initialize($config3);
//                                    $this->image_lib->resize();
////                                    print_r($this->image_lib);
//            $data['thumb']= $this->upload->file_name;
//                }
            ///////////////////////////
//            $data['page_link_name'] = str_replace(' ', '_', $data['name']); // Replaces all spaces with hyphens.
//            preg_replace('/[^A-Za-z0-9\-]/', '', $data['page_link_name']); // Removes special chars.
//            $data['page_link_name']=$data['page_link_name'].".html";
            /////////////////////////////
            $this->admin_model->update_subcat($id,$data);
            $this->session->set_userdata('msg','Sub Category Updated Successfull');
            redirect('admin/subcats');
	}
        public function subcat_delete($id){ 
            $this->admin_model->delete_subcat($id);
            $this->session->set_userdata('msg','Cat Deleted Successfull');
            redirect('admin/subcats');
	}
        
        
        // Slides
        public function slides()
	{   
            $data['breadcrumb']=' Slides';
            $data['slides']=$this->admin_model->get_slides();
            $data['page']='admin/slides/slides';
            $this->load->view('admin/template',$data);
	}
        public function slide_add(){  
            $data['breadcrumb']=' Slides / Add New Slide';
            
            $data['post_controller']=site_url("admin/slide_save/");
            $data['page']='admin/slides/slide_add';
            $data['title']='';            
            $this->load->view('admin/template',$data);
	}
        public function slide_save(){
            $filename=$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['slide']['name']);
            $this->load->library('upload');
            $data['link']=$this->input->post('link');
              $config['upload_path'] = "./assets/slides_thumbs/";
              $config['file_name'] = $filename.'_supplementstown_pk';
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            // initialize before upload
             $this->upload->initialize($config);
             $this->upload->do_upload("slide"); 
              //[ MAIN IMAGE ]
                                    $this->load->library('image_lib'); 
//                                    echo $this->upload->file_name;
                                    $config3['image_library'] = 'gd2';
                                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                                    
                                    $config3['new_image'] = "./assets/slides_thumbs/";
                                    $config3['dest_folder'] = "./assets/slides_thumbs/";
                                    $config3['maintain_ratio'] = false;
                                    $config3['width'] = 1200;
                                    $config3['height'] = 300;
                                    $this->image_lib->initialize($config3);
                                    $this->image_lib->resize();
//                                    print_r($this->image_lib);
            $data['slide']= $this->upload->file_name;
            ///////////////////////////
//            $data['page_link_name'] = str_replace(' ', '_', $data['name']); // Replaces all spaces with hyphens.
//            preg_replace('/[^A-Za-z0-9\-]/', '', $data['page_link_name']); // Removes special chars.
//            $data['page_link_name']=$data['page_link_name'].".html";
            /////////////////////////////
            $this->admin_model->add_slide($data);
            $this->session->set_userdata('msg','New Slide Added Successfull');
            redirect('admin/slides');
	}
//        public function slide_update($id){
//            $data['breadcrumb']=' Cats / Update Menu';
//            $data['slide']=$this->admin_model->get_slide($id);         
//            $data['post_controller']=site_url("admin/slide_edit/$id");
//            $data['page']='admin/slides/slide_update';
//            $data['title']='Update Cat';            
//            $this->load->view('admin/template',$data);
//	}
//        public function slide_edit($id){ 
//            $data['link']=$this->input->post('link');
//            if($_FILES['slide']['name']!=null){ // if picture  selected
//                $this->load->library('upload');
//                    $config['upload_path'] = "./assets/slides_thumbs/";
//            $config['allowed_types'] = 'gif|jpg|png|JPG';
//            // initialize before upload
//             $this->upload->initialize($config);
//             $this->upload->do_upload("slide"); 
//              //[ MAIN IMAGE ]
//                                    $this->load->library('image_lib'); 
////                                    echo $this->upload->file_name;
//                                    $config3['image_library'] = 'gd2';
//                                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
//                                    $config3['new_image'] = "./assets/slides_thumbs/";
//                                    $config3['dest_folder'] = "./assets/slides_thumbs/";
//                                    $config3['maintain_ratio'] = false;
//                                    $config3['width'] = 748;
//                                    $config3['height'] = 350;
//                                    $this->image_lib->initialize($config3);
//                                    $this->image_lib->resize();
////                                    print_r($this->image_lib);
//            $data['slide']= $this->upload->file_name;
//                }
            ///////////////////////////
//            $data['page_link_name'] = str_replace(' ', '_', $data['name']); // Replaces all spaces with hyphens.
//            preg_replace('/[^A-Za-z0-9\-]/', '', $data['page_link_name']); // Removes special chars.
//            $data['page_link_name']=$data['page_link_name'].".html";
            /////////////////////////////
//            $this->admin_model->update_slide($id,$data);
//            $this->session->set_userdata('msg','Slide Updated Successfull');
//            redirect('admin/slides');
//	}
        public function slide_delete($id){ 
            $this->admin_model->delete_slide($id);
            $this->session->set_userdata('msg','Slide Deleted Successfull');
            redirect('admin/slides');
	}
        
        // ads
        public function ads()
	{   
            $data['breadcrumb']=' Cats';
            $data['ads']=$this->admin_model->get_ads();
            $data['page']='admin/ads/ads';
            $this->load->view('admin/template',$data);
	}
        public function ad_add(){  
            $data['categories']=$this->admin_model->get_categories();
            $data['breadcrumb']=' Cats / Add New Cat';
            
            $data['post_controller']=site_url("admin/ad_save/");
            $data['page']='admin/ads/ad_add';
            $data['title']='';            
            $this->load->view('admin/template',$data);
	}
        public function ad_save(){
            $this->load->library('upload');
            $data['link']=$this->input->post('link');
              $config['upload_path'] = "./assets/ads_thumbs/";
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            // initialize before upload
             $this->upload->initialize($config);
             $this->upload->do_upload("ad"); 
              //[ MAIN IMAGE ]
                                    $this->load->library('image_lib'); 
//                                    echo $this->upload->file_name;
                                    $config3['image_library'] = 'gd2';
                                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                                    $config3['new_image'] = "./assets/ads_thumbs/";
                                    $config3['dest_folder'] = "./assets/ads_thumbs/";
                                    $config3['maintain_ratio'] = TRUE;
                                    $config3['width'] = 207;
//                                    $config3['height'] = 350;
                                    $this->image_lib->initialize($config3);
                                    $this->image_lib->resize();
//                                    print_r($this->image_lib);
            $data['ad']= $this->upload->file_name;
            ///////////////////////////
//            $data['page_link_name'] = str_replace(' ', '_', $data['name']); // Replaces all spaces with hyphens.
//            preg_replace('/[^A-Za-z0-9\-]/', '', $data['page_link_name']); // Removes special chars.
//            $data['page_link_name']=$data['page_link_name'].".html";
            /////////////////////////////
            $this->admin_model->add_ad($data);
            $this->session->set_userdata('msg','New ad Added Successfull');
            redirect('admin/ads');
	}
        public function ad_update($id){
            $data['categories']=$this->admin_model->get_categories('catId,secName');
            $data['breadcrumb']=' Cats / Update Menu';
            $data['ad']=$this->admin_model->get_ad($id);         
            $data['ad_controller']=site_url("admin/ad_edit/$id");
            $data['page']='admin/ads/ad_update';
            $data['title']='Update Cat';            
            $this->load->view('admin/template',$data);
	}
        public function ad_edit($id){ 
            $data['link']=$this->input->post('link');
            if($_FILES['ad']['name']!=null){ // if picture  selected
                $this->load->library('upload');
                    $config['upload_path'] = "./assets/ads_thumbs/";
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            // initialize before upload
             $this->upload->initialize($config);
             $this->upload->do_upload("ad"); 
              //[ MAIN IMAGE ]
                                    $this->load->library('image_lib'); 
//                                    echo $this->upload->file_name;
                                    $config3['image_library'] = 'gd2';
                                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                                    $config3['new_image'] = "./assets/ads_thumbs/";
                                    $config3['dest_folder'] = "./assets/ads_thumbs/";
                                    $config3['maintain_ratio'] = TRUE;
                                    $config3['width'] = 207;
//                                    $config3['height'] = 350;
                                    $this->image_lib->initialize($config3);
                                    $this->image_lib->resize();
//                                    print_r($this->image_lib);
            $data['ad']= $this->upload->file_name;
                }
            ///////////////////////////
//            $data['page_link_name'] = str_replace(' ', '_', $data['name']); // Replaces all spaces with hyphens.
//            preg_replace('/[^A-Za-z0-9\-]/', '', $data['page_link_name']); // Removes special chars.
//            $data['page_link_name']=$data['page_link_name'].".html";
            /////////////////////////////
            $this->admin_model->update_ad($id,$data);
            $this->session->set_userdata('msg','ad Updated Successfull');
            redirect('admin/ads');
	}
        public function ad_delete($id){ 
            $this->admin_model->delete_ad($id);
            $this->session->set_userdata('msg','Ad Deleted Successfull');
            redirect('admin/ads');
	}
        
        // Products
        public function product($dummy=0,$key=''){
            $data['cats']=$this->admin_model->get_categories();
//            $data['subcats']=$this->admin_model->get_subCats();
            $data['catId']='';
            $data['breadcrumb']='Products';
            $data['id']=1;
//            $data['products']=$this->admin_model->get_products_by_search_admin($key);  
            
            // Pagination
            $this->load->library('pagination');
            $data['products']=$this->admin_model->get_products_by_search_admin($key,30,$this->uri->segment(5));
            $config['base_url']=site_url("admin/product/0/$key/");
            $config['total_rows']=$this->admin_model->get_products_by_search_admin_rows($key);
            $config['per_page']=30;
            $config['uri_segment']=5;
            $config['num_links'] =8;
            $config['full_tag_open'] = '<div class="pagination pull-right" style="margin-top:0px"><ul>';
            $config['full_tag_close'] = '</ul></div>';
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
            
            $data['page']='admin/products/products';
            $this->load->view('admin/template',$data);
	}
        public function products($cat=0)
	{   
            $data['breadcrumb']=' Products';
            // Pagination
            $this->load->library('pagination');
            $data['products']=$this->admin_model->get_products_by_cat($cat,30,$this->uri->segment(5));
//            echo $this->db->last_query();exit;
            $config['base_url']=site_url("admin/products/$cat/");
            $config['total_rows']=$this->admin_model->get_products_by_cat_rows($cat);
            $config['per_page']=30;
            $config['uri_segment']=5;
            $config['num_links'] =8;
            $config['full_tag_open'] = '<div class="pagination pull-right" style="margin-top:0px"><ul>';
            $config['full_tag_close'] = '</ul></div>';
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
            
            $data['catId']=$cat;
            $data['cats']=$this->admin_model->get_categories();
            $data['page']='admin/products/products';
            $this->load->view('admin/template',$data);
	}
        public function product_add(){  
            $data['cats']=$this->admin_model->get_categories();
//            $data['authors']=$this->admin_model->get_authors();
            $data['breadcrumb']=' Products / Add New Product';
            
            $data['product_controller']=site_url("admin/product_save/");
            $data['page']='admin/products/product_add';
            $data['title']='Add Product';            
            $this->load->view('admin/template',$data);
	}
//        public function product_add_sec(){  
//            $data['categories']=$this->admin_model->get_has_sub_categories();
////            $data['authors']=$this->admin_model->get_authors();
//            $data['breadcrumb']=' Products / Add New Product';
//            
//            $data['product_controller']=site_url("admin/product_sec_save/");
//            $data['page']='admin/products/product_add_sec';
//            $data['title']='Add Product';            
//            $this->load->view('admin/template',$data);
//	}
        public function product_save(){
            $this->load->library('upload');
            $data['productTitle']=$this->input->post('title');
            $data['price']=$this->input->post('price');
            $data['catId']=$this->input->post('cat');
            $data['specs']=$this->input->post('specs');
            $data['unit']=$this->input->post('unit');
            $data['stars']=$this->input->post('stars');
            $data['video_link']=$this->input->post('video_link');
            $data['priceCheck']=$this->input->post('priceCheck');
            $data['productPromotion']=$this->input->post('promo');
            $data['productDate']=date('Y-m-d H:i:s');
            
            $filename = preg_replace('/[^A-Za-z0-9\-]/', '_',$data['productTitle']);
            $data['description']=$this->input->post('description');
            $config['upload_path'] = "./assets/products_thumbs/";
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            $config['file_name'] = $filename.'_supplementstown_pk';
            // initialize before upload
             $this->upload->initialize($config);
             $this->upload->do_upload("thumb"); 
              //[ MAIN IMAGE ]
                                    $this->load->library('image_lib'); 
//                                    echo $this->upload->file_name;
                                    $config3['image_library'] = 'gd2';
                                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                                    $config3['new_image'] = "./assets/products_thumbs/";
                                    $config3['dest_folder'] = "./assets/products_thumbs/";
                                    $config3['height'] = 300;
                                    $config3['width'] = 300;
                                    $config3['maintain_ratio'] = false;
                                    $this->image_lib->initialize($config3);
                                    $this->image_lib->resize();
//                                    print_r($this->image_lib);
            $data['thumb']= $this->upload->file_name;
            ///////////////////////////
//            $data['page_link_name'] = str_replace(' ', '_', $data['name']); // Replaces all spaces with hyphens.
//            preg_replace('/[^A-Za-z0-9\-]/', '', $data['page_link_name']); // Removes special chars.
//            $data['page_link_name']=$data['page_link_name'].".html";
            /////////////////////////////
            $this->admin_model->add_product($data);
            $this->session->set_userdata('msg','New Product Added Successfull');
            redirect('admin/products');
	}
        
        public function update_product_live($title,$price,$id){
            $data['productTitle']= urldecode($title);
            $data['price']=$price;
            $this->admin_model->update_product($id,$data);
        }
        public function product_update($id){
            $data['cats']=$this->admin_model->get_categories();
//            $data['authors']=$this->admin_model->get_authors();
            $data['breadcrumb']=' Cats / Update Product';
            $data['product']=$this->admin_model->get_product($id);         
            $data['product_controller']=site_url("admin/product_edit/$id");
            $data['page']='admin/products/product_update';
            $data['title']='Update Product';            
            $this->load->view('admin/template',$data);
	}
        
        public function product_edit($id){ 
            $data['productTitle']=$this->input->post('title');
            $data['price']=$this->input->post('price');
//            $data['description']=$this->input->post('description');
            $data['catId']=$this->input->post('cat');
            $data['productPromotion']=$this->input->post('promo');
//            $data['specs']=$this->input->post('specs');
            $data['unit']=$this->input->post('unit');
            $data['stars']=$this->input->post('stars');
            $data['video_link']=$this->input->post('video_link');
            $data['priceCheck']=$this->input->post('priceCheck');
            if($_FILES['thumb']['name']!=null){
            $this->load->library('upload');
            $filename = preg_replace('/[^A-Za-z0-9\-]/', '_',$data['productTitle']);
            $data['description']=$this->input->post('description');
            $config['upload_path'] = "./assets/products_thumbs/";
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            $config['file_name'] = $filename.'_supplementstown_pk';
            // initialize before upload
             $this->upload->initialize($config);
             $this->upload->do_upload("thumb"); 
              //[ MAIN IMAGE ]
                                    $this->load->library('image_lib'); 
//                                    echo $this->upload->file_name;
                                    $config3['image_library'] = 'gd2';
                                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                                    $config3['new_image'] = "./assets/products_thumbs/";
                                    $config3['dest_folder'] = "./assets/products_thumbs/";
                                    $config3['height'] = 300;
                                    $config3['width'] = 300;
                                    $config3['maintain_ratio'] = false;
                                    $this->image_lib->initialize($config3);
                                    $this->image_lib->resize();
//                                    print_r($this->image_lib);
            $data['thumb']= $this->upload->file_name;
            }
            ///////////////////////////
//            $data['page_link_name'] = str_replace(' ', '_', $data['name']); // Replaces all spaces with hyphens.
//            preg_replace('/[^A-Za-z0-9\-]/', '', $data['page_link_name']); // Removes special chars.
//            $data['page_link_name']=$data['page_link_name'].".html";
            /////////////////////////////
            $this->admin_model->update_product($id,$data);
            $this->session->set_userdata('msg','Product Updated Successfull');
            redirect('admin/products');
	}
        
        public function product_delete($id){ 
            $this->admin_model->delete_product($id);
            $this->session->set_userdata('msg','Product Deleted Successfull');
            redirect('admin/products');
	}
        public function order($id){ 
            $this->admin_model->delete_product($id);
            $this->session->set_userdata('msg','Order Deleted Successfull');
            redirect('admin/products');
        }
        
        // Orders
        public function orders()
	{   
            $data['breadcrumb']=' Orders';
            
            
            // pagination
            $this->load->library('pagination');
            $data['orders']=$this->admin_model->get_orders(30,$this->uri->segment(3));
            $config['base_url']=site_url("admin/orders/");
            $config['total_rows']=$this->admin_model->get_orders_rows();
            $config['per_page']=30;
            $config['uri_segment']=3;
            $config['num_links'] =8;
            $config['full_tag_open'] = '<div class="pagination pull-right" style="margin-top:0px"><ul>';
            $config['full_tag_close'] = '</ul></div>';
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
            
            $data['page']='admin/orders/orders';
            $this->load->view('admin/template',$data);
	}
        
        public function orders_inc()
	{   
            $data['breadcrumb']=' Orders';
            
            
            // pagination
            $this->load->library('pagination');
            $data['orders']=$this->admin_model->get_orders_inc(30,$this->uri->segment(3));
            $config['base_url']=site_url("admin/orders/");
            $config['total_rows']=$this->admin_model->get_orders_inc_rows();
            $config['per_page']=30;
            $config['uri_segment']=3;
            $config['num_links'] =8;
            $config['full_tag_open'] = '<div class="pagination pull-right" style="margin-top:0px"><ul>';
            $config['full_tag_close'] = '</ul></div>';
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
            
            $data['page']='admin/orders/orders_inc';
            $this->load->view('admin/template',$data);
	}
        
        public function ordersDetail($id)
	{   
            echo "<script> var printTab = window.open('".site_url("admin/ordersDetailView/$id")."','_blank') ;
                                
                               printTab.print();

                        </script>";
            
	}
        public function ordersDetailView($id)
	{   
            $data['breadcrumb']=' Orders';
            $data['ordersdetail']=$this->admin_model->get_ordersDetail($id);
            $data['page']='admin/recept';
            $this->load->view('admin/recept',$data);
	}
        public function order_save($id){
            $data['customerName']=$this->input->post('name');
            $data['Contact']=$this->input->post('contact');
            $data['productId']=$id;
            $data['quantity']=$this->input->post('quantity');
            $data['address']=$this->input->post('address');
            date_default_timezone_set('Asia/Karachi');
            $data['date']=date('Y-m-d h:i');
            $this->admin_model->add_order($data);
            $this->session->set_userdata('msg','Your Order Has been Placed Successfull');
            redirect("home/product_details/$id");
	}
        public function update_order_status($id){
            $this->admin_model->update_order($id);
            $this->session->set_userdata('msg','Order Status Updated Successfull');
            redirect('admin/orders');
	}
        public function order_update($id,$orderNo){ 
            $data['breadcrumb']=' Orders / Order Menu';
            $data['details']=$this->admin_model->get_order_detail($id);    
            $data['post_controller']=site_url("admin/order_item_delete/$id/$orderNo");
            $data['page']='admin/orders/order_update';
            $data['title']='Update Order';          
            $data['no']=$orderNo;
            $data['orderId']=$id;
            $this->load->view('admin/template',$data);
	}
        public function order_item_add($id,$orderNo){ 
            $data['breadcrumb']=' Orders / Order Menu';
            $data['post_controller']=site_url("admin/order_item_save/$orderNo/$id");
            $data['page']='admin/orders/order_add';
            $data['title']='Add Order Item';          
            $data['no']=$orderNo;
            $data['orderId']=$id;
            $this->load->view('admin/template',$data);
	}
        public function order_item_delete($orderId,$orderNo,$ordId){ 
                    
             $this->admin_model->delete_order_detail($ordId);
            $this->session->set_userdata('msg','Order item Deleted Successfull');
            redirect("admin/order_update/$orderId/$orderNo");
	}
        
        public function order_item_save($orderNo,$id){
            $data['productId']=$this->input->post('productId');
            $data['quantity']=$this->input->post('quantity');
            $data['orderNo']=$this->input->post('orderId');
            $this->admin_model->add_order_detail($data);
            $data['no']=$orderNo;         
            
            $this->session->set_userdata('msg','Order item added Successfull');
            redirect("admin/order_update/$id/$orderNo");
	}
        
        public function order_edit($id){
            for($i=0;$i<count($this->input->post('ordId'));$i++):
                $data['productId']=$this->input->post('productId')[$i];
                $data['quantity']=$this->input->post('quantity')[$i];
                $ordId=$this->input->post('ordId')[$i];
                $this->admin_model->update_order_detail($ordId,$data);
            endfor;
            
            $this->session->set_userdata('msg','Order Updated Successfull');
            redirect('admin/orders');
	}
        
        
        public function order_delete($id){ 
            $this->admin_model->delete_order($id);
            $this->session->set_userdata('msg','Order Deleted Successfull');
            redirect('admin/orders');
	}
        
        
        
        // Subs
        public function subs()
	{   
            $data['breadcrumb']=' Subscriptions';
            $data['subs']=$this->admin_model->get_subs();
            $data['page']='admin/subscribes/subs';
            $this->load->view('admin/template',$data);
	}
	public function logout()
	{   
            $this->session->unset_userdata();
            redirect('auth');
	}
	// suggestions
	
	  public function suggestions()
	{   
            $data['breadcrumb']=' Orders';
            $data['suggestions']=$this->admin_model->get_suggestions();
            $data['page']='admin/suggestions/suggestions';
            $this->load->view('admin/template',$data);
	}
	public function suggestion_delete($id){ 
            $this->admin_model->delete_suggestion($id);
            $this->session->set_userdata('msg','suggestion Deleted Successfull');
            redirect('admin/suggestions');
	}
      
        
        // Packages
        public function packages()
	{   
            $data['breadcrumb']=' Categories';
            $data['packages']=$this->admin_model->get_packages();
            $data['page']='admin/packages/packages';
            $this->load->view('admin/template',$data);
	}
        public function package_add(){         
            $data['breadcrumb']=' Categories / Add New Package';         
            $data['post_controller']=site_url("admin/package_save/");
            $data['page']='admin/packages/package_add';
            $data['title']='';            
            $this->load->view('admin/template',$data);
	}
        public function package_save(){        
            $data['name']=$this->input->post('name'); 
            $data['duration']=$this->input->post('duration'); 
            $data['price']=$this->input->post('price'); 
            $this->admin_model->add_package($data);
            $this->session->set_userdata('msg','New Package Added Successfull');
            redirect('admin/packages');
	}
        public function package_update($id){ 
            $data['breadcrumb']=' Categories / Update Package';
            $data['package']=$this->admin_model->get_package($id);         
            $data['post_controller']=site_url("admin/package_edit/$id");
            $data['page']='admin/packages/package_update';
            $data['title']='Update Main Menu';            
            $this->load->view('admin/template',$data);
	}
        public function package_edit($id){ 
            $data['name']=$this->input->post('name'); 
            $data['duration']=$this->input->post('duration'); 
            $data['price']=$this->input->post('price'); 
            $this->admin_model->update_package($id,$data);
            $this->session->set_userdata('msg','Package Updated Successfull');
            redirect('admin/packages');
	}
        public function package_delete($id){ 
            
            $this->admin_model->delete_package($id);
            $this->session->set_userdata('msg','Package Deleted Successfull');
            redirect('admin/packages');
	}
        function dbbackup()
        {
            $this->load->dbutil();
            $prefs = array(
                        'add_drop'    => FALSE,              // Whether to add DROP TABLE statements to backup file
                        'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                      );
            $backup = $this->dbutil->backup($prefs);  
            $this->load->helper('file');
            $date=date('d_m_Y h i s');
            write_file(site_url("backup/supplementstown_pk_DB_backup_$date.sql"), $backup); 
            $this->load->helper('download');
            force_download("backup/supplementstown_pk_DB_backup_".$date.'.sql', $backup);

        }
        
         // Categories
        public function favorites()
	{   
            $data['breadcrumb']=' Favorites';
            $data['favs']=$this->admin_model->get_favs();
            $data['page']='admin/favorites/favorites';
            $this->load->view('admin/template',$data);
	}
        
        public function favorite_update($id){ 
            $data['breadcrumb']=' Favorites / Update ';
            $data['subcats']=$this->admin_model->get_subcats();
            $data['fav']=$this->admin_model->get_favorite($id);         
            $data['post_controller']=site_url("admin/favorite_edit/$id");
            $data['page']='admin/favorites/favorite_update';
            $data['title']='Update Main Menu';            
            $this->load->view('admin/template',$data);
	}
        public function favorite_edit($id){ 
            $data['items']=$this->input->post('items');
            $data['subcatId']=$this->input->post('subcatId');
            $this->admin_model->update_favorite($id,$data);
            $this->session->set_userdata('msg','Category Updated Successfull');
            redirect('admin/favorites');
	}
        public function favorite_delete($id){ 
            
            $this->admin_model->delete_favorite($id);
            $this->session->set_userdata('msg','Category Deleted Successfull');
            redirect('admin/favorites');
	}
}
