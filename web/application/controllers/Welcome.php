<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('header', ['title' => 'Home']);
		$this->load->view('template', [
			'body' => $this->load->view('test', '', TRUE),
			'path' => makePath([
				'หน้าหลัก' => '#',
			])
		]);
		$this->load->view('bottom');
	}
}
