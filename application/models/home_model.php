<?php
class home_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
		parent::__construct();
    }

	function get_product_by_category($cat){

		$result = $this->db->where('cat_slug',$cat)->get('categories')->row();
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');
		return $this->db
			->where('cat_id',$result->cat_id)
			->like('countries',$code)
			->get('products')
			->result();	
	}

	function get_category_slug($cat){

		return $this->db
			->where('cat_slug',$cat)
			->get('categories')
			->row();	
	}

	function get_category_id($id){
		return $this->db
			->where('cat_id',$id)
			->get('categories')
			->row();
	}

	function get_subcategory_catid($id){
		return $this->db
			->where('cat_id',$id)
			->get('subcategories')
			->result();
	}

	function get_products_subid($id){
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');
		return $this->db
			->where('sub_id',$id)
			->where('image !=','')
			->like('countries',$code)
			->order_by('sorting', 'asc')
			->get('products')
			->result();
	}

	function get_product_slug($cat,$product){
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');
		return $this->db
			->where('cat_id',$cat)
			->where('prod_slug',$product)
			->where('image !=','')
			->like('countries',$code)
			->get('products')
			->row();
	}

	function get_materials(){
		return $this->db
			->where('mat_image !=','')
			->get('materials')
			->result();
	}

	function get_material_id($id){
		return $this->db
			->where('mat_id',$id)
			/*->where('image !=','')*/
			->get('materials')
			->row();
	}

	function get_material_name($name){
		return $this->db
			->where('mat_name',$name)
			/*->where('image !=','')*/
			->get('materials')
			->row();
	}

	function get_categories(){
		return $this->db
		 	->get('categories')
		 	->result();
	}

	function get_products_catid($id){
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');
		return $this->db
			->where('cat_id',$id)
			->where('image !=','')
			->like('countries',$code)
			->order_by('prod_name', 'asc')
			->get('products')
			->result();
	}

	function get_products_catid_rand($catid,$prodid){
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');
		return $this->db
			->where('cat_id',$catid)
			->where('image !=','')
			->where('prod_id !=', $prodid)
			->like('countries',$code)
			->order_by('cat_id', 'RANDOM')
			->limit(5)
			->get('products')
			->result();
	}

	function get_sliders(){
		return $this->db
			->get('sliders')
			->result();
	}

	function get_news(){
		return $this->db
			->where('news_category','1')
			->order_by('news_id','desc')
			->limit(1)
			->get('news')
			->row();
	}

	function get_tips(){
		return $this->db
			->where('news_category','2')
			->order_by('news_id','desc')
			->limit(1)
			->get('news')
			->row();
	}

	function get_csr(){
		return $this->db
			->where('news_category','3')
			->order_by('news_id','desc')
			->limit(1)
			->get('news')
			->row();
	}

	function get_commercial(){
		return $this->db
			->order_by('id','desc')
			->limit(1)
			->get('commercials')
			->row();
	}

	function get_products_search($search){
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');
		return $this->db
			->like('prod_name',$search)
			->where('image !=','')
			->like('countries',$code)
			->order_by('prod_name','asc')
			->get('products')
			->result();	
	}

	function get_news_slug($slug){
		return $this->db
			->where('news_slug',$slug)
			->get('news')
			->row();	
	}

	function get_all_products(){
		return $this->db
			->join('categories', 'products.cat_id = categories.cat_id')
			->join('subcategories', 'products.sub_id = subcategories.sub_id')
			->get('products')
			->result();
	}

	function get_all_news(){
		return $this->db
			->where('news_category','1')
			->or_where('news_category','3')
			->order_by('news_id','desc')
			->get('news')
			->result();
	}

	function get_all_tips(){
		return $this->db
			->where('news_category','2')
			->order_by('news_id','desc')
			->get('news')
			->result();
	}

	function get_all_csr(){
		return $this->db
			->where('news_category','3')
			->order_by('news_id','desc')
			->get('news')
			->result();
	}

	function get_all_articles(){
		return $this->db
			->where('news_category','4')
			->order_by('news_id','asc')
			->get('news')
			->result();
	}

	function get_all_csr_paginated($limit,$offset){
		return $this->db
			->where('news_category','3')
			->order_by('news_id','desc')
			->limit($limit)
			->offset($offset)
			->get('news')
			->result();
	}

	function get_all_commercials(){
		return $this->db
			->order_by('id','desc')
			->get('commercials')
			->result();
	}


	function get_country($code='ph'){
		$country =  $this->db
			->where('code',$code)
			->get('countries')
			->row();

		$this->session->set_userdata('country',$country->name);
		$this->session->set_userdata('code',$code);
	}

	function get_fixit($mat1,$mat2,$exfactor){
		/*return $this->db->query("SELECT * FROM materials_info LEFT JOIN products_info ON materials_info.product_id = products_info.id 
									where material1 = '$material1' AND external_factor LIKE '%$ex_factor%' AND 
									product_id IN (SELECT product_id FROM materials_info WHERE material2 = '$material2') GROUP BY products_info.id 
								")->result();*/

		
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');

		return $this->db->query("SELECT * FROM fixit LEFT JOIN products ON fixit.product_id = products.prod_id WHERE material = '$mat1'
					AND external_factor LIKE '%$exfactor%' AND countries LIKE '%$code%' AND product_id IN (
					SELECT product_id FROM fixit WHERE material = '$mat2') GROUP BY product_id")->result();						

	}

	function get_works($prodid){
		return $this->db
			->where('product_id',$prodid)
			->get('fixit')
			->result();	
	}

	function get_fixitapp(){
		return $this->db
			->select('id,prod_name AS product,material,external_factor,fix_type,remarks')
			->join('products', 'products.prod_id = fixit.product_id')
			->get('fixit')
			->result();	
	}

	function get_products_by_material($material){
		return $this->db
			->select('product_id')
			->where('material',$material)
			->get('fixit')
			->result();	
	}

	function get_materials_by_productId($id){
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');
		
		return $this->db
			->select('material,external_factor')
			->join('products', 'products.prod_id = fixit.product_id')
			->where('products.prod_id',$id)
			->like('countries',$code)
			->get('fixit')
			->result();	
	}

	function get_external_factor($mat1,$mat2){
		$code = ($this->session->userdata('code') ? $this->session->userdata('code') : 'ph');
		return $this->db->query("SELECT * FROM fixit LEFT JOIN products ON fixit.product_id = products.prod_id WHERE material = '$mat1'
					 AND countries LIKE '%$code%' AND product_id IN (
					SELECT product_id FROM fixit WHERE material = '$mat2') GROUP BY product_id")->result();	
	}
  

}
?>
