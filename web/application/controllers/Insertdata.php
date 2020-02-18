<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertdata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('typedevice_model');
    }

	public function index()
	{
        $data['query']=$this->typedevice_model->showdataDevicetype();

		$this->load->view('css');
        $this->load->view('insert_view',$data);
        $this->load->view('js');
    }

    //insert data to Device subject table from database
    public function adding()
    {

        $this->typedevice_model->adddataDevicesubject();
       
    }

    //call old data after insert to  Device subject table from database
    public function edit($devicesub_id)
	{
        $data['query']=$this->typedevice_model->readDataDevicesubjectAfterInsertSuccess($devicesub_id);

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/

		$this->load->view('css');
        $this->load->view('edit_view',$data);
        $this->load->view('js');
    }

    //update new data to Device subject table from database
    public function editdata()
    {

        $this->typedevice_model->editdataDevicesub();
       
    }
    
    
}




