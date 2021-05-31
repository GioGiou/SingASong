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

public function insert_image($data){
	$this ->db-> set('Slika',$data['Slika']);
	$this ->db-> where('Ime', $data['Ime']);
    $this ->db-> update('Glasbenik');
}


public function update_insert($data) {
	if ($data['Geslo'] != '') {
		$this ->db-> set('Geslo',$data['Geslo']);
	}
	if ($data['Kraj'] != '') {
		$this ->db-> set('Kraj',$data['Kraj']);
	}
	if ($data['Cena'] != '') {
		$this ->db-> set('Cena',$data['Cena']);
	}
	if ($data['Opis'] != '') {
		$this->db->set('Opis',$data['Opis']);
	}
	if ($data['Tel'] != '') {
		$this ->db-> set('Tel',$data['Tel']);
	}
	if ($data['FB'] != '') {
		$this ->db-> set('FB',$data['FB']);
	}
	if ($data['Insta'] != '') {
		$this ->db-> set('Insta',$data['Insta']);
	}
	if ($data['YT'] != '') {
		$this ->db-> set('YT',$data['YT']);
	}
	if ($data['SC'] != '') {
		$this ->db-> set('SC',$data['SC']);
	}
	$this ->db-> where('Ime', $data['username']);
    $this ->db-> update('Glasbenik');
}


}
