<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showtype_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set("Asia/Bangkok");
    }

    public function insert_type($type_id,$type_name)
    {
        $this->db->select('type_id,type_name');
		$this->db->from('device_type');
		$this->db->where('type_id' , $type_id);
		if($this->db->count_all_results() > 0){
			return 1;
		}

		$this->db->insert('device_type', array(
			'type_id' => $type_id,
			'type_name' => $type_name
        ));
        return 0;
    }

    public function list_type($type_id=false){
        //$this->db->select('type_id,type_name');
        $this->db->from('device_type');
        if($type_id){
            $this->db->where('type_id' , $type_id);
            $this->db->where('remove_type',0);
        }
        
        $query = $this->db->get();
        return $query->result();

    }

    public function update_type($type_id){

        $data = array
        (
            'type_id' => $type_id,
			'type_name' => $this->input->post('type_name'),
        );

        $this->db->where('type_id',$type_id);
        $query = $this->db->update('device_type',$data);

        if($query)
        {
            //True
            echo 'updated data success';
        }else{
            echo 'update data error';
        }



    }
    
    public function delete_type($type_id){
		$this->db->where('type_id', $type_id);
        $data = $this->db->delete('device_type', array('type_id' => $type_id));
        if($data)
        {
            return 0 ;
        }else{
            return 1;
        }
    }
    
    public function hidden_type($type_id) 
    {
        $data = array 
       (
            'type_id ' => $type_id,
            'type_name' => $this->input->post('type_name'),
            'remove_type' => $this->input->post('remove_type'),
       );

       $this->db->where('type_id',$this->input->post('type_id'));
       $query = $this->db->update('device_type',$data);

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/

        if($query)
		{
            //echo 'update success';
            redirect(base_url('device/').$data['sub_type']);
            
		}else
		{
            echo 'update error';
            redirect(base_url('device/').$data['sub_type']);
		}
    }
}