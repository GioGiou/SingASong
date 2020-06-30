
<?php
class User_authentication extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_database');
		
	}

	// Show login page
	public function index() {
		$this->load->view('templates/header');
		$this->load->view('user_authentication/login_form');
		$this->load->view('templates/footer');
	}

	// Show registration page
	public function show() {
		$this->load->view('templates/header');
		$this->load->view('user_authentication/registration_form');
		$this->load->view('templates/footer');
	}

	// Validate and store registration data in database
	public function signup() {

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user_authentication/registration_form');
		} else {
			$data = array(
				'Ime' => $this->input->post('username'),
				'Priimek' => $this->input->post('email_value'),
				'Geslo' => $this->input->post('password')
			);
			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('templates/header');
				$this->load->view('user_authentication/login_form', $data);
				$this->load->view('templates/footer');
			} else {
				$this->load->view('templates/header');
				$this->load->view('user_authentication/registration_form');
				$this->load->view('templates/footer');
			}
		}
	}

	public function admin(){

			if(isset($this->session->userdata['logged_in'])){
				$data['username'] = $this->session->userdata['logged_in']['username'];
				$data['email'] = $this->session->userdata['logged_in']['email'];
				if($this->session->userdata['logged_in']['urednik'] == 5){
					$data['admin'] = 'Urednik';
					$this->load->view('templates/header_urednik');
					$this->load->view('user_authentication/admin_page_urednik', $data);
				}
				else{
					$data['admin'] = 'User';
					$this->load->view('templates/header');
					$this->load->view('user_authentication/admin_page', $data);
				}

				$this->load->view('templates/footer');
			}else{
				$data['message_display'] = 'Signin to view user page!';
				$this->load->view('templates/header');
				$this->load->view('user_authentication/login_form', $data);
				$this->load->view('templates/footer');
			}
	}

	// Check for user login process
	public function signin() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$result = $this->login_database->login($data);
		if ($result == TRUE) {

			$username = $this->input->post('username');
			$result = $this->login_database->read_user_information($username);
			if ($result != false) {
				$session_data = array(
					'username' => $result[0]->Ime,
					'email' => $result[0]->Priimek,
					'urednik' => $result[0]->Id,
				);
				// Add user data in session
				$data = array('error_message' => 'Signin OK');
				$this->session->set_userdata('logged_in', $session_data);
				$this->load->view('templates/header',$data);
				$this->load->view('user_authentication/login_form',$data);
				$this->load->view('templates/footer');
			}
		} else {
			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
			$this->load->view('templates/header');
			$this->load->view('user_authentication/login_form', $data);
			$this->load->view('templates/footer');
		}
	}

	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('templates/header');
		$this->load->view('user_authentication/login_form', $data);
		$this->load->view('templates/footer');
	}
	public function delete_user($data) {   
		$this->login_database->delete_insert($data);
		$this->load->view('templates/header');
		$this->load->view('user_authentication/delete');
		$this->load->view('templates/footer');
	}
	public function update_user() {
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		); 
		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('user_authentication/edit_form', $data);
			$this->load->view('templates/footer');	
		}else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->session->userdata['logged_in']['email'],
			);
			if($this->session->userdata['logged_in']['urednik']){
				$data['admin'] = 'Urednik';
			}
			else{
				$data['admin'] = 'User';
			}
			$this->login_database->update_insert($data);
			
			$this->load->view('templates/header');
			$this->load->view('user_authentication/admin_page', $data);
			$this->load->view('templates/footer');
		}
	}

}
