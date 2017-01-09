<?php 

class Admin_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }


	function get_subcategory_by_catid($id)
	{
		return $this->db
			->where('cat_id',$id)
	 		->get('subcategories')
			->result();
	}

	function get_products_and_category()
	{
		return $this->db
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
			->order_by('sorting','asc')
	 		->get('products')
			->result();
	}

	function get_product_id_and_catsub($id){
		return $this->db
		    ->select('products.*,cat_name,sub_name')
			->where('prod_id',$id)
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
			->join('subcategories', 'products.sub_id = subcategories.sub_id', 'left')
			->get('products')
			->row();
	}

	function get_subcategories()
	{
		return $this->db
	 		->join('categories', 'categories.cat_id = subcategories.cat_id', 'left')
	 		->get('subcategories')
			->result();
	}

	function get_subcategory_id($id){
		return $this->db
			->where('sub_id',$id)
			->join('categories', 'categories.cat_id = subcategories.cat_id', 'left')
			->get('subcategories')
			->row();
	}

	function get_database($table){
		return $this->db
	 		->get($table)
			->result();
	}

    function get_database_id($id,$table,$where){
		return $this->db
			->where($where,$id)
			->get($table)
			->row();
	}

	function insert_database($to_insert,$table){
		return $this->db
	 		->insert($table,$to_insert);
	}

	function update_database($to_update,$id,$table,$where){
		return $this->db
			->where($where,$id)
	 		->update($table,$to_update);
	}

	function delete_database($id,$table,$where){
		return $this->db
			->where($where,$id)
	 		->delete($table);
	}

	function get_material_shit($name)
	{
		return $this->db
			->where('cat_id',$id)
	 		->get('subcategories')
			->result();
	}

	function get_fixit()
	{
		return $this->db
			->join('products', 'products.prod_id = fixit.product_id', 'left')
	 		->get('fixit')
			->result();
	}


	// FOR DATATABLES REORDERING
	function ordering($data){

		$id = $data['id'];
		$fromPosition = $data['fromPosition'];
		$toPosition = $data['toPosition'];
		$direction = $data['direction'];
		$aPosition = ($direction === "back") ? $toPosition+1 : $toPosition-1;

		$this->db->where('sorting',$toPosition)->update('products',array('sorting' => 0));
		$this->db->where('prod_id',$id)->update('products',array('sorting' => $toPosition));

		if($direction === "back") {
    		$x = $this->db
				->select('sorting')
				->where('sorting <',$fromPosition)
				->where('sorting >',$toPosition)
				->where('prod_id !=', $id)
				->where('sorting !=', 0)
				->order_by('sorting', 'DESC')
	 			->get('products')
				->result();

			foreach ($x as $value) {
				$this->db
					->where('sorting',$value->sorting)
					->update('products',array('sorting' => $value->sorting + 1));
			}
    		        
		}else{
			$x = $this->db
				->select('sorting')
				->where('sorting <',$toPosition)
				->where('sorting >',$fromPosition)
				->where('prod_id !=', $id)
				->where('sorting !=', 0)
				->order_by('sorting', 'ASC')
	 			->get('products')
				->result();

			foreach ($x as $value) {
				$this->db
					->where('sorting',$value->sorting)
					->update('products',array('sorting' => $value->sorting - 1));
			}
		}

		$this->db->where('sorting',0)->update('products',array('sorting' => $aPosition));
	}

	function get_maxorder(){
		$max = $this->db->select_max('sorting')->get('products')->row();
		return $max->sorting;			
	}






    
}
?>