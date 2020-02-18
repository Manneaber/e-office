<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Showlist extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('typedevice_model');
    }

    public function index()
    {
        $data['query'] = $this->typedevice_model->showdataDevicesubject();

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/

        $this->load->view('css');
        $this->load->view('showsub_view', $data);
        $this->load->view('js');
    }

    public function list($id)
    {
        $this->db->select('devicesub_name');
        $this->db->from('device_subject');
        $this->db->where('devicesub_id', $id);

        $device_name = $this->db->get()->result_array()[0]['devicesub_name'];

        $this->db->select('*');
        $this->db->from('device_list');
        $this->db->where('device_subjectid', $id);
        $device_list = $this->db->get()->result_array();

        $this->load->view('css');
        $this->load->view('showlist_view', array(
            'device_name' => $device_name,
            'device_list' => $device_list
        ));
        $this->load->view('js');
    }
}
