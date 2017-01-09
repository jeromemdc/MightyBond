<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Products extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}

	public function index($cat='',$product=''){

		$data['nav'] = $this->home_model->get_categories();
		$data['category'] = $this->home_model->get_category_slug($cat);
		$data['subcategories'] = $this->home_model->get_subcategory_catid($data['category']->cat_id);

		if($product == ''){
			$data['page'] = 'category';
			$data['products'] = $this->home_model->get_products_catid($data['category']->cat_id);
		}else{
			$data['page'] = 'product';
			

			$data['result'] = $this->home_model->get_product_slug($data['category']->cat_id, $product);
			$data['products'] = $this->home_model->get_products_catid_rand($data['category']->cat_id,$data['result']->prod_id);
		}

		$this->load->view('template', $data);
	}

}