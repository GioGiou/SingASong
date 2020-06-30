<?php
class Login_database extends CI_Model{
public function __construct(){
	$this->load->database();
}
// Insert registration data in database
public function registration_insert($data) {

	// Query to check whether username already exist or not
	$condition = "name =" . "'" . $data['name'] . "'";
	$this->db->select('*');
	$this->db->from('User');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();
	if ($query->num_rows() == 0) {

		// Query to insert data in database
		$this->db->insert('User', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	} else {
		return false;
	}
}

// Read data using username and password
public function login($data) {

	$condition = "name =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
	$this->db->select('*');
	$this->db->from('User');
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

	$condition = "name =" . "'" . $username . "'";
	$this->db->select('*');
	$this->db->from('User');
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
	$this -> db -> where('name', $data);
    $this -> db -> delete('User');
}
public function update_insert($data) {
	$this -> db -> set('password',$data['password']);
	$this -> db -> where('name', $data['username']);
    $this -> db -> update('User');
}


}
