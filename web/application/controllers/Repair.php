<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repair extends CI_Controller {
	public function index()
	{
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
