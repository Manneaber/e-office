<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Repair extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Repair_model");
		$this->load->model('Auth_model');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index()
	{
		$perm = $this->Auth_model->check();
		if ($perm != 1 && $perm != 2 && $perm != 3 && $perm != 99) redirect(base_url());

		$data['device_type'] = $this->Repair_model->list_type();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('header', ['title' => 'Repair']);
		$this->load->view('template', [
			'body' => $this->load->view('repair', $data, TRUE),
			'path' => makePath([
				'แจ้งซ่อม' => '#',
			])
		]);
		$this->load->view('bottom');
	}

	function fetch_device_sub()
	{
		if ($this->input->post('sub_type')) {
			echo $this->Repair_model->fetch_device_sub($this->input->post('sub_type'));
		}
	}

	function fetch_device_list()
	{
		if ($this->input->post('list_id')) {
			echo $this->Repair_model->fetch_device_list($this->input->post('list_id'));
		}
	}

	function device_list_location()
	{
		if ($this->input->post('list_id')) {
			echo $this->Repair_model->device_list_location($this->input->post('list_id'));
		}
	}

	function add_repair()
	{

		$tmp_data = array(
			'req_deviceid' => $this->input->post('device_list'),
			'req_location' => $this->input->post('location'),
			'req_symptom' => $this->input->post('inputBreakdown'),
			'req_priority' => $this->input->post('priority')
		);

		$this->Repair_model->add_repair($tmp_data);

		redirect(base_url('repair'));
	}
}
