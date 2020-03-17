<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->library('session');
		$this->load->model('Auth_model');
	}
	
	public function index()
	{
		if ($this->Auth_model->check() == -1) redirect(base_url('auth/login'));

		$this->load->view('header', ['title' => 'Home']);
		$this->load->view('template', [
			'body' => $this->load->view('test', [], TRUE),
			'path' => makePath([
				'หน้าหลัก' => '#',
			]),
			'session' => $this->session->userdata(),
		]);
		$this->load->view('bottom');
	}
}
