<?php
class Noticias_model extends CI_Model {
	var $count;

  function __construct(){
    parent::__construct();
  }

	function GetAll($filter=TRUE){
		$this->db->order_by("n_pdate", "desc");
		if($filter){
		  $this->db->where('DATE(`n_pdate`) <= DATE( NOW( ) )');
		  $this->db->where('n_active = 1');
		}
		$q=$this->db->get('t_noticias');
		
		$this->count=$q->num_rows();

		if($this->count>0){
			foreach($q->result() as $row){
				$data[]=$row;
			}
			return $data;
		}
	}

	function Get($from,$num,$filter=TRUE){
		$this->db->start_cache();
		if($filter){
		  $this->db->where('DATE(`n_pdate`) <= DATE( NOW( ) )');
		  $this->db->where('n_active = 1');
		}
		$this->db->stop_cache();
		$this->count=$this->db->count_all_results('t_noticias');
		$this->db->offset($from);
		$this->db->limit($num);
		$this->db->order_by("n_pdate", "desc");
		$q=$this->db->get('t_noticias');
		//$this->count=$q->num_rows();
		if($this->count>0){
			foreach($q->result() as $row){
				$data[]=$row;
			}
			return $data;
		}
	}
	
	function Getid($id){
		$this->db->where("n_id = $id");
		$q=$this->db->get('t_noticias');
		return $q->row();
	}

	function Delid($id){
		$this->db->where("n_id = $id");
		$q=$this->db->delete('t_noticias');
		return $this->db->affected_rows() == 1;
	}

	function Add($data){
	  $this->db->insert('t_noticias', $data); 
	}

	public function chg_act($n_id,$active){
	  $this->db->where('n_id',$n_id);
	  $this->db->update('t_noticias', array('n_active' => $active));
	  return $this->db->affected_rows() == 1;
	}
	
	function Update($n_id,$data){
	  $this->db->update('t_noticias', $data, array('n_id' => $n_id));
	  return $this->db->affected_rows() == 1;
	}	
}