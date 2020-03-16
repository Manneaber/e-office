<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DeviceSub extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DeviceDetailModel');
		$this->load->model('Auth_model');
	}

	public function index($sub_id)
	{
		$perm = $this->Auth_model->check();
		if ($perm != 1 || $perm != 2 || $perm != 3 || $perm != 99) redirect(base_url());

		$query['sub_id'] = $sub_id;
		$query['type'] = $this->DeviceDetailModel->get_device_type($sub_id)[0];
		$query['details'] = $this->DeviceDetailModel->get_device_sub($sub_id);

		for ($i = 0; $i < sizeof($query['details']); $i++) {
			// Status String
			$list_status_str = "";
			$list_status = $query['details'][$i]->list_status;
			switch ($query['details'][$i]->list_status) {
				case 0:
					$list_status_str = "ว่าง";
					break;
				case 1:
					$list_status_str = "ไม่ว่าง";
					break;
				case 2:
					$list_status_str = "จอง";
					break;
				case 3:
					$list_status_str = "ซ่อมบำรุง";
					break;
				case 4:
					$list_status_str = "ไม่สามารถยืมได้";
					break;
			}

			$query['details'][$i]->list_status_str = $list_status_str;

			// Permission String
			$list_permission_str = "";
			if ($query['details'][$i]->list_permission == 0) {
				$list_permission_str .= "ไม่สามารถยืมได้";
			} else {
				$perm = $query['details'][$i]->list_permission;
				if ($perm >= 4) {
					$perm -= 4;
					$list_permission_str .= "เจ้าหน้าที่ ";
				}
				if ($perm >= 2) {
					$perm -= 2;
					$list_permission_str .= "อาจารย์ ";
				}
				if ($perm >= 1) {
					$perm -= 1;
					$list_permission_str .= "นักศึกษา ";
				}
			}

			$query['details'][$i]->list_permission_str = $list_permission_str;
		}

		$this->load->view('header', ['title' => 'Sub type']);
		$this->load->view('template', [
			'body' => $this->load->view('subs', $query, TRUE),
			'path' => makePath([
				'คลัง' => base_url('showtype'),
				$query['type']->type_name => base_url('device/' . $query['type']->type_id),
				$this->DeviceDetailModel->get_device_sub_name($sub_id) => '#',
			]),
			'back' => base_url('device/' . $query['type']->type_id),
		]);
		$this->load->view('bottom');
	}

	public function add()
	{
		$perm = $this->Auth_model->check();
		if ($perm != 99) redirect(base_url());

		$this->DeviceDetailModel->insert_list();
		redirect(base_url('devicesub/' . $_POST['subid']));
	}

	public function hide($sub_id, $list_id)
	{
		$perm = $this->Auth_model->check();
		if ($perm != 99) redirect(base_url());

		$this->DeviceDetailModel->hide_list($list_id);
		redirect(base_url('devicesub/' . $sub_id));
	}

	public function edit()
	{
		$perm = $this->Auth_model->check();
		if ($perm != 99) redirect(base_url());

		$this->DeviceDetailModel->edit_list();
		redirect(base_url('devicesub/' . $_POST['subid']));
	}
}
