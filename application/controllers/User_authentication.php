
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

	//note
	// Validate and store registration data in database
	public function signup() {
	
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('password2', 'Re-enter password', 'trim|required|min_length[5]|matches[password]');
			$this->form_validation->set_rules('kraj', 'Kraj', 'trim');
			$this->form_validation->set_rules('cena', 'Cena', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header');
				$this->load->view('user_authentication/registration_form');
				$this->load->view('templates/footer');
			} else {
				$data = array(
					'Ime' => $this->input->post('username'),
					'Email' => $this->input->post('email'),
					'Geslo' => $this->input->post('password'),
					'Opis' => $this->input->post('description'),
					'Kraj' => $this->input->post('kraj'),
					'Cena' => $this->input->post('cena'),
					'Sika' => "Test.png",
					'Tel' => '',
					'FB' => '',
					'Insta' => '',
					'YT' => '',
					'SC' => ''
				);
				$result = $this->login_database->registration_insert($data);
				if ($result == TRUE) {
					$data['message_display'] = 'Uspešno ste se registrirali. Če želite nadaljevati se morate prijaviti.';
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
				
					$data['admin'] = 'uporabnik';
					$this->load->view('templates/header');
					$this->load->view('user_authentication/admin_page', $data);
				

				$this->load->view('templates/footer');
			}else{
				$data['message_display'] = 'Potrebna je prijava.';
				$this->load->view('templates/header');
				$this->load->view('user_authentication/login_form', $data);
				$this->load->view('templates/footer');
			}
	}

	// Check for user login process
	public function signin() {

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$result = $this->login_database->login($data);
		if ($result == TRUE) {
				// Add user data in session
				$query = $this->login_database->get_data_by_email($data['email']);
				$this->session->set_userdata($query);
				// $result dej v session
				$data = array('error_message' => 'Vspešna prijava');
				$this->load->view('user_authentication/admin_page');
			
		} else {
			$data = array(
				'error_message' => $data['email']
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
		$data['message_display'] = 'Uspešna odjava';
		$this->load->view('templates/header');
		$this->load->view('user_authentication/login_form', $data);
		$this->load->view('templates/footer');
	}
	public function delete_user($data) {   
		$this->login_database->delete_insert($data);
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->load->view('templates/header');
		$this->load->view('user_authentication/delete');
		$this->load->view('templates/footer');
	}

	public function do_upload(){
        $config['upload_path']          = './assets/photos';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('slika'))
        {
            $error = array('error' => $this->upload->display_errors());

            foreach ($error as $errorx) {
                    echo $errorx;
            }

            $this->load->view('templates/header');
			$this->load->view('user_authentication/update_photo', $data);
			$this->load->view('templates/footer');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

			$this->load->view('templates/header');
			$this->load->view('user_authentication/admin_page', $data);
			$this->load->view('templates/footer');
        }
}

	public function update_user() {
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('kraj', 'Kraj', 'trim');
		$this->form_validation->set_rules('cena', 'Cena', 'trim');
		$this->form_validation->set_rules('tel', 'Tel', 'trim');
		$this->form_validation->set_rules('fb', 'FB', 'trim');
		$this->form_validation->set_rules('yt', 'YT', 'trim');
		$this->form_validation->set_rules('sc', 'SC', 'trim');

		$data = array(
			'username' => $this->input->post('username'),
			'Geslo' => $this->input->post('password'),
			'Opis' => $this->input->post('description'),
			'Kraj' => $this->input->post('kraj'),
			'Cena' => $this->input->post('cena'),
			'Tel' => $this->input->post('tel'),
			'FB' => $this->input->post('fb'),
			'Insta' => $this->input->post('insta'),
			'YT' => $this->input->post('yt'),
			'SC' => $this->input->post('sc')
		); 
		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('user_authentication/edit_form', $data);
			$this->load->view('templates/footer');	
		}else{
			
			$this->login_database->update_insert($data);
			
			$this->load->view('templates/header');
			$this->load->view('user_authentication/admin_page', $data);
			$this->load->view('templates/footer');
		}
	}

}
