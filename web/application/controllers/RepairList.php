<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RepairList extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('main_model');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$perm = $this->Auth_model->check();
		if ($perm != 99) redirect(base_url());

		$this->db->select('*');
		$this->db->from('maintenance_request');
		$this->db->where('req_closed', 0);
		$this->db->join('device_list', 'device_list.list_id = maintenance_request.req_deviceid');
		$this->db->join('device_sub', 'device_list.list_subid = device_sub.sub_id');
		$this->db->order_by('req_priority', 'asc');

		$query = $this->db->get()->result_array();

		for ($i = 0; $i < sizeof($query); $i++) {
			switch ($query[$i]['req_userpriority']) {
				case 1:
					$query[$i]['req_userprioritystr'] = "น้อย";
					break;
				case 2:
					$query[$i]['req_userprioritystr'] = "ปานกลาง";
					break;
				case 3:
					$query[$i]['req_userprioritystr'] = "มาก";
					break;
				case 4:
					$query[$i]['req_userprioritystr'] = "มากที่สุด";
					break;
			}
		}

		$this->load->view('header', ['title' => 'Repair List']);
		$this->load->view('template', [
			'body' => $this->load->view('maintain', array('opening' => $query), TRUE),
			'path' => makePath([
				'รายการแจ้งซ่อม' => base_url('repairlist'),

			]),
			'back' => base_url('showtype'),
		]);

		$this->load->view('bottom');
	}

	public function priority()
	{
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
	}

	public function close()
	{
		error_reporting(0);
		header('Content-Type: application/json');

		$arr = $this->input->post(array('devID', 'note'), TRUE);

		if ($arr['devID'] == null) {
			http_response_code(400);
			die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
		}

		$deviceID = $arr['devID'];

		$this->db->set('req_closed', 1);
		$this->db->where('req_deviceid', $deviceID);
		$this->db->where('req_closed', 0);
		$this->db->update('maintenance_request');

		if ($this->db->error()['code'] != 0) {
			http_response_code(500);
			die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
		}

		// 'devID'
		$this->db->select('list_oldstatus');
		$this->db->from('device_list');
		$this->db->where('list_id', $deviceID);
		$query = $this->db->get()->result_array();

		if (sizeof($query) == 0) {
			http_response_code(500);
			die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
		}

		$this->db->set('list_note', $arr['note']);
		$this->db->set('list_status', $query[0]['list_oldstatus']);
		$this->db->set('list_oldstatus', null);
		$this->db->where('list_id', $deviceID);
		$this->db->update('device_list');

		if ($this->db->error()['code'] != 0) {
			http_response_code(500);
			die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
		}

		http_response_code(200);
		echo json_encode(array('code' => 200, 'data' => 'done'));
	}

	public function accept()
	{
		error_reporting(0);
		header('Content-Type: application/json');

		$arr = $this->input->post(array('devID'), TRUE);

		if ($arr['devID'] == null) {
			http_response_code(400);
			die(json_encode(array('code' => 400, 'data' => 'unmeet requirement')));
		}

		$deviceID = $arr['devID'];

		$this->db->select('list_status');
		$this->db->from('device_list');
		$this->db->where('list_id', $deviceID);
		$query = $this->db->get()->result_array();

		if (sizeof($query) == 0) {
			http_response_code(500);
			die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
		}

		if ($query[0]['list_status'] == 3) $query[0]['list_status'] = 0;

		$this->db->set('list_status', 3);
		$this->db->set('list_oldstatus', $query[0]['list_status']);
		$this->db->where('list_id', $deviceID);
		$this->db->update('device_list');

		if ($this->db->error()['code'] != 0) {
			http_response_code(500);
			die(json_encode(array('code' => 500, 'data' => 'an error occurred when updating database')));
		}

		http_response_code(200);
		echo json_encode(array('code' => 200, 'data' => 'done'));
	}

	/*
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
    */
}
