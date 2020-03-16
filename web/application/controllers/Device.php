<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('main_model');
        $this->load->model('Auth_model');
    }

    public function index($type_id)
    {
        $perm = $this->Auth_model->check();
        if ($perm != 1 || $perm != 2 || $perm != 3) redirect(base_url());

        $data['type_id'] = $type_id;
        $data['type_name'] = $this->main_model->fetch_type_name($type_id);
        $data['query'] = $this->main_model->fetch_subject($type_id);

        $this->load->view('header', ['title' => 'Home']);
        $this->load->view('template', [
            'body' => $this->load->view('device', $data,  TRUE),
            'path' => makePath([
                'คลัง' => base_url('showtype'),
                $data['type_name']->type_name => '#',

            ]),
            'back' => base_url('showtype'),
        ]);

        $this->load->view('bottom');
    }

    public function add_device_name()
    {
        $perm = $this->Auth_model->check();
        if ($perm != 99) redirect(base_url());

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
        $perm = $this->Auth_model->check();
        if ($perm != 99) redirect(base_url());

        //Database update device_sub
        $data['query'] = $this->main_model->edit_data_deviceSub();
    }

    public function hidden_data_sub()
    {
        $perm = $this->Auth_model->check();
        if ($perm != 99) redirect(base_url());

        $data['query'] = $this->main_model->hidden_sub();
    }
}
