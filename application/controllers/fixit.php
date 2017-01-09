<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Fixit extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}

	public function index(){
		$data['page'] = 'choose';
		$data['nav'] = $this->home_model->get_categories();
		$data['materials'] = $this->home_model->get_materials();
		//echo '<pre>'.print_r($data['materials'],1).'</pre>'; exit;
		$this->load->view('template', $data);
	}

	public function result(){
		$data['page'] = 'result';
		$data['nav'] = $this->home_model->get_categories();
		if(!$this->input->post()) redirect('fixit','refresh'); 
		$mat1 = $data['mat1'] = $this->input->post('material1');
		$mat2 = $data['mat2'] = $this->input->post('material2');
		$ex_factor = $data['ex_factor'] = $this->input->post('ex_factor');
		$data['results'] = $this->home_model->get_fixit($mat1,$mat2,$ex_factor);
		$this->load->view('template', $data);
	}

	public function equation_link(){
		$mat1 = $this->input->post('mat1');
		$materials = $this->home_model->get_material_name($mat1);
		$products = $this->home_model->get_products_by_material($mat1);
		
		$some_array = array();
		foreach($products as $product){
			$x = $this->home_model->get_materials_by_productId($product->product_id);
			foreach ($x as $z) {
				if(!in_array($z->material, $some_array)){
					array_push($some_array, strtolower($z->material)); 
				}
			}
		}

		$new_array = array('image' => $materials->mat_image, 'materials' => $some_array);
		echo json_encode($new_array);
	}

	public function equation_link2(){
		$mat1 = $this->input->post('mat1');
		$mat2 = $this->input->post('mat2');
		$materials = $this->home_model->get_material_name($mat2);
		$products = $this->home_model->get_external_factor($mat1,$mat2);

		$some_array = array();
		foreach($products as $product){
			$ef = $product->external_factor;
			$x = explode('/', $ef);
			foreach ($x as $z) {
				if(!in_array(trim($z), $some_array)){
					if(trim($z) != 'None'){
						array_push($some_array, trim(ucwords($z))); 	
					}
					
				}
			}
				
		}
		$new_array = array('mat1' => $mat1,'mat2' => $mat2, 'image' => $materials->mat_image, 'external' => $some_array);
		echo json_encode($new_array);
	}

	public function test(){
		$mat = 'Brick';
		$products = $this->home_model->get_products_by_material($mat);
		$newArray = array();
		foreach($products as $product){
			$x = $this->home_model->get_materials_by_productId($product->product_id);
			foreach ($x as $z) {
				if(!in_array($z->material, $newArray)){
					array_push($newArray, $z->material); 
				}
			}
		}
		echo json_encode($newArray);
	}

	public function test2(){
		$mat1 = 'canvas';
		$mat2 = 'plastics';
		$products = $this->home_model->get_external_factor($mat1,$mat2);
		//echo '<pre>'.print_r($products,1).'</pre>'; exit;

		$newArray = array();
		foreach($products as $product){
			$ef = $product->external_factor;
			$x = explode('/', $ef);
			foreach ($x as $z) {
				if(!in_array(trim($z), $newArray)){
					array_push($newArray, trim(ucwords($z))); 
				}
			}
				
		}
		echo json_encode($newArray);
	}


}