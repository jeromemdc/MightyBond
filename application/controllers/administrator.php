<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this->load->model('admin_model');
		if(!$this->session->userdata('logged_in')){
			redirect(base_url().'login');
		}
	}
 
	public function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('administrator/dashboard','location');
		}else{
			redirect('login','refresh');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');	
	}
	
	public function dashboard(){
		$data['title'] = 'Dashboard';
		$data['page'] = 'dashboard';
		$this->load->view('administrator',$data);
	}

	public function categories(){
		$data['title'] = 'Categories';
		$data['page'] = 'categories';
		$data['results'] = $this->admin_model->get_database('categories');
		$this->load->view('administrator',$data);
	}

	public function add_category(){
		$data['title'] = 'Add category';
		$data['page'] = 'add_category';

		$this->form_validation->set_rules('cat_name', 'Name', 'required');
		$this->form_validation->set_rules('cat_slug', 'Slug', 'required|is_unique[categories.cat_slug]');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

		if($this->form_validation->run() == TRUE){

       		$save = $this->input->post();
       		$this->admin_model->insert_database($save,'categories');
       		$this->session->set_flashdata('saved', 'Category is successfully created.');
			redirect('administrator/categories');
	      
	    }else{
	   		$this->load->view('administrator',$data);	  	
	    }
	}

	public function edit_category($id){
		$data['title'] = 'Edit category';
		$data['page'] = 'edit_category';
		$data['result'] = $this->admin_model->get_database_id($id,'categories','cat_id');

		$this->form_validation->set_rules('cat_name', 'Name', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

		if($this->form_validation->run() == TRUE){
			$save = $this->input->post();
	        $this->admin_model->update_database($save,$id,'categories','cat_id');
	        $this->session->set_flashdata('saved', 'Category is successfully updated.');
			redirect('administrator/categories');
	    }else{
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function delete_category($id){
		$this->admin_model->delete_database($id,'categories','cat_id');
		$this->session->set_flashdata('saved', 'Category is successfully deleted.');
		redirect('administrator/categories');
	}

	public function subcategories(){
		$data['title'] = 'Subcategories';
		$data['page'] = 'subcategories';
		$data['results'] = $this->admin_model->get_subcategories();
		$this->load->view('administrator',$data);
	}

	public function add_subcategory(){
		$data['title'] = 'Add subcategory';
		$data['page'] = 'add_subcategory';

		$data['categories'] = $this->dropdown_categories();

		$this->form_validation->set_rules('sub_name', 'Subcategory', 'required');
		$this->form_validation->set_rules('cat_id', 'Category', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

		if($this->form_validation->run() == TRUE){

       		$save = $this->input->post();
       		$this->admin_model->insert_database($save,'subcategories');
       		$this->session->set_flashdata('saved', 'Subcategory is successfully created.');
			redirect('administrator/subcategories');
	      
	    }else{
	   		$this->load->view('administrator',$data);	  	
	    }
	}

	public function edit_subcategory($id){
		$data['title'] = 'Edit subcategory';
		$data['page'] = 'edit_subcategory';
		$data['result'] = $this->admin_model->get_subcategory_id($id);
		$data['categories'] = $this->dropdown_categories();

		$this->form_validation->set_rules('sub_name', 'Subcategory', 'required');
		$this->form_validation->set_rules('cat_id', 'Category', 'required');
		
		if($this->form_validation->run() == TRUE){
			$save = $this->input->post();
	        $this->admin_model->update_database($save,$id,'subcategories','sub_id');
	        $this->session->set_flashdata('saved', 'Subcategory is successfully updated.');
			redirect('administrator/subcategories');
	    }else{
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function delete_subcategory($id){
		$this->admin_model->delete_database($id,'subcategories','sub_id');
		$this->session->set_flashdata('saved', 'Subcategory is successfully deleted.');
		redirect('administrator/subcategories');
	}


	public function products(){
		$data['title'] = 'Products';
		$data['page'] = 'products';
		$data['results'] = $this->admin_model->get_products_and_category();
		$this->load->view('administrator',$data);
	}

	public function products2(){
		$data['title'] = 'Products';
		$data['page'] = 'products2';
		$data['results'] = $this->admin_model->get_products_and_category();
		$this->load->view('administrator',$data);
	}

	public function add_product(){

		$config = array(
		    'field' => 'prod_slug',
		    'table' => 'products',
		    'id' => 'prod_id',
		);

		$this->load->library('slug', $config);

		$data['title'] = 'Add product';
		$data['page'] = 'add_product';
		$data['categories'] = $this->dropdown_categories();
		$data['materials'] = $this->admin_model->get_database('materials');
		//$works = $this->input->post('works');
		//$data['works'] = (!empty($works) ? $works : array() );

		$countries = $this->input->post('countries');
		$data['countries'] = (!empty($countries) ? $countries : array() );

		$this->form_validation->set_rules('prod_name', 'Name', 'required');
		$this->form_validation->set_rules('cat_id', 'Category', 'required');
		$this->form_validation->set_rules('sub_id', 'Subcategory', '');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('uses', 'Uses', 'required');
		$this->form_validation->set_rules('availability', 'Availability', 'required');
		$this->form_validation->set_rules('tips', 'Tips', 'required');
		$this->form_validation->set_rules('features', 'Features', 'required');
		//$this->form_validation->set_rules('works', 'Works', 'required');
		$this->form_validation->set_rules('countries', 'Countries', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');


		if($this->form_validation->run() == TRUE){
	       	$save = $this->input->post();
	       	$save['prod_slug'] = $this->slug->create_uri($this->input->post('prod_name'));
	       	//$save['works'] = implode(',', $this->input->post('works'));
	       	$save['countries'] = implode(',', $this->input->post('countries'));
	       	$save['date_created'] = date('Y-m-d H:i:s');
	       	$save['sorting'] = $this->admin_model->get_maxorder() + 1;

       		$this->admin_model->insert_database($save,'products');
       		$this->session->set_flashdata('saved', 'Product is successfully created.');
			redirect('administrator/products');
	    }else{
	   		$this->load->view('administrator',$data);	  	
	    }
	}

	public function edit_product($id){

		$config = array(
		    'field' => 'prod_slug',
		    'table' => 'products',
		    'id' => 'prod_id',
		);

		$this->load->library('slug', $config);

		$data['title'] = 'Edit product';
		$data['page'] = 'edit_product';
		$data['result'] = $this->admin_model->get_product_id_and_catsub($id);

		$data['categories'] = $this->dropdown_categories();
		$data['materials'] = $this->admin_model->get_database('materials');
		//$data['works'] = explode(',', $data['result']->works);
		$data['countries'] = explode(',', $data['result']->countries);

	    $this->form_validation->set_rules('prod_name', 'Name', 'required');
		$this->form_validation->set_rules('cat_id', 'Category', 'required');
		$this->form_validation->set_rules('sub_id', 'Subcategory', '');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('uses', 'Uses', 'required');
		$this->form_validation->set_rules('availability', 'Availability', 'required');
		$this->form_validation->set_rules('tips', 'Tips', 'required');
		$this->form_validation->set_rules('features', 'Features', 'required');
		//$this->form_validation->set_rules('works', 'Works', 'required');
		$this->form_validation->set_rules('countries', 'Countries', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

	   if($this->form_validation->run() == TRUE){
	       	$save = $this->input->post();
	       	$save['prod_slug'] = $this->slug->create_uri($this->input->post('prod_name'));
	       	//$save['works'] = implode(',', $this->input->post('works'));
	       	$save['countries'] = implode(',', $this->input->post('countries'));
	       	$save['prod_slug'] = $this->slug->create_uri($this->input->post('prod_name'), $id);

       		$this->admin_model->update_database($save,$id,'products','prod_id');
       		$this->session->set_flashdata('saved', 'Product is successfully updated.');
			redirect('administrator/products');
	    }else{
	   		$this->load->view('administrator',$data);	  	
	    }

	}

	public function delete_product($id){
		$this->admin_model->delete_database($id,'products','prod_id');
		$this->session->set_flashdata('saved', 'Product is successfully deleted.');
		redirect('administrator/products');
	}


	public function ajax_upload1(){

		$this->load->library('image_lib');
		$config['upload_path'] = './uploads/products';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2000000';
		$this->load->library('upload', $config);
		$photo = $this->upload->do_upload('photoimg1');
		$image = $this->upload->data();
		$error = $this->upload->display_errors('<p>', '</p>');
		$newImage = $image['file_name'];
		
		if(!$error){
			
			$newImage = $image['file_name'];
			$width = $image['image_width'];
			$height = $image['image_height'];
			$html = '';
			$html .= '<img src="'.base_url().'uploads/products/'.$newImage.'" id="target" class="img-responsive" />';
			$html .= '<input type="hidden" name="image" value="'.$newImage.'" />';
			echo $html;

		}else{
			echo $error;
		}
	}

	public function ajax_upload2(){

		$this->load->library('image_lib');
		$config['upload_path'] = './uploads/products';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']	= '2000000';
		$this->load->library('upload', $config);
		$photo = $this->upload->do_upload('photoimg2');
		$image = $this->upload->data();
		$error = $this->upload->display_errors('<p>', '</p>');
		$prod_pdf1 = $image['file_name'];
		
		if(!$error){
			
			$newImage = $image['file_name'];
			$width = $image['image_width'];
			$height = $image['image_height'];
			$html = '';
			//$html .= '<img src="'.base_url().'uploads/products/'.$newImage.'" id="target" class="img-responsive" />';
			$html .= '<a href="'.base_url().'uploads/products/'.$newImage.'">'.$newImage.'</a>';

			$html .= '<input type="hidden" name="prod_pdf1" value="'.$prod_pdf1.'" />';
			echo $html;

		}else{
			echo $error;
		} 
	}

	public function ajax_upload3(){

		$this->load->library('image_lib');
		$config['upload_path'] = './uploads/products';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']	= '2000000';
		$this->load->library('upload', $config);
		$photo = $this->upload->do_upload('photoimg3');
		$image = $this->upload->data();
		$error = $this->upload->display_errors('<p>', '</p>');
		$prod_pdf2 = $image['file_name'];
		
		if(!$error){
			
			$newImage = $image['file_name'];
			$width = $image['image_width'];
			$height = $image['image_height'];
			$html = '';
			$html .= '<a href="'.base_url().'uploads/products/'.$newImage.'">'.$newImage.'</a>';
			$html .= '<input type="hidden" name="prod_pdf2" value="'.$prod_pdf2.'" />';
			echo $html;

		}else{
			echo $error;
		}
	}

	public function materials(){
		$data['title'] = 'Materials';
		$data['page'] = 'materials';
		$data['results'] = $this->admin_model->get_database('materials');
		$this->load->view('administrator',$data);
	}

	public function add_material(){
		$data['title'] = 'Add material';
		$data['page'] = 'add_material';

		$this->form_validation->set_rules('mat_name', 'Name', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

		if($this->form_validation->run() == TRUE){
		    $save = $this->input->post();
		    
	       	$this->admin_model->insert_database($save,'materials');
	       	$this->session->set_flashdata('saved', 'Material is successfully created.');
			redirect('administrator/materials');
	    }else{
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function edit_material($id){
		$data['title'] = 'Edit material';
		$data['page'] = 'edit_material';

		$data['result'] = $this->admin_model->get_database_id($id,'materials','mat_id');

	    $this->form_validation->set_rules('mat_name', 'Name', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');


		if($this->form_validation->run() == TRUE){
			
			$save = $this->input->post();
	        $this->admin_model->update_database($save,$id,'materials','mat_id');

	        $this->session->set_flashdata('saved', 'Material is successfully updated.');
			redirect('administrator/materials');

	    }else{
	      
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function delete_material($id){
		$this->admin_model->delete_database($id,'materials','mat_id');
		$this->session->set_flashdata('saved', 'Material is successfully deleted.');
		redirect('administrator/materials');
	}

	public function dropdown_categories(){
		$data = $this->admin_model->get_database('categories');
		$projects = array('' => 'Please Select Category');
		foreach ($data as $value) {
			$projects[$value->cat_id] = $value->cat_name;
		}
		return $projects;	
	}

	public function dropdown_products(){
		$data = $this->admin_model->get_database('products');
		$products = array('' => 'Please Select Products');
		foreach ($data as $value) {
			$products[$value->prod_id] = $value->prod_name;
		}
		return $products;	
	}

	public function dropdown_materials(){
		$data = $this->admin_model->get_database('materials');
		$materials = array('' => 'Please Select Materials');
		foreach ($data as $value) {
			$materials[$value->mat_name] = $value->mat_name;
		}
		return $materials;	
	}

	public function dropdown_subcategories(){
		$id = $this->input->post('cat_id');
		$data = $this->admin_model->get_subcategory_by_catid($id);
		echo json_encode($data);
	}	

	public function news(){
		$data['title'] = 'News';
		$data['page'] = 'news';
		$data['results'] = $this->admin_model->get_database('news');
		$this->load->view('administrator',$data);
	}

	public function add_news(){
		$data['title'] = 'Add news';
		$data['page'] = 'add_news';

		$this->form_validation->set_rules('news_title', 'Title', 'required');
		$this->form_validation->set_rules('news_slug', 'Slug', 'required');
		$this->form_validation->set_rules('news_content', 'Content', '');
		$this->form_validation->set_rules('news_category', 'Category', 'required');
		$this->form_validation->set_rules('news_link', 'Youtube Link', '');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');


		if($this->form_validation->run() == TRUE){
			
	      	$config['upload_path'] = './uploads/news';
			$config['allowed_types'] = 'png|jpeg|jpg';
			$config['max_size']	= '100000';
			$config['max_width']  = '100000';
			$config['max_height']  = '76800';

			$this->load->library('upload', $config);
			$this->upload->display_errors('<span style="color:red">', '</span>');

			$save = $this->input->post();

	       	$fileTagName = 'prod_image'; // e.g <input type='file' name='myfile' />    
	       	if ($this->upload->do_upload($fileTagName)) {
	        	//Success in validation of all fields.
	       		$img = array('upload_data' => $this->upload->data());	
	       		$image = $img['upload_data']['file_name']; 
		       	$save['news_image'] = $image;   	
	       	}

	       	$save['date_created'] = date('Y-m-d H:i:s');
	       	if($this->input->post('news_link')){
	       		$youtube_id = get_youtube_id($this->input->post('news_link'));
	       		$youtube_img = get_youtube_img($youtube_id);
	       		$save['news_image']	= $youtube_img;
	       	}

       		$this->admin_model->insert_database($save,'news');
       		$this->session->set_flashdata('saved', 'News is successfully created.');
			redirect('administrator/news');
	       
	    }else{
	      
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function edit_news($id){
		$data['title'] = 'Edit news';
		$data['page'] = 'edit_news';

		$data['result'] = $this->admin_model->get_database_id($id,'news','news_id');

	    $this->form_validation->set_rules('news_title', 'Title', 'required');
		$this->form_validation->set_rules('news_slug', 'Slug', 'required');
		$this->form_validation->set_rules('news_content', 'Content', '');
		$this->form_validation->set_rules('news_category', 'Category', 'required');
		$this->form_validation->set_rules('news_link', 'Youtube Link', '');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');


		if($this->form_validation->run() == TRUE){
			
			$config['upload_path'] = './uploads/news';
			$config['allowed_types'] = 'png|jpeg|jpg';
			$config['max_size']	= '100000';
			$config['max_width']  = '100000';
			$config['max_height']  = '76800';

			$this->load->library('upload', $config);
			$this->upload->display_errors('<span style="color:red">', '</span>');

			$save = $this->input->post();

	       	$fileTagName = 'prod_image'; // e.g <input type='file' name='myfile' />    
	       	if ($this->upload->do_upload($fileTagName)) {
		        //Success in validation of all fields.
		       	$img = array('upload_data' => $this->upload->data());	
		       	$image = $img['upload_data']['file_name']; 
		       	$save['news_image'] = $image;
	       	}

	       	if($this->input->post('news_link')){
	       		$youtube_id = get_youtube_id($this->input->post('news_link'));
	       		$youtube_img = get_youtube_img($youtube_id);
	       		$save['news_image']	= $youtube_img;
	       	}

	        $this->admin_model->update_database($save,$id,'news','news_id');
	        $this->session->set_flashdata('saved', 'News is successfully updated.');
			redirect('administrator/news');

	    }else{
	      
	   		$this->load->view('administrator',$data);	  	
	   	}
	}

	public function delete_news($id){
		$this->admin_model->delete_database($id,'news','news_id');
		$this->session->set_flashdata('saved', 'News is successfully deleted.');
		redirect('administrator/news');
	}

	public function sliders(){
		$data['title'] = 'Sliders';
		$data['page'] = 'sliders';
		$data['results'] = $this->admin_model->get_database('sliders');
		$this->load->view('administrator',$data);
	}

	public function add_slider(){
		$data['title'] = 'Add slider';
		$data['page'] = 'add_slider';

		$this->form_validation->set_rules('title1', 'Title1', 'required');
		$this->form_validation->set_rules('title2', 'Title2', '');
		$this->form_validation->set_rules('content', 'Content', 'required');
		$this->form_validation->set_rules('link', 'Link', '');
		$this->form_validation->set_rules('btn_text', 'Button text', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

		if($this->form_validation->run() == TRUE){

		       	$save = array(
		    		'title' => $this->input->post('title1').'<br/>'.$this->input->post('title2'),
		       		'link' => $this->input->post('link'),
		       		'content' => $this->input->post('content'),
		       		'image' => @$this->input->post('image'),
		       		'bg_image' => @$this->input->post('bg_image'),
		       		'btn_text' => @$this->input->post('btn_text'),
		       		'date_created' => date('Y-m-d H:i:s')
		    	);

	       		$this->admin_model->insert_database($save,'sliders');
	       		$this->session->set_flashdata('saved', 'Slider is successfully created.');
				redirect('administrator/sliders');
	    }else{
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function edit_slider($id){
		$data['title'] = 'Edit slider';
		$data['page'] = 'edit_slider';

		$data['result'] = $this->admin_model->get_database_id($id,'sliders','id');

		$this->form_validation->set_rules('title1', 'Title1', 'required');
		$this->form_validation->set_rules('title2', 'Title2', '');
		$this->form_validation->set_rules('content', 'Content', 'required');
		$this->form_validation->set_rules('link', 'Link', '');
		$this->form_validation->set_rules('btn_text', 'Button text', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');


		if($this->form_validation->run() == TRUE){

			$save = array(
		    	'title' => $this->input->post('title1').'<br/>'.$this->input->post('title2'),
		       	'link' => $this->input->post('link'),
		       	'content' => $this->input->post('content'),
		       	'image' => @$this->input->post('image'),
		       	'btn_text' => @$this->input->post('btn_text'),
		       	'bg_image' => @$this->input->post('bg_image'),
		    );

	        $this->admin_model->update_database($save,$id,'sliders','id');

	        $this->session->set_flashdata('saved', 'Slider is successfully updated.');
			redirect('administrator/sliders');

	    }else{
	      
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function delete_slider($id){
		$this->admin_model->delete_database($id,'sliders','id');
		$this->session->set_flashdata('saved', 'Slider is successfully deleted.');
		redirect('administrator/sliders');
	}

	public function commercials(){
		$data['title'] = 'Commercials';
		$data['page'] = 'commercials';
		$data['results'] = $this->admin_model->get_database('commercials');
		$this->load->view('administrator',$data);
	}

	public function add_commercial(){
		$data['title'] = 'Add commercial';
		$data['page'] = 'add_commercial';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

		if($this->form_validation->run() == TRUE){
		
		    $save = $this->input->post();
		    $save['date_created'] = date('Y-m-d H:i:s');
	       	$this->admin_model->insert_database($save,'commercials');
	       	$this->session->set_flashdata('saved', 'Commercial is successfully created.');
			redirect('administrator/commercials');
	   
	    }else{
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function edit_commercial($id){
		$data['title'] = 'Edit commercial';
		$data['page'] = 'edit_commercial';

		$data['result'] = $this->admin_model->get_database_id($id,'commercials','id');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');


		if($this->form_validation->run() == TRUE){

	       	$save = $this->input->post();
	        $this->admin_model->update_database($save,$id,'commercials','id');

	        $this->session->set_flashdata('saved', 'Commercial is successfully updated.');
			redirect('administrator/commercials');

	    }else{
	      
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function delete_commercial($id){
		$this->admin_model->delete_database($id,'commercials','id');
		$this->session->set_flashdata('saved', 'Commercial is successfully deleted.');
		redirect('administrator/commercials');
	}


	public function fixit(){
		$data['title'] = 'Fixit';
		$data['page'] = 'fixit';
		$data['results'] = $this->admin_model->get_fixit();
		$this->load->view('administrator',$data);
	}

	public function add_fixit(){
		$data['title'] = 'Add fixit';
		$data['page'] = 'add_fixit';

		$data['products'] = $this->dropdown_products();
		$data['materials'] = $this->dropdown_materials();

		$this->form_validation->set_rules('product_id', 'Product', 'required');
		$this->form_validation->set_rules('material', 'Material', 'required');
		$this->form_validation->set_rules('external_factor', 'External Factor', '');
		$this->form_validation->set_rules('fix_type', 'Fix Type', '');
		$this->form_validation->set_rules('remarks', 'Remarks', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');

		if($this->form_validation->run() == TRUE){
			$save = $this->input->post();
       		$this->admin_model->insert_database($save,'fixit');
       		$this->session->set_flashdata('saved', 'Fixit is successfully created.');
			redirect('administrator/fixit');
	    }else{
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function edit_fixit($id){
		$data['title'] = 'Edit fixit';
		$data['page'] = 'edit_fixit';

		$data['result'] = $this->admin_model->get_database_id($id,'fixit','id');
		$data['products'] = $this->dropdown_products();
		$data['materials'] = $this->dropdown_materials();

		$this->form_validation->set_rules('product_id', 'Product', 'required');
		$this->form_validation->set_rules('material', 'Material', 'required');
		$this->form_validation->set_rules('external_factor', 'External Factor', '');
		$this->form_validation->set_rules('fix_type', 'Fix Type', '');
		$this->form_validation->set_rules('remarks', 'Remarks', 'required');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');


		if($this->form_validation->run() == TRUE){

	       	$save = $this->input->post();
	        $this->admin_model->update_database($save,$id,'fixit','id');

	        $this->session->set_flashdata('saved', 'Fixit is successfully updated.');
			redirect('administrator/fixit');

	    }else{
	      
	   		$this->load->view('administrator',$data);	  	
	   }
	}

	public function delete_fixit($id){
		$this->admin_model->delete_database($id,'fixit','id');
		$this->session->set_flashdata('saved', 'Fixit is successfully deleted.');
		redirect('administrator/fixit');
	}


	public function material_upload1(){

		$this->load->library('image_lib');
		$config['upload_path'] = './uploads/materials';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2000000';
		$this->load->library('upload', $config);
		$photo = $this->upload->do_upload('photoimg1');
		$image = $this->upload->data();
		$error = $this->upload->display_errors('<p>', '</p>');
		$newImage = $image['file_name'];
		
		if(!$error){
			
			$newImage = $image['file_name'];
			$width = $image['image_width'];
			$height = $image['image_height'];
			$html = '';
			$html .= '<img src="'.base_url().'uploads/materials/'.$newImage.'" id="target" class="img-responsive" />';
			$html .= '<input type="hidden" name="mat_image" value="'.$newImage.'" />';
			echo $html;

		}else{
			echo $error;
		}
	}

	public function material_upload2(){

		$this->load->library('image_lib');
		$config['upload_path'] = './uploads/materials';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2000000';
		$this->load->library('upload', $config);
		$photo = $this->upload->do_upload('photoimg2');
		$image = $this->upload->data();
		$error = $this->upload->display_errors('<p>', '</p>');
		$newImage = $image['file_name'];
		
		if(!$error){
			
			$newImage = $image['file_name'];
			$width = $image['image_width'];
			$height = $image['image_height'];
			$html = '';
			$html .= '<img src="'.base_url().'uploads/materials/'.$newImage.'" id="target" class="img-responsive" />';
			$html .= '<input type="hidden" name="mat_image2" value="'.$newImage.'" />';
			echo $html;

		}else{
			echo $error;
		}
	}

	public function slider_upload1(){

		$this->load->library('image_lib');
		$config['upload_path'] = './uploads/slider';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2000000';
		$this->load->library('upload', $config);
		$photo = $this->upload->do_upload('photoimg1');
		$image = $this->upload->data();
		$error = $this->upload->display_errors('<p>', '</p>');
		$newImage = $image['file_name'];
		
		if(!$error){
			
			$newImage = $image['file_name'];
			$width = $image['image_width'];
			$height = $image['image_height'];
			$html = '';
			$html .= '<img src="'.base_url().'uploads/slider/'.$newImage.'" id="target" class="img-responsive" />';
			$html .= '<input type="hidden" name="image" value="'.$newImage.'" />';
			echo $html;

		}else{
			echo $error;
		}
	}

	public function slider_upload2(){

		$this->load->library('image_lib');
		$config['upload_path'] = './uploads/slider';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2000000';
		$this->load->library('upload', $config);
		$photo = $this->upload->do_upload('photoimg2');
		$image = $this->upload->data();
		$error = $this->upload->display_errors('<p>', '</p>');
		$newImage = $image['file_name'];
		
		if(!$error){
			
			$newImage = $image['file_name'];
			$width = $image['image_width'];
			$height = $image['image_height'];
			$html = '';
			$html .= '<img src="'.base_url().'uploads/slider/'.$newImage.'" id="target" class="img-responsive" />';
			$html .= '<input type="hidden" name="bg_image" value="'.$newImage.'" />';
			echo $html;

		}else{
			echo $error;
		}
	}

	public function reording(){
		$data = $this->admin_model->ordering($_POST['data']);
	}

}

?>
