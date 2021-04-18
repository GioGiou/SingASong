<?php
class Login_database extends CI_Model{
public function __construct(){
	$this->load->database();
}

//note
// Insert registration data in database
public function registration_insert($data) {

	// Query to check whether username already exist or not
	$condition = "Email =" . "'" . $data['Email'] . "'";
	$this->db->select('*');
	$this->db->from('Glasbenik');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();
	if ($query->num_rows() == 0) {

		// Query to insert data in database
		$this->db->insert('Glasbenik', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	} else {
		return false;
	}
}

// Read data using username and password
public function login($data) {

	$condition = "Ime =" . "'" . $data['username'] . "' AND " . "Geslo =" . "'" . $data['password'] . "'";
	$this->db->select('*');
	$this->db->from('Uporabnik');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return true;
	} else {
		return false;
	}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

	$condition = "Ime =" . "'" . $username . "'";
	$this->db->select('*');
	$this->db->from('Uporabnik');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}
}
public function delete_insert($data) {
	$this -> db -> where('Ime', $data);
    $this -> db -> delete('Uporabnik');
}
public function update_insert($data) {
	$this -> db -> set('Geslo',$data['password']);
	$this -> db -> where('Ime', $data['username']);
    $this -> db -> update('Uporabnik');
}


}
