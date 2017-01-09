<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    public function about(){
        $data['page'] = 'about';
        $data['title'] = 'About';
        $data['news'] = $this->home_model->get_news();
        $data['tips'] = $this->home_model->get_tips();
        $data['commercial'] = $this->home_model->get_commercial();
        $this->load->view('template', $data);
    }

    public function environmental_policy(){
        $data['page'] = 'environmental_policy';
        $data['title'] = 'Environment Policy';
        $data['news'] = $this->home_model->get_news();
        $data['tips'] = $this->home_model->get_tips();
        $data['commercial'] = $this->home_model->get_commercial();
        $this->load->view('template', $data);
    }

    public function news(){
        $data['title'] = 'News and Updates';
        $data['results'] = $this->home_model->get_all_news();
        $data['page'] = (count($data['results']) == 0 ? 'miscellaneous' : 'updates');
        $this->load->view('template', $data);
    }

    public function content($slug){ 
        $data['page'] = 'news';
        $data['news'] = $this->home_model->get_news();
        $data['tips'] = $this->home_model->get_tips();
        $data['commercial'] = $this->home_model->get_commercial();
        $data['result'] = $this->home_model->get_news_slug($slug);
        $this->load->view('template', $data);
    }

    public function tips(){
        $data['title'] = 'Tips and Tricks';
        $data['results'] = $this->home_model->get_all_tips();
        $data['page'] = (count($data['results']) == 0 ? 'miscellaneous' : 'updates');
        $this->load->view('template', $data);
    }

    public function csr(){
        $data['page'] = 'csr';
        $config['base_url'] = base_url().'csr/';
        $config['total_rows'] = count($this->home_model->get_all_csr());
        $config['per_page'] = 3;
        $config['uri_segment'] = 2;
        $config['display_pages'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        
        if($this->uri->segment(2)){
            $segments =  $this->uri->segment(2);
        }
        else{
            $segments = 0 ;
        }

        $data['results'] = $this->home_model->get_all_csr_paginated(3,$segments);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('template', $data);
    }

    public function commercials(){
        $data['results'] = $this->home_model->get_all_commercials();
        $data['page'] = (count($data['results']) == 0 ? 'miscellaneous' : 'commercials');
        $this->load->view('template', $data);
    }

    public function career(){
        $data['title'] = 'Career Philosophy';
        $data['results'] = $this->home_model->get_all_articles();
        $data['page'] = (count($data['results']) == 0 ? 'miscellaneous' : 'career');
        $this->load->view('template', $data);
    }

    public function directory(){
        $data['page'] = 'directory';
        $this->load->view('template', $data);
    }

    public function openings(){
        $data['page'] = 'miscellaneous';
        $data['title'] = 'Openings';
        $this->load->view('template', $data);
    }   

    public function contact(){
        $data['page'] = 'contact';
        $data['nav'] = $this->home_model->get_categories();
        $data['success'] = 0;

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        $this->form_validation->set_rules('inquiry', 'Inquiry', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if($this->form_validation->run() == TRUE){
            $data['success'] = 1;
            $this->_send_email($this->input->post('name'),$this->input->post('email'),$this->input->post('contact'),$this->input->post('inquiry'),$this->input->post('message'));
        }   

        $this->load->view('template', $data);
    }

    private function _send_email($name,$email,$contact,$inquiry,$message){

        /*$mail_config = Array(
            'protocol' => 'mail',
            'smtp_host' => 'virus-server.com',
            'smtp_port' => '587',
            'smtp_user' => 'noreply@virus-server.com',
            'smtp_pass' => 'I+%6?N]D93!G',
            'mailtype'  => 'html'
        );*/

        $config['protocol'] = 'mail';
        $config['mailtype'] = 'html';

        $this->load->library('email');
        $this->email->initialize($config);
        
        $this->email->set_newline("\r\n");
        $this->email->from('no-reply@repchem.com', 'RCI');
        $this->email->reply_to('no-reply@repchem.com', 'RCI');
        $this->email->to('aocorpuz@repchem.com,cmfernandez@repchem.com');    
        $this->email->bcc('jerome.delacruz@virusworldwide.com');    
        $this->email->subject('RCI Contact Form - '.$name);
        $this->email->message( '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                                    <html xmlns="http://www.w3.org/1999/xhtml">
                                    <body>
                                        <p>Name: '.$name.'</p>
                                        <p>Email: '.$email.'</p>
                                        <p>Contact: '.$contact.'</p>
                                        <p>Type of Inquiry: '.$inquiry.'</p>
                                        <p>Message: '.nl2br($message).'</p>
                                    </body>
                                    </html>' ); 
        $this->email->send();
        //echo $this->email->print_debugger();
    }

    public function products($cat='',$product=''){

        $data['nav'] = $this->home_model->get_categories();
        $data['category'] = $this->home_model->get_category_slug($cat);

        if (empty($data['category'])){
                show_404();
        }

        if($product == ''){
            $data['subcategories'] = $this->home_model->get_subcategory_catid($data['category']->cat_id);
            $data['products'] = $this->home_model->get_products_catid($data['category']->cat_id);
            $data['page'] = 'category';
        }else{
            
            $data['result'] = $this->home_model->get_product_slug($data['category']->cat_id, $product);
            
            if (empty($data['result'])){
                show_404();
            }

            $data['products'] = $this->home_model->get_products_catid_rand($data['category']->cat_id,$data['result']->prod_id);
            $data['page'] = 'product';
        }
        
        $this->load->view('template', $data);
    }

    public function search(){

        $data['nav'] = $this->home_model->get_categories();
        $data['page'] = 'search';
        $search = ($this->input->post('search') ? $this->input->post('search') : '');
        if($search){ $this->session->set_userdata('search' , $search); }
        $data['results'] = $this->home_model->get_products_search($this->session->userdata('search'));
        $this->load->view('template', $data);
    }

    public function choose(){
        $data['page'] = 'choose';
        $data['nav'] = $this->home_model->get_categories();
        $data['materials'] = $this->home_model->get_materials();
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

    public function promos(){
        $data['page'] = 'promos';
        $this->load->view('template', $data);   
    }

    public function index($code='ph'){
        $data['page'] = 'home2';
        $data['sliders'] = $this->home_model->get_sliders();
        $data['nav'] = $this->home_model->get_categories();
        $data['news'] = $this->home_model->get_news();
        $data['tips'] = $this->home_model->get_tips();
        $data['commercial'] = $this->home_model->get_commercial();
        $this->home_model->get_country($code);
        $this->load->view('template', $data);
    }

}