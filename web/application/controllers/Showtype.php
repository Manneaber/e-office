<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Showtype extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Showtype_model");
		$this->load->model('Auth_model');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index()
	{
		$perm = $this->Auth_model->check();
		echo $perm;
		echo $perm != 99 ? "true" : "false";
		if ($perm != 1 && $perm != 2 && $perm != 3 && $perm != 99) // redirect(base_url());

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
		]);
		$this->load->view('bottom');
	}

	public function add_type()
	{
		$perm = $this->Auth_model->check();
		if ($perm != 99) redirect(base_url());

		$data = new stdClass();
		$type_id = $this->input->post('type_id');
		$type_name = $this->input->post('type_name');

		if ($type_id == null || $type_name == null) {
			redirect(base_url('showtype'));
			echo 'ผิดพลาด';
		}

		$data = $this->Showtype_model->insert_type($type_id, $type_name);


		if ($data == 0) {
			echo '<script language="javascript" type="text/javascript"> 
					alert("สำเร็จ");
					window.location = "";
				</script>';
			exit;
		} else if ($data == 1) {
			echo '<script language="javascript" type="text/javascript"> 
					alert("ไม่สำเร็จ");
					window.location = "";
        		</script>';
			exit;
		}
	}


	public function update()
	{
		$perm = $this->Auth_model->check();
		if ($perm != 99) redirect(base_url());

		$data = new stdClass();
		$type_id = $this->input->post('type_id');
		$type_name = $this->input->post('type_name');
		$this->Showtype_model->update_type($type_id);

		redirect(base_url('showtype'));

		//echo 'updated';

	}

	public function delete($type_id)
	{
		$perm = $this->Auth_model->check();
		if ($perm != 99) redirect(base_url());

		$data = new stdClass();
		$data = $this->Showtype_model->delete_type($type_id);
		if ($data == 0) {
			echo '<script language="javascript" type="text/javascript"> 
					alert("สำเร็จ");
					window.location.assign("http://localhost/e-office/web/showtype");
				</script>';
			exit;
		} else if ($data == 1) {
			echo '<script language="javascript" type="text/javascript"> 
					alert("ไม่สำเร็จ");
					window.location.assign("http://localhost/e-office/web/showtype");
        		</script>';
			exit;
		}
	}

	public function hidden_data_type($type_id)
	{
		$perm = $this->Auth_model->check();
		if ($perm != 99) redirect(base_url());

		$data['query'] = $this->Showtype_model->hidden_type($type_id);
	}
}
