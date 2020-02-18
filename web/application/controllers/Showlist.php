<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showlist extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('typedevice_model');
    }

	public function index()
	{
        $data['query']=$this->typedevice_model->showdataDevicesubject();

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/
        
		$this->load->view('css');
        $this->load->view('showlist_view',$data);
        $this->load->view('js');
	}
}


