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

	$condition = "Email =" . "'" . $data['email'] . "' AND " . "Geslo =" . "'" . $data['password'] . "'";
	$this->db->select('*');
	$this->db->from('Glasbenik');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return true;
	} else {
		return false;
	}
}

public function get_data_by_email($email){
	$condition = "Email =" . "'" . $email . "'";
	$this->db->select('*');
	$this->db->from('Glasbenik');
	$this->db->where($condition);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->row_array();
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
	if ($data['password'] != '') {
		$this ->db-> set('Geslo',$data['password']);
	}
	if ($data['kraj'] != '') {
		$this ->db-> set('Kraj',$data['kraj']);
	}
	if ($data['cena'] != '') {
		$this ->db-> set('Cena',$data['cena']);
	}
	if ($data['slika'] != '') {
		$this ->db-> set('Slika',$data['slika']);
	}
	if ($data['opis'] != '') {
		$this->db->set('Opis',$data['opis']);
	}
	if ($data['tel'] != '') {
		$this ->db-> set('Tel',$data['tel']);
	}
	if ($data['fb'] != '') {
		$this ->db-> set('FB',$data['fb']);
	}
	if ($data['insta'] != '') {
		$this ->db-> set('Insta',$data['insta']);
	}
	if ($data['yt'] != '') {
		$this ->db-> set('YT',$data['yt']);
	}
	if ($data['sc'] != '') {
		$this ->db-> set('SC',$data['sc']);
	}
	$this ->db-> where('Ime', $data['username']);
    $this ->db-> update('Glasbenik');
}


}
