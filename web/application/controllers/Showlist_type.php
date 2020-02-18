<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Showlist_type extends CI_Controller
{
    public function index()
    {
        $res = $this->db->get('device_type')->result_array();

        $this->load->view('css');
        $this->load->view('showlist_type', array("query" => $res));
        $this->load->view('js');
    }

    public function add($id = "index")
    {
        if ($id == "post") {
            $data = $this->input->post(array('rentable', 'typename'), TRUE);

            if (
                $data['rentable'] == null || $data['typename'] == null
            ) {
                header('Content-Type: application/json');
                http_response_code(400);
                die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
            }

            $rows = $this->db->get('device_type')->result_array();

            $this->db->insert('device_type', array(
                'type_id' => sizeof($rows),
                'type_name' => $data['typename'],
                'type_rentable' => $data['rentable']
            ));

            if ($this->db->error()['code'] != 0) {
                header('Content-Type: application/json');
                http_response_code(500);
                die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
                redirect('/');
            }

            http_response_code(200);
            echo json_encode(array('code' => 200, 'data' => 'done'));
            redirect('/');
        } else {
            $this->load->view('css');
            $this->load->view('insert_type');
            $this->load->view('js');
        }
    }

    public function edit($id = "index")
    {

        if ($id == "post") {
            $data = $this->input->post(array('rentable', 'typename'), TRUE);

            if (
                $data['rentable'] == null || $data['typename'] == null
            ) {
                header('Content-Type: application/json');
                http_response_code(400);
                die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
            }

            $rows = $this->db->get('device_type')->result_array();

            $this->db->insert('device_type', array(
                'type_id' => sizeof($rows),
                'type_name' => $data['typename'],
                'type_rentable' => $data['rentable']
            ));

            if ($this->db->error()['code'] != 0) {
                header('Content-Type: application/json');
                http_response_code(500);
                die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
                redirect('/');
            }

            http_response_code(200);
            echo json_encode(array('code' => 200, 'data' => 'done'));
            redirect('/');
        } else {
            $this->db->select('*');
            $this->db->from('device_type');
            $this->db->where('type_id', $id);
        
            $query = $this->db->get()->row_array();
			
			//print_r($query);
			
			$data = new stdClass();
			
			$data->query = $query;

            $this->load->view('css');
            $this->load->view('edit_type', $data);
            $this->load->view('js');
        }
    }
}
