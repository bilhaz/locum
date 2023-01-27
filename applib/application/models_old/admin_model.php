<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class admin_model extends CI_Model {
      
        // Main Menu
        public function get_main_menus($fields){
            $this->db->select($fields);   
            $query=$this->db->get('main_menus');
            $result=$query->result();
            return $result;
        }
        public function get_main_menu($id){
            $this->db->select('*');  
            $this->db->where('mmId',$id); 
            $query=$this->db->get('main_menus');
            $result=$query->row_array();
            return $result;
        }
        function add_main_menu($data){
            $this->db->insert('main_menus', $data);
        }
        function update_main_menu($id,$data){
            $this->db->where('mmId',$id);
            $this->db->update('main_menus', $data);
        }
        function delete_main_menu($id){
            $this->db->where('mmId',$id);
            $this->db->delete('main_menus');
        }
        // Categories
        public function get_categories(){
            $this->db->select('*'); 
//            $this->db->order_by('catId','Asc'); 
            $this->db->order_by('order_no','Asc');
            $query=$this->db->get('categories');
            $result=$query->result();
            return $result;
        }
        public function get_category($id){
            $this->db->select('*');  
            $this->db->where('categories.catId',$id); 
//            $this->db->order_by('order_no','Asc');
            $query=$this->db->get('categories');
            $result=$query->row_array();
            return $result;
        }
        function add_category($data){
            $this->db->insert('categories', $data);
            
        }
        function update_category($id,$data){
            $this->db->where('catId',$id);
            $this->db->update('categories', $data);
           
        }
        function delete_category($id){
            $this->db->where('catId',$id);
            $this->db->delete('categories');
            $this->db->where('catId',$id);
            $this->db->delete('subcategories');
        }
        // Authors
        public function get_authors(){
            $this->db->select('*'); 
            $query=$this->db->get('authors');
            $result=$query->result();
            return $result;
        }
        public function get_author($id){
            $this->db->select('*');  
            $this->db->where('authId',$id); 
            $query=$this->db->get('authors');
            $result=$query->row_array();
            return $result;
        }
        function add_author($data){
            $this->db->insert('authors', $data);
        }
        function update_author($id,$data){
            $this->db->where('authId',$id);
            $this->db->update('authors', $data);
        }
        function delete_author($id){
            $this->db->where('authId',$id);
            $this->db->delete('authors');
        }
       // SubCats
        public function get_subcats(){
            $this->db->select('subcategories.*,categories.name as catName');  
            $this->db->from('subcategories');
            $this->db->join('categories','categories.catId=subcategories.catId'); 
            $this->db->order_by('subCatId','Asc'); 
            $query=$this->db->get();
            $result=$query->result();
            return $result;
        }
        public function get_subcats_by_category($id){
            
            $this->db->select('subcategories.name,subcategories.catId,subcategories.subCatId');  
            $this->db->where('catId',$id); 
//            $this->db->limit(3,0); 
            $this->db->order_by('catId','Desc'); 
            $query=$this->db->get('subcategories');
            $result=$query->result();
            return $result;
        }
        public function get_all_subcats_by_category($id){
            
            $this->db->select('subcategories.name,subcategories.catId,subcategories.subCatId');  
            $this->db->where('subCatId',$id); 
            $this->db->order_by('order_no','Asc'); 
            $query=$this->db->get('subcategories');
            $result=$query->result();
            return $result;
        }
//        public function get_subcats_by_section2($id){
//            
//            $this->db->select('subcategories.name,subcategories.catId,thumb');  
//            $this->db->where('catId',$id); 
//            $this->db->order_by('catId','Desc'); 
//            $query=$this->db->get('subcategories');
//            $result=$query->result();
//            return $result;
//        }
        public function get_subcat($id){
            $this->db->select('*,categories.name as catName,subcategories.name as name');  
            $this->db->where('subcatId',$id); 
            $this->db->join('categories','categories.catId=subcategories.catId'); 
            $query=$this->db->get('subcategories');
            $result=$query->row_array();
            return $result;
        }
        public function get_subcat_details($id){
            $this->db->select('*');  
            $this->db->where('subCatId',$id); 
//            $this->db->join('categories','tbl_section.catId=subcategories.catId');  
            $query=$this->db->get('subcategories');
            $result=$query->row_array();
            return $result;
        }
        function add_subcat($data){
            $this->db->insert('subcategories', $data);
        }
        function update_subcat($id,$data){
            $this->db->where('subCatId',$id);
            $this->db->update('subcategories', $data);
        }
        function delete_subcat($id){
            
            $this->db->where('subCatId',$id);
            $this->db->delete('subcategories');
            $this->db->where('subCatId',$id);
            $this->db->delete('products');
        }       
        
        // Slide
        public function get_slides(){
            $this->db->select('*');  
            $this->db->order_by('slideId','Asc'); 
            $query=$this->db->get('slides');
            $result=$query->result();
            return $result;
        }
//        public function get_slides_by_section($id){
//            
//            $this->db->select('*');  
//            $this->db->where('catId',$id); 
//            $query=$this->db->get('slides');
//            $result=$query->result();
//            return $result;
//        }
        public function get_slide($id){
            $this->db->select('*');  
            $this->db->where('slideId',$id); 
            $query=$this->db->get('slides');
            $result=$query->row_array();
            return $result;
        }
        public function get_slide_details($id){
            $this->db->select('*');  
            $this->db->where('slideId',$id); 
            $query=$this->db->get('slides');
            $result=$query->row_array();
            return $result;
        }
        function add_slide($data){
            $this->db->insert('slides', $data);
        }
        function update_slide($id,$data){
            $this->db->where('slideId',$id);
            $this->db->update('slides', $data);
        }
        function delete_slide($id){
            $this->db->select('slide');  
            $this->db->where('slideId',$id); 
            $query=$this->db->get('slides');
            $result=$query->row_array();
            unlink('./assets/slides_thumbs/'.$result['slide']);
            $this->db->where('slideId',$id);
            $this->db->delete('slides');
        }  
        
        
        // Ads
        public function get_ads(){
            $this->db->select('*');  
            $this->db->order_by('adId','Asc'); 
            $query=$this->db->get('ads');
            $result=$query->result();
            return $result;
        }
        public function get_ads_by_section($id){
            
            $this->db->select('*');  
            $this->db->where('catId',$id); 
            $query=$this->db->get('ads');
            $result=$query->result();
            return $result;
        }
        public function get_ad($id){
            $this->db->select('*');  
            $this->db->where('adId',$id); 
            $query=$this->db->get('ads');
            $result=$query->row_array();
            return $result;
        }
        public function get_ad_details($id){
            $this->db->select('*');  
            $this->db->where('adId',$id); 
            $query=$this->db->get('ads');
            $result=$query->row_array();
            return $result;
        }
        function add_ad($data){
            $this->db->insert('ads', $data);
        }
        function update_ad($id,$data){
            $this->db->where('adId',$id);
            $this->db->update('ads', $data);
        }
        function delete_ad($id){
            $this->db->select('ad');  
            $this->db->where('adId',$id); 
            $query=$this->db->get('ads');
            $result=$query->row_array();
            unlink('./assets/ads_thumbs/'.$result['ad']);
            $this->db->where('adId',$id);
            $this->db->delete('ads');
        }  
        // Products
        public function get_products(){
            $this->db->select('products.*,categories.name as catName'); 
            
            $this->db->join('categories','categories.catId=products.catId'); 
            $query=$this->db->get('products');
            $result=$query->result();
            return $result;
        }
        public function get_product($id){
            $this->db->select('*');  
            $this->db->where('productId',$id); 
//            $this->db->join('authors','authors.authId=products.authId'); 
            $query=$this->db->get('products');
            $result=$query->row_array();
            return $result;
        }
        public function get_products_by_subcat($id,$limit,$offset){
            $this->db->select('*, subcategories.name as catName');  
            $this->db->from('products');
//            $this->db->join('products','products.subCatId=subcategories.catId'); 
            $this->db->join('subcategories','subcategories.subCatId=products.subCatId'); 
            $this->db->limit($limit,$offset);
            if($id!='*')
            $this->db->where('products.subCatId',$id);
            $this->db->order_by('products.productTitle','Asc');
//            $this->db->limit(3,0);
            $query=$this->db->get();
            $result=$query->result();
            return $result;
        }
        public function get_products_by_subcat_rows($id){
            $this->db->select('*, subcategories.name as catName');  
            $this->db->from('products');
            $this->db->join('subcategories','subcategories.subCatId=products.subCatId'); 
            if($id!='*')
            $this->db->where('products.subCatId',$id);
            $this->db->order_by('products.productTitle','Asc');
            $query=$this->db->get();
            return $query->num_rows();;
            
        }
        public function get_promotion_products($limit,$offset){
//            $this->db->select('');  
            $this->db->from('products');
            $this->db->join('categories','categories.catId=products.catId'); 
            $this->db->limit($limit,$offset);
            $this->db->where('products.productPromotion >',0);
            $this->db->order_by('products.productTitle','Asc');
            $query=$this->db->get();
            return $query->result();;
        }
        
        public function get_promotion_products_rows(){
//            $this->db->select('*, subcategories.name as catName');  
            $this->db->from('products');
            $this->db->join('categories','categories.catId=categories.catId'); 
            $this->db->where('products.productPromotion >',0);
            $query=$this->db->get();
            return $query->num_rows();
        }
        
        public function get_products_by_cat_rows($cat=0){
//            $this->db->select('');  
            $this->db->from('products');
//            $this->db->join('subcategories','subcategories.subCatId=products.subCatId'); 
            $this->db->join('categories','categories.catId=products.catId'); 
            if($cat!=0)
                $this->db->where('categories.catId',$cat);
            
            $query=$this->db->get();
            $result=$query->num_rows();
            return $result;
        }
        
        public function get_products_by_cat($cat='',$limit,$offset){
//            $this->db->select('');  
            $this->db->from('products');
//            $this->db->join('products','products.subCatId=subcategories.catId'); 
//            $this->db->join('subcategories','subcategories.subCatId=products.subCatId'); 
            $this->db->join('categories','categories.catId=products.catId'); 
            $this->db->limit($limit,$offset);
//            $this->db->order_by('products.productTitle','ASC'); 
            if($cat!=0)
                $this->db->where('categories.catId',$cat);
//            if($sub!=0)
//                $this->db->where('subcategories.subCatId',$sub);

            $this->db->order_by('CAST(products.productTitle AS UNSIGNED), products.productTitle','Asc');
//            $this->db->limit(3,0);
            
            $query=$this->db->get();
            $result=$query->result();
            return $result;
        }
        


        public function total_rows($srch){
            $this->db->select('productTitle'); 
            $this->db->like('LOWER(productTitle)',  strtolower(urldecode($srch)));  
            $this->db->order_by('products.productTitle','Asc');
            $query=$this->db->get('products');
            return $query->num_rows();
        }
        
        public function get_products_by_search($srch,$limit,$offset){
            $this->db->select('*'); 
            $this->db->like('LOWER(productTitle)',  strtolower(urldecode($srch)));  
            $this->db->limit($limit,$offset);
//            $this->db->order_by('products.productTitle','Asc');
            $query=$this->db->get('products');
            $result=$query->result();
            return $result;
        }
        public function get_products_by_search_admin($srch,$limit,$offset){
//            $this->db->select('products.*,categories.name as catName,subcategories.name as name');  
//            $this->db->join('subcategories','subcategories.subCatId=products.subCatId'); 
            $this->db->join('categories','categories.catId=products.catId'); 
            $this->db->order_by('products.productTitle','Asc'); 
            $this->db->like('LOWER(productTitle)',strtolower(urldecode($srch)));  
            $this->db->limit($limit,$offset);
            $query=$this->db->get('products');
            $result=$query->result();
//            print_r($result);exit;
            return $result;
        }
        
        public function get_products_by_search_admin_rows($srch){
//            $this->db->select('products.*,categories.name as catName,subcategories.name as name');  
//            $this->db->join('subcategories','subcategories.subCatId=products.subCatId'); 
            $this->db->join('categories','categories.catId=products.catId'); 
            $this->db->order_by('products.productTitle','Asc'); 
            $this->db->like('LOWER(productTitle)',strtolower(urldecode($srch)));  
//            $this->db->join('authors','authors.authId=products.authId'); 
            $query=$this->db->get('products');
            $result=$query->num_rows();
//            print_r($result);exit;
            return $result;
        }
        
//        public function get_products_by_subcat($id){
//            $this->db->select('products.*,subcategories.name as catName');  
//            $this->db->join('subcategories','subcategories.subCatId=products.subCatId'); 
////            $this->db->join('authors','authors.authId=products.authId'); 
//                        $this->db->where('products.subCatId',$id);
//
//            $query=$this->db->get('products');
//            $result=$query->result();
//            return $result;
//        }
        public function get_products_by_cat_front($id){
            $this->db->select('*');  
//            $this->db->join('subcategories','products.subCatId=subcategories.subCatId'); 
            $this->db->join('categories','categories.catId=products.catId'); 
            $this->db->where('products.catId',$id);
            $this->db->order_by('products.productDate','Desc');
            $this->db->limit(5,0);
            $query=$this->db->get('products');
            $result=$query->result();
//            echo $this->db->last_query();
            return $result;
        }
        public function get_products_by_productId_front($id){
            $this->db->select('*');  
            $this->db->where('products.productId',$id);
            $query=$this->db->get('products');
            $result=$query->row();
            return $result;
        }
        public function get_product_details($id){
            $this->db->select('*');  
            $this->db->where('productId',$id); 
            $this->db->join('categories','categories.catId=products.catId');  
            $query=$this->db->get('products');
            $result=$query->row_array();
            return $result;
        }
        public function get_favs(){
            $this->db->select('*');  
//            $this->db->where('subcatId',$id); 
            $query=$this->db->get('pyzie_frontfavrite');
            $result=$query->result();
            return $result;
        }
        
        public function get_favorite($id){
            $this->db->select('*');  
            $this->db->where('favId',$id); 
            $query=$this->db->get('pyzie_frontfavrite');
            $result=$query->row_array();
            return $result;
        }
        function add_product($data){
            $this->db->insert('products', $data);
        }
        function add_suggest_product($data){
            $this->db->insert('pyzie_suggestion', $data);
        }
        function update_product($id,$data){
            $this->db->where('productId',$id);
            $this->db->update('products', $data);
        }
        function update_favorite($id,$data){
            $this->db->where('favId',$id);
            $this->db->update('pyzie_frontfavrite', $data);
        }
        function delete_product($id){
            $this->db->select('thumb');  
            $this->db->where('productId',$id); 
            $query=$this->db->get('products');
            $result=$query->row_array();
            unlink('./assets/products_thumbs/'.$result['productThumb']);
            $this->db->where('productId',$id);
            $this->db->delete('products');
        }
        // 
        function add_email($data){
            $this->db->insert('subs_email', $data);
        }
         public function get_subs(){
            $this->db->select('*'); 
            $this->db->join('substypes','subscriptions.stId=substypes.stId'); 
            $query=$this->db->get('subscriptions');
             return $query->result();
        }
        function add_mobile($data){
            $this->db->insert('subs_mobile', $data);
        }
        function add_suggestion($data){
            $this->db->insert('suggestions', $data);
        }
        public function get_mobiles(){
            $this->db->select('*');  
            $query=$this->db->get('subs_mobile');
             return $query->result_array();
        }
        function add_order($data){
            $this->db->insert('orders', $data);
        }
        function get_code($mob){
            $code=rand(1000, 9999);
            $this->db->insert('verifications',array('verCode'=>$code,'verMobile'=>$mob,'verDate'=>date('Y-m-d H:i')));
            return $code;
        }
//         public function get_products_by_subcat($id,$limit,$offset){
//            $this->db->select('*, subcategories.name as catName');  
//            $this->db->from('products');
////            $this->db->join('products','products.subCatId=subcategories.catId'); 
//            $this->db->join('subcategories','subcategories.subCatId=products.subCatId'); 
//            $this->db->limit($limit,$offset);
//            if($id!='*')
//            $this->db->where('products.subCatId',$id);
//            $this->db->order_by('products.productTitle','Asc');
////            $this->db->limit(3,0);
//            $query=$this->db->get();
//            $result=$query->result();
//            return $result;
//        }
        public function get_orders($limit,$offset){
            $this->db->select('*');  
//            $this->db->join('products','orders.productId=products.productId');
            $this->db->limit($limit,$offset);
            $this->db->order_by('orderId','Desc');  
            $query=$this->db->get('orders');
            $result=$query->result();
            return $result;
        }
         public function get_orders_rows(){
            $this->db->select('*');  
//            $this->db->join('products','orders.productId=products.productId');
            $this->db->order_by('orderId','Desc');  
            $query=$this->db->get('orders');
            $result=$query->num_rows();
//            print_r($result);exit;
            return $result;
        }
        
        public function get_order($id){
            $this->db->select('*');  
            $this->db->where('orderId',$id);
            $query=$this->db->get('orders');
            return $query->row();
            
        }
        function get_verified($mob,$id){
            $this->db->where('orderId',$id);
            $this->db->set('verification',1);
            $this->db->update('orders');
            
            $this->db->where('subsContact',$mob);
            $this->db->set('subVerification',1);
            $this->db->update('subscriptions');
            
            
            $this->db->where('verMobile',$mob);
            $this->db->delete('verifications');
            
            $this->session->unset_userdata('code');
        }
        public function get_ordersDetail($id){
            $this->db->select('*');  
            $this->db->where('ordersdetail.orderNo',$id);
            $this->db->from('ordersdetail');
            $this->db->join('orders','orders.orderId=ordersdetail.orderNo');
            $this->db->join('products','products.productId=ordersdetail.productId');
            $query=$this->db->get();
            return $query->result();
        }
        public function get_suggestions(){
            $this->db->select('*');  
            $query=$this->db->get('pyzie_suggestion');
            $result=$query->result();
            return $result;
        }
        public function update_order($id){
            $this->db->where('orderId',$id);
            $this->db->set('status',1);
            $this->db->update('orders');
        }
        function delete_order($id){
            $this->db->where('orderId',$id);
            $this->db->delete('orders');
        }
        function delete_suggestion($id){
            $this->db->where('sugId',$id);
            $this->db->delete('pyzie_suggestion');
        }
        function get_order_detail($id){
            $this->db->select('*');  
            $this->db->where('orderNo',$id); 
            $query=$this->db->get('ordersdetail');
            $result=$query->result_array();
            return $result;
        }
        function update_order_detail($id,$data){
            $this->db->where('ordId',$id);
            $this->db->update('ordersdetail', $data);
        }
        function add_order_detail($data){
            $this->db->insert('ordersdetail', $data);
        }
        function delete_order_detail($ordId){
            $this->db->where('ordId',$ordId);
            $this->db->delete('ordersdetail');
        }
        // Categories
        public function get_packages(){
            $this->db->select('*'); 
            $query=$this->db->get('substypes');
            $result=$query->result();
            return $result;
        }
        public function get_package($id){
            $this->db->select('*');  
            $this->db->where('substypes.stId',$id); 
            $query=$this->db->get('substypes');
            $result=$query->row_array();
            return $result;
        }
        function add_package($data){
            $this->db->insert('substypes', $data);
            
        }
        function update_package($id,$data){
            $this->db->where('stId',$id);
            $this->db->update('substypes', $data);
           
        }
        function delete_package($id){
            $this->db->where('stId',$id);
            $this->db->delete('substypes');
        }
    }
    

