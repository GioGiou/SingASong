<?php
class Glasbenik_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_event_where($slug){
		$query = $this->db->get_where('Glasbenik', array('Id'=> $slug));
		return $query->row_array();
	}
	public function objave(){
		$query = $this->db->get('Glasbenik');
		return $query->result_array();
	}
	public function objave_iskanje($search){
		$condition = "Ime LIKE '%" . $search . "%' OR Opis LIKE '%" . $search . "%' OR Kraj LIKE '%" . $search . "%'";
		$this->db->select('*');
		$this->db->from('Glasbenik');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}

}