<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
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
        
        $data['query'] = $this->main_model->fetch_type();

       /* echo '<pre>';
        print_r($data);
        echo '</pre>';
		exit;*/
    
        $this->load->view('header', ['title' => 'Home']);
        $this->load->view('template', [
            'body' => $this->load->view('test_type',$data,  TRUE),
            'path' => makePath([
                'คลัง' => '#',
                'ประเภท' => '#',
                'อุปกรณ์' => '#',

            ]),
            'back' => "",
        ]);

        $this->load->view('bottom');
    }

    public function devices($type_id)
    {
        $data['type_id']=$type_id;
        $data['type_name'] = $this->main_model->fetch_type_name($type_id);
        $data['query'] = $this->main_model->fetch_subject($type_id);

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
		exit;*/

        $this->load->view('header', ['title' => 'Home']);
        $this->load->view('template', [
            'body' => $this->load->view('device', $data,  TRUE),
            'path' => makePath([
                'คลัง' => '#',
                'ประเภท' => 'http://127.0.0.1/e-office/web/type',
                'อุปกรณ์' => '#',

            ]),
            'back' => "",
        ]);

        $this->load->view('bottom');
    }
    
}
