<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Search extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}

	public function index($cat='',$product=''){

		$data['nav'] = $this->home_model->get_categories();
		$data['page'] = 'search';
		
		$search = ($this->input->post('search') ? $this->input->post('search') : '');
		if($search){
			$this->session->set_userdata('search' , $search);
		} 

		$data['results'] = $this->home_model->get_products_search($this->session->userdata('search'));
		$this->load->view('template', $data);
	}

	public function all_userdata(){
		echo '<pre>'.print_r($this->session->all_userdata(),1).'</pre>';
	}

}