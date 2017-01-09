<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}

	public function index($code){
		$data['page'] = 'home';
		$data['sliders'] = $this->home_model->get_sliders();
		$data['nav'] = $this->home_model->get_categories();
		$data['news'] = $this->home_model->get_news();
		$data['tips'] = $this->home_model->get_tips();
		$data['commercial'] = $this->home_model->get_commercial();
		$this->home_model->get_country($code);
		$this->load->view('template', $data);
	}

}