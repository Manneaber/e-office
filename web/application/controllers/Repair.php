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
		if ($perm != 1 || $perm != 2 || $perm != 3 || $perm != 99) redirect(base_url());

		$this->load->view('header', ['title' => 'Repair']);
		$this->load->view('template', [
			'body' => $this->load->view('repair', '', TRUE),
			'path' => makePath([
				'แจ้งซ่อม' => '#',
			])
		]);
		$this->load->view('bottom');
	}
}
