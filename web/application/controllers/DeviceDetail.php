<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DeviceDetail extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DeviceDetailModel');
		$this->load->model('Auth_model');
	}

	public function index($list_id)
	{
		$perm = $this->Auth_model->check();
		if ($perm != 1 || $perm != 2 || $perm != 3 || $perm != 99) redirect(base_url());

		$query['list_id'] = $list_id;
		$query['details'] = $this->DeviceDetailModel->get_device_detail($list_id)[0];
		$query['type'] = $this->DeviceDetailModel->get_device_type($query['details']->list_subid)[0];

		$this->load->view('header', ['title' => 'Details']);
		$this->load->view('template', [
			'body' => $this->load->view('details', $query, TRUE),
			'path' => makePath([
				'คลัง' => base_url('showtype'),
				$query['type']->type_name => base_url('device/' . $query['type']->type_id),
				$this->DeviceDetailModel->get_device_sub_name($query['details']->list_subid) => base_url('devicesub/' . $query['details']->list_subid),
				"คพ." . str_replace("_", "/", $list_id) => '#',
			]),
			'back' => base_url('devicesub/' . $query['details']->list_subid),
		]);
		$this->load->view('bottom');
	}
}
