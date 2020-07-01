<?php
class Event_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_event(){
		$this->db->where('Datum >=', date("Y-m-d"));
		$query = $this->db->get('Dogodek');
		return $query->result_array();
	}
	public function get_event_date(){
		$this->db->where('Datum >=', date("Y-m-d"));
		$this->db->order_by('Datum', 'DESC');
		$query = $this->db->get('Dogodek');
		return $query->result_array();
	}
	public function get_event_alf(){
		$this->db->where('Datum >=', date("Y-m-d"));
		$this->db->order_by('Naslov', 'ASC');
		$query = $this->db->get('Dogodek');
		return $query->result_array();
	}
	public function get_event_old(){
		$this->db->where('Datum <', date("Y-m-d"));
		$query = $this->db->get('Dogodek');
		return $query->result_array();
	}
	public function get_event_all(){
		$query = $this->db->get('Dogodek');
		return $query->result_array();
	}
	

	public function get_event_where($slug){
		$query = $this->db->get_where('Dogodek', array('Id'=> $slug));
		return $query->row_array();
	}

	public function set_event(){

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'Vir'=> 1,
			'Urednik'=> 1,
			'Naslov' => $this->input->post('title'),
			'Prikaz' => 'List',
			'Kraj' => $this->input->post('kraj'),
			'Datum' => $this->input->post('datum'),
			'Opis' => $this->input->post('text'));

		return $this->db->insert('Dogodek', $data);
		
			
	}
}