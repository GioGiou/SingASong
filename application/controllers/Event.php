<?php
class Event extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('event_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->helper('file');
	}

	public function create(){
		if(isset($this->session->userdata['logged_in'])){
			if($this->session->userdata['logged_in']['urednik']){
				$this->load->helper('form');
				$this->load->library('form_validation');

				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('text', 'Text', 'required');
				$this->form_validation->set_rules('kraj', 'Kraj', 'required');
				$this->form_validation->set_rules('datum', 'Datum', 'required');

				$data['title'] = "Add new event";

				if($this->form_validation->run() === FALSE){
					$this->load->view('templates/header_urednik');
					$this->load->view('event/create');
					$this->load->view('templates/footer');
				}else{
					$this->event_model->set_event();
					$this->load->view('templates/header_urednik');
					$this->load->view('event/success');
					$this->load->view('templates/footer');
					
				}
			}
			else{
				$this->load->helper('form');
	
				// Load form validation library
				$this->load->library('form_validation');
	
				$data['message_display'] = 'You are not an admin!';
				$this->load->view('templates/header');
				$this->load->view('user_authentication/login_form', $data);
				$this->load->view('templates/footer');
	
			}	
		}
		else{
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			$data['message_display'] = 'Signin to create a Event!';
			$this->load->view('templates/header');
			$this->load->view('user_authentication/login_form', $data);
			$this->load->view('templates/footer');

		}
	}

	public function view($slug){

		if(isset($this->session->userdata['logged_in'])){
			$data['news_item'] = $this->event_model->get_event_where($slug);
			$data['title'] = "Event Item";
			$this->load->view('templates/header', $data);
        	$this->load->view('event/view', $data);
        	$this->load->view('templates/footer', $data);
		}
		else{
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			$data['message_display'] = 'Signin to view a event!';
			$this->load->view('templates/header');
			$this->load->view('user_authentication/login_form', $data);
			$this->load->view('templates/footer');

		}
	}


    public function index(){
		
		$data['news'] = $this->event_model->get_event();
		$data['title'] = "All events";

		$this->load->view('templates/header', $data);
        $this->load->view('event/index', $data);
        $this->load->view('templates/footer', $data);

	}
	
}