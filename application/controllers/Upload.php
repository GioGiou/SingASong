<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Upload extends CI_Controller{

	public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('user_authentication/update_user', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './assets/photos';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('slika'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        foreach ($error as $errorx) {
                                echo $errorx;
                        }

                        $this->load->view('user_authentication/edit_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('user_authentication/admin_page', $data);
                }
        }
}

?>