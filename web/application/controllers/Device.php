<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('main_model');
    }

    public function index()
    {
        $this->load->helper('url');

        $data['query'] = $this->main_model->fetch_data();

        $this->load->view('header', ['title' => 'Home']);
        $this->load->view('template', [
            'body' => $this->load->view('device', $data,  TRUE),
            'path' => makePath([
                'คลัง' => '#',
                'ประเภท' => '#',
                'อุปกรณ์' => '#',

            ]),
            'back' => "",
        ]);

        $this->load->view('bottom');
    }

    public function add_device_name()
	{
		//Database insert device_name & id into device_sub 
		$this->main_model->insert_name_deviceSub();
        
        
	}

	/*public function delete_data_sub($sub_id)
	{
		//Database delete device_sub
        $this->main_model->delete_data_deviceSub($sub_id);
        //redirect($_SERVER['HTTP_REFERER']);

    }*/
    
    public function edit_data_sub()
	{
        
        //Database update device_sub
        $data['query']=$this->main_model->edit_data_deviceSub();

    }
    
    public function hidden_data_sub()
    {
        $data['query']=$this->main_model->hidden_sub();
    }

	
}