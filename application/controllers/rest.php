<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class Rest extends REST_Controller
{

    public function sliders_get()
    {
        $data = $this->home_model->get_sliders();

        foreach ($data as $value) {
            $x[] = array(
                    'id' => $value->id,
                    'image' => base_url().'uploads/slider/'.$value->image,
                    'title' => $value->title,
                    'link' => $value->link
            );
        }
        $this->response($x, 200);
    }

    public function products_get()
    {
        $data = $this->home_model->get_all_products();
        foreach ($data as $value) {
            $material = ''; $mat_name = '';
            $works = $this->home_model->get_works($value->prod_id);
            foreach ($works as $work){
                $material = $this->home_model->get_material_name($work->material);
                $mat_name .= $material->mat_name.', ';
            }
            
            $x[] = array(
                    'id' => $value->prod_id,
                    'name' => $value->prod_name,
                    'slug' => $value->prod_slug,
                    'sorting' => $value->sorting,
                    'description' => $value->description,
                    'uses' => $value->uses,
                    'availability' => $value->availability,
                    'tips' => $value->tips,
                    'works' => substr($mat_name, 0, -2),
                    'features' => $value->features,
                    'image' => base_url().'uploads/products/'.$value->image,
                    'job_type' => $value->job_type,
                    'category' => $value->cat_name,
                    'subcategory' => $value->sub_name,
                    'pdf1' => base_url().'uploads/products/'.$value->prod_pdf1,
                    'pdf2' => base_url().'uploads/products/'.$value->prod_pdf2,
                    'countries' => $value->countries,
            );
        }
        
        $this->response($x, 200);
    }



    public function categoryProducts_get($id)
    {
        $data = $this->home_model->get_products_catid($id);
        foreach ($data as $value) {
            $material = ''; $mat_name = '';
            $works = $this->home_model->get_works($value->prod_id);
            foreach ($works as $work){
                $material = $this->home_model->get_material_name($work->material);
                $mat_name .= $material->mat_name.',';
            }
            
            $x[] = array(
                    'id' => $value->prod_id,
                    'name' => $value->prod_name,
                    'slug' => $value->prod_slug,
                    'sorting' => $value->sorting,
                    'description' => $value->description,
                    'uses' => $value->uses,
                    'availability' => $value->availability,
                    'tips' => $value->tips,
                    'works' => substr($mat_name, 0, -1),
                    'features' => $value->features,
                    'image' => base_url().'uploads/products/'.$value->image,
                    'job_type' => $value->job_type,
                    'cat_id' => $value->cat_id,
                    'sub_id' => $value->sub_id,
                    'pdf1' => base_url().'uploads/products/'.$value->prod_pdf1,
                    'pdf2' => base_url().'uploads/products/'.$value->prod_pdf2,
            );
        }
        
        $this->response($x, 200);
    }


    public function fixit_get(){
        
        $data = $this->home_model->get_fixitapp();
        $this->response($data, 200);   
    }

    public function latestNews_get()
    {
        $data = $this->home_model->get_latestnews();
        $this->response($data, 200);
    }

    public function latestCommercial_get(){
        $data = $this->home_model->get_latestcommercial();
        $this->response($data, 200);
    }

    public function news_get(){
        $data = $this->home_model->get_all_news(); 
        
        

        foreach ($data as $value) {

            if($value->news_category == 1){
                $category = "News and Updates";
            }elseif($value->news_category == 2){
                $category = "Tips and Tricks";
            }elseif($value->news_category == 3){
                $category = "CSR";    
            }else{
                $category = "Career Philosophy";
            }

            $x[] = array(
                    'id' => $value->news_id,
                    'title' => $value->news_title,
                    'slug' => $value->news_slug,
                    'image' => base_url().'uploads/news/'.$value->news_image,
                    'content' => $value->news_content,
                    'category' => $category
            );
        }
        $this->response($x, 200);
    }

    public function newsSlug_get($slug){
        $data = $this->home_model->get_news_slug($slug);
        $this->response($data, 200);
    }

    public function commercials_get(){
        $data = $this->home_model->get_all_commercials();
        $this->response($data, 200);   
    }

    public function categories_get(){
        $data = $this->home_model->get_categories();
        $this->response($data, 200); 
    }

    public function categoriesSlug_get($slug){
        $data = $this->home_model->get_category_slug($slug);
        $this->response($data, 200); 
    }

    public function categorySlug_get($slug){
        $data = $this->home_model->get_category_slug($slug);
        $this->response($data, 200); 
    }

    public function categorySubcategory_get($catid){
        $data = $this->home_model->get_subcategory_catid($catid);
        $this->response($data, 200);    
    }

    public function productCategory_get($catid){
        $data = $this->home_model->get_products_catid($catid);
        $this->response($data, 200);       
    }

    public function productSlug_get($slug){
        $data = $this->home_model->get_product_slug($slug);
        $this->response($data, 200);       
    }

    public function materials_get(){
        $data = $this->home_model->get_materials();
        $this->response($data, 200);       
    }


}