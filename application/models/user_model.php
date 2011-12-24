<?php
class User_model extends CI_Model {
  var $islogged = FALSE;
	
  function __construct(){
    parent::__construct();
  }

	function checkuser($usr,$pass){
		$this->db->where('u_username',$usr);
		$this->db->where('u_pass',$pass);
		$q=$this->db->get('t_users');

		if($q->num_rows() == 1){
		  $this->islogged = TRUE;	  
		}
		return $this->islogged;
	}
	
	public function get_email(){
	  $this->db->where('u_id',1);
	  $q=$this->db->get('t_users');
	  return trim($q->row()->u_email);
	}
	
	public function chg_email($u_email){
	  $this->db->where('u_id',1);
	  $this->db->update('t_users', array('u_email' => $u_email));
	  return $this->db->affected_rows() == 1;
	}
	
	public function chg_pass($password,$npassword){
	  $this->db->where('u_pass',$password);
	  $this->db->update('t_users', array('u_pass' => $npassword));
	  return $this->db->affected_rows() == 1;
	}
}