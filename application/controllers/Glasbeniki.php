<?php
class Glasbeniki extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('glasbenik_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->helper('file');
	}

    //Prikaz podatkov o glasbeniku.
	public function view($slug){
        $data['news_item'] = $this->glasbenik_model->get_event_where($slug);
        $data['title'] = $data['news_item']['Ime'];
		$data['photo']=$data['news_item']['Slika'];
        $this->load->view('templates/header', $data);
        $this->load->view('event/view', $data);
        $this->load->view('templates/footer', $data);
    
	}


    public function index(){
		$search= $this->input->get('search');
		if(isset($search)||$search==''){
			$data['news'] = $this->glasbenik_model-> objave_iskanje($search);
			$data['title'] = "Seznam glasbenikov";
			$data['photo']='Temp.jpeg';

			$this->load->view('templates/header', $data);
			$this->load->view('event/index', $data);
			$this->load->view('templates/footer', $data);
		}
		else{
			$data['news'] = $this->glasbenik_model-> objave();
			$data['title'] = "Seznam glasbenikov";
			$data['photo']='Temp.jpeg';

			$this->load->view('templates/header', $data);
			$this->load->view('event/index', $data);
			$this->load->view('templates/footer', $data);
		}
	}
	public function razvrscanje($slug){
			if($slug=='kraj'){
				$data['news'] = $this->glasbenik_model-> kraj();
			}
			elseif ($slug=='cena') {
				$data['news'] = $this->glasbenik_model-> cena();
			}
			else{
				$data['news'] = $this->glasbenik_model-> objave();
			}
			$data['title'] = "Seznam glasbenikov";
			$data['photo']='Temp.jpeg';

			$this->load->view('templates/header', $data);
			$this->load->view('event/index', $data);
			$this->load->view('templates/footer', $data);
		
	}
	
}