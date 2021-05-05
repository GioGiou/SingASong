<?php
class Glasbenik_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_event_where($slug){
		$query = $this->db->get_where('Glasbenik', array('Id'=> $slug));
		return $query->row_array();
	}

}