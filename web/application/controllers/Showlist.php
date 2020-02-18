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
        $id = $this->input->get('typeid');

        if ($id == null) {
            die();
        }

        $this->db->select('*');
        $this->db->from('device_subject');
        $this->db->where('devicesub_type', $id);
        $data['query'] = $this->db->get()->result_array();
        $data['tid'] = $id;

        $this->load->view('css');
        $this->load->view('showsub_view', $data);
        $this->load->view('js');
    }

    public function editsub($id = "index")
    {
        if ($id == "post") {
            $data = $this->input->post(array('devicesub_type', 'devicesub_name', 'devicesub_rentable'), TRUE);

            if (
                $data['devicesub_type'] == null || $data['devicesub_name'] == null
                || $data['devicesub_rentable'] == null
            ) {
                header('Content-Type: application/json');
                http_response_code(400);
                die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
            }

            $this->db->set('devicesub_name', $data['devicesub_name']);
            $this->db->set('devicesub_rentable', $data['devicesub_rentable']);
            $this->db->where('devicesub_type', $data['devicesub_type']);
            $this->db->update('device_subject');

            if ($this->db->error()['code'] != 0) {
                header('Content-Type: application/json');
                http_response_code(500);
                die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
                redirect('Showlist/list/' . $data['subid']);
            }

            http_response_code(200);
            echo json_encode(array('code' => 200, 'data' => 'done'));
            redirect('/');
        } else {
            $id = $this->input->get('id');

            if ($id == null) {
                die();
            }

            $this->db->select('*');
            $this->db->from('device_subject');
            $this->db->where('devicesub_id', $id);

            $q = $this->db->get()->result_array();

            $this->load->view('css');
            $this->load->view('edit_view', array('query' => $q[0]));
            $this->load->view('js');
        }
    }

    public function deletesub($id)
    {
        $this->db->delete('device_subject', array('devicesub_id' => $id));
        $url = $_SERVER['HTTP_REFERER'];

        redirect($url);
    }

    public function addsub($id = "index")
    {
        if ($id == "post") {

            $data = $this->input->post(array('devicesub_name', 'devicesub_type', 'devicesub_rentable'), TRUE);

            if (
                $data['devicesub_name'] == null || $data['devicesub_type'] == null
                || $data['devicesub_rentable'] == null
            ) {
                header('Content-Type: application/json');
                http_response_code(400);
                die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
            }

            $this->db->insert('device_subject', array(
                "devicesub_name" => $data['devicesub_name'],
                "devicesub_type" => $data['devicesub_type'],
                "devicesub_rentable" => $data['devicesub_rentable'],
                "create_timestamp" => "CURRENT_TIMESTAMP"
            ));

            if ($this->db->error()['code'] != 0) {
                header('Content-Type: application/json');
                http_response_code(500);
                die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
                redirect('Showlist?typeid=' . $data['devicesub_type']);
            }

            http_response_code(200);
            echo json_encode(array('code' => 200, 'data' => 'done'));
            redirect('Showlist?typeid=' . $data['devicesub_type']);
        } else {
            $id = $this->input->get('id');

            if ($id == null) {
                die();
            }

            $this->load->view('css');
            $this->load->view('insert_view', array("typeid" => $id));
            $this->load->view('js');
        }
    }

    public function list($id)
    {
        $this->db->select('devicesub_id, devicesub_name');
        $this->db->from('device_subject');
        $this->db->where('devicesub_id', $id);

        $res = $this->db->get()->result_array()[0];
        $devicesub_id = $res['devicesub_id'];
        $device_name = $res['devicesub_name'];

        $this->db->select('*');
        $this->db->from('device_list');
        $this->db->where('device_subjectid', $id);
        $device_list = $this->db->get()->result_array();

        $this->load->view('css');
        $this->load->view('showlist_view', array(
            'devicesub_id' => $devicesub_id,
            'device_name' => $device_name,
            'device_list' => $device_list
        ));
        $this->load->view('js');
    }

    public function remove($id)
    {
        $this->load->library('user_agent');

        $this->db->delete('device_list', array('device_id' => $id));

        $url = $_SERVER['HTTP_REFERER'];

        redirect($url);
    }

    public function editdevice($id)
    {
        if ($id == "post") {
            $data = $this->input->post(array('device_status', 'device_lock', 'deviceid', 'subid'), TRUE);

            if (
                $data['device_status'] == null || $data['device_lock'] == null
                || $data['deviceid'] == null || $data['subid'] == null
            ) {
                header('Content-Type: application/json');
                http_response_code(400);
                die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
            }

            $this->db->set('device_status', $data['device_status']);
            $this->db->set('device_lock', $data['device_lock']);
            $this->db->where('device_id', $data['deviceid']);
            $this->db->update('device_list');

            if ($this->db->error()['code'] != 0) {
                header('Content-Type: application/json');
                http_response_code(500);
                die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
                redirect('Showlist/list/' . $data['subid']);
            }

            http_response_code(200);
            echo json_encode(array('code' => 200, 'data' => 'done'));
            redirect('Showlist/list/' . $data['subid']);
        } else {
            $this->db->select('*');
            $this->db->from('device_list');
            $this->db->where('device_id', $id);

            $q = $this->db->get()->result_array();

            $this->load->view('css');
            $this->load->view('edit_list', $q[0]);
            $this->load->view('js');
        }
    }

    public function adddevice($id = "index")
    {
        if ($id == "post") {
            error_reporting(0);
            $data = $this->input->post(array('subid', 'deviceid'), TRUE);

            if ($data['subid'] == null || $data['deviceid'] == null) {
                header('Content-Type: application/json');
                http_response_code(400);
                die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
            }

            $this->db->insert('device_list', array(
                'device_id' => $data['deviceid'],
                'device_subjectid' => $data['subid'],
                'device_status' => 0,
                'device_lock' => 0,
                'add_timestamp' => 'CURRENT_TIMESTAMP'
            ));

            if ($this->db->error()['code'] != 0) {
                header('Content-Type: application/json');
                http_response_code(500);
                die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
                redirect('Showlist/list/' . $data['subid']);
            }

            http_response_code(200);
            echo json_encode(array('code' => 200, 'data' => 'done'));
            redirect('Showlist/list/' . $data['subid']);
        } else {
            $data = $this->input->post(array('subid'), TRUE);

            $this->load->view('css');
            $this->load->view('insert_list', $data);
            $this->load->view('js');
        }
    }
}
