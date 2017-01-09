<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Openings extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}

	public function index(){
		$data['page'] = 'openings';
		$data['nav'] = $this->home_model->get_categories();
		$this->load->view('template', $data);
	}
}