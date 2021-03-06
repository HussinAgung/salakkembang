<?php
class M_login extends CI_Model {

  	function __construct()
  	{
		parent::__construct();
  	}
  
  	function login($username, $password) {
	
		$username = $this->db->escape($username);
		$password = $this->db->escape($password);
		
		$result = $this->db->query("select * from tbl_pengguna
		where nama_pengguna = $username AND password = $password");
		
		if($result->num_rows()== 0){
			return false;
		}
		else{
			$result = $result->row();
			$this->session->set_userdata('logged_in', $result);
			return true;
		}
  	}
	
	
	function get_role($user)
	{	
		$this->db->select('*');
		$this->db->from($this->tbl_pengguna);
		$this->db->where('nama_pengguna',$user); 
		
		$query = $this->db->get();
		return $query->row();
		
	}
	
}
?>