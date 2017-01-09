<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class UserClass {
	function __construct(){
		
	}
	
    public function get_user_info()
    {
		$CI =& get_instance();
		$CI->load->library('session');
		$return = NULL;
		
		if($CI->session->userdata('uid')){
			$uid = $CI->session->userdata('uid');
			$query = $CI->db->get_where('users', array('id' => $uid), 1, 0);
			$result = $query->result_array();
			$return = $result[0];
		}
		
		return $return;
    }
	
	public function check_admin(){
		$CI =& get_instance();
		$is_login = $CI->session->userdata('logged_in');
		$user_data = $CI->session->userdata('user_info');
		
		if($is_login){
			if($user_data['role_id'] == 1){
				return 'admin';
			}else{
				return 'user';
			}
			
		}else{
			return false;
		}
	}
}

/* End of file UserClass.php */