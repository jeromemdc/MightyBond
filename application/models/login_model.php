<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * Oreo - Oreotime
	 * Model for admin login
	 * Hercival Aragon
	 * Sep 24, 2013
	*/
	class Login_model extends CI_Model {

	    function __construct(){
	        parent::__construct();
	    }
	
		public function check($name, $pass ){
	
			$this->db->where('username', $name);
			$this->db->where('password', $pass);
			$q = $this->db->get('admin');

			return $q->result();
		}
		public function check_users($name, $pass ){
	
			$this->db->where('username', $name);
			$this->db->where('password', $pass);
			$q = $this->db->get('admin');
			return $q->result();
		}
		public function forgotpass($email){
			$this->db->where('email', $email);
			$q = $this->db->get('admin');
			return $q->row();
		}
	
	
	}
?>