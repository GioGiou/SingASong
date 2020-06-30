<?php
class Event_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_event(){
		$query = $this->db->get('post');
		return $query->result_array();
	}
	

	public function get_event_where($slug){
		$query = $this->db->get_where('post', array('slug' => $slug));
		return $query->row_array();
	}

	public function set_event(){

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text'));

		return $this->db->insert('post', $data);
		
			
	}
}