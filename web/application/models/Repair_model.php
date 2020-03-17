<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repair_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set("Asia/Bangkok");
    }

    public function list_type(){
        $this->db->where('remove_type',0);
        $this->db->order_by("type_id", "ASC");
        $query = $this->db->get("device_type");
       
        return $query->result();
    }


    function fetch_device_sub($sub_type)
    {
        $this->db->where('remove_sub', 0);
        $this->db->where('sub_type', $sub_type);
        $this->db->order_by('sub_id', 'ASC');
        $query = $this->db->get('device_sub');

        $output = '<option value="">เลือกรายการของครุภัณฑ์</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->sub_id.'">'.$row->sub_name.'</option>';
        }
            return $output;
    }

    public function fetch_device_list($list_subid) {

        $this->db->where('list_removed', 0);
        $this->db->where('list_subid', $list_subid);
        $this->db->order_by('list_id', 'ASC');
        $query = $this->db->get('device_list');
        

        $output = '<option value="">เลือกรหัสของครุภัณฑ์</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->list_id.'">'.'คพ.'.$row->list_id.'</option>';
        }
        return $output;
    }

    public function device_list_location($list_subid) {
        $this->db->select('*');
		$this->db->from('device_list');
		$this->db->where([
			'list_removed' => 0,
			'list_subid' => $list_subid,
		]);
		$this->db->order_by('list_id', 'asc');
		$query = $this->db->get();
    }

    public function add_repair($data)
    {
        $query = $this->db->insert('maintenance_request',$data);

        if($query)
        {
            echo 'insert data success';
        }else{
            echo 'insert data error';
        }
    }
}


