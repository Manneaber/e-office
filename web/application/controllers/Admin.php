<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function index()
	{
		$this->load->helper('url');

		$this->load->view('test_view');
	}

	public function maintain($id = 'index')
	{
		$this->load->helper('url');
		$this->load->database();

		if ($id == 'close') {
			error_reporting(0);
			header('Content-Type: application/json');

			$arr = $this->input->post(array('ticID'), TRUE);

			if ($arr['ticID'] == null) {
				http_response_code(400);
				die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
			}

			$ticketID = $arr['ticID'];

			$this->db->set('req_closed', 1);
			$this->db->where('req_id', $ticketID);
			$this->db->update('maintenance_request');

			if ($this->db->error()['code'] != 0) {
				http_response_code(500);
				die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
			}

			http_response_code(200);
			echo json_encode(array('code' => 200, 'data' => 'done'));
		} else if ($id == 'priority') {
			error_reporting(0);
			header('Content-Type: application/json');

			$arr = $this->input->post(array('arr'), TRUE);

			if ($arr['arr'] == null) {
				http_response_code(400);
				die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
			}

			$itemIds = json_decode($arr['arr']);

			$this->db->trans_start();

			foreach ($itemIds as $priority => $itemId) {
				$this->db->set('req_priority', $priority + 1);
				$this->db->where('req_id', $itemId);
				$this->db->update('maintenance_request');
			}
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				http_response_code(500);
				die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
			}

			$this->db->trans_commit();

			http_response_code(200);
			echo json_encode(array('code' => 200, 'data' => 'done'));
		} else {
			$this->db->select('req_id, req_deviceid, req_symptom, req_closed, req_priority, devicesub_name, req_location');
			$this->db->from('maintenance_request');
			$this->db->join('device_list', 'device_list.device_id = maintenance_request.req_deviceid');
			$this->db->join('device_subject', 'device_list.device_subjectid = device_subject.devicesub_id');
			$this->db->order_by('req_priority', 'asc');

			$query = $this->db->get()->result_array();

			function openingCase($case)
			{
				return $case['req_closed'] == 0;
			}

			function closedCase($case)
			{
				return $case['req_closed'] == 1;
			}

			$opening = array_values(array_filter($query, "openingCase"));
			$closed = array_values(array_filter($query, "closedCase"));

			$this->load->view('maintain_view', array('opening' => $opening, 'closed' => array_reverse($closed, false)));
		}
	}
}
