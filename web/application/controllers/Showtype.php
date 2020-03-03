<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showtype extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Showtype_model");
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index()
	{
		
		$data = new stdClass();
		$data->query = $this->Showtype_model->list_type();
		

		/*echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit;*/

		$this->load->view('header', ['title' => 'showtype']);
		$this->load->view('template', [
			'body' => $this->load->view('showtype', $data, TRUE),
			'path' => makePath([
				'คลัง' => '#'
			])
			], );
		$this->load->view('bottom');

	}

	public function add_type()
	{
		$type_id = $this->input->post('type_id');
		$type_name = $this->input->post('type_name');

		if($type_id == null || $type_name == null){
			redirect(base_url('showtype'));
			echo 'ผิดพลาด';
		}

        $data = $this->Showtype_model->insert_type($type_id,$type_name);

		if ($data == 0){
		    redirect(base_url('showtype'));
        }else if($data == 1){
			redirect(base_url('showtype'));
		}

	}

	public function update()
	{
		$type_id = $this->input->post('type_id');
		$type_name = $this->input->post('type_name');
		$this->Showtype_model->update_type($type_id);

		redirect(base_url('showtype'));

		//echo 'updated';

	}

	public function delete($type_id)
	{
    	$this->Showtype_model->delete_type($type_id);
		$data = $this->db->delete('device_type', array('type_id' => $type_id));
		redirect(base_url('showtype'));
	}


}
