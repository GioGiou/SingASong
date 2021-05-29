<?php
class Glasbenik_editable extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('glasbenik_model');
		$this->load->helper('url_helper');
		//$this->load->library('session');
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
        //dodano
        $id = $data['news_item']['ID'];
        ?>

        	<div>
        		<a href="<?php echo base_url() ?>index.php/glasbenik_editable/editable?id=<?php echo $id ?>">Edit</a>
        	</div>

        <?php
    
	}

	public function editable(){
		$result = $this->glasbenik_model->get_event_where($_GET['id']);
		$this->load->view('user_authentication/edit_form');
	}


    public function index(){
		
		$data['news'] = $this->glasbenik_model-> objave();
		$data['title'] = "Seznam glasbenikov";
		$data['photo']='Temp.jpeg';

		$this->load->view('templates/header', $data);
        $this->load->view('event/index', $data);
        $this->load->view('templates/footer', $data);
		
	}
	
}