<?php

use function PHPSTORM_META\type;

class Main_model extends CI_Model
{
    public function fetch_type()
    {
        //Database operation funtion read here 
        //from device_type Table

        $query = $this->db->get('device_type');
        return $query->result();
    }


    public function fetch_type_name($type_id)
    {
        $this->db->select('type_name');
        $this->db->from('device_type');
        $this->db->where('device_type.type_id',$type_id);

        $query = $this->db->get();

        return $query->row();
    }

    public function fetch_subject($type_id)
    {
        //Database operation funtion read here 
        //from device_sub Table

        $this->db->select('sub_name,sub_id,remove_sub');
        $this->db->from('device_sub');
        $this->db->where('device_sub.sub_type',$type_id);
        $this->db->where('device_sub.remove_sub',0);

        $query = $this->db->get();

        return $query->result();
    }

   
    public function insert_name_deviceSub()
    {
        //Database operation funtion write here 
        //https://www.youtube.com/watch?v=00PYwBnBJRA&list=PLEA4F1w-xYVaY4qvlDOhiJAGE2QxdABK6&index=31&t=0s

        $data = array
        (
            'sub_name' => $this->input->post('sub_name'),
            'sub_type' => $this->input->post('sub_type'),
        );

        $query = $this->db->insert('device_sub',$data);

        if($query)
        {
            //True
            //echo 'adding success';
            redirect(base_url('/type/devices/'.$data['sub_type']));

        }else
        {
            //False
            echo 'adding error';    
        }
    }

    public function delete_data_deviceSub($sub_id)
    {
        //Database operation funtion delete data From device_sub Table
        //$this->db->delete('device_sub' , array('sub_id' => $sub_id));
       
        if(!$this->db->delete('device_sub',array('sub_id' => $sub_id)))
        {
            return $this->db->error();
        }
        return FALSE;
    
    }

    public function edit_data_deviceSub()
    {
        //Database operation funtion update data From device_sub Table
        //https://stackoverflow.com/questions/34693863/pass-php-variable-to-bootstrap-modal/34695333

		$data = array
		(
            'sub_name' => $this->input->post('sub_name'),
            'sub_type' => $this->input->post('sub_type'),
		);

		$this->db->where('sub_id',$this->input->post('sub_id'));
		$query = $this->db->update('device_sub',$data);

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/

		if($query)
		{
            //echo 'update success';
            redirect(base_url('/type/devices/').$data['sub_type']);
            
		}else
		{
			echo 'update error';
		}


    }

   public function hidden_sub()
   {
       $data = array 
       (
            'sub_name' => $this->input->post('sub_name'),
            'sub_type' => $this->input->post('sub_type'),
            'remove_sub' => $this->input->post('remove_sub'),
       );

       $this->db->where('sub_id',$this->input->post('sub_id'));
       $query = $this->db->update('device_sub',$data);

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;*/

        if($query)
		{
            //echo 'update success';
            redirect(base_url('/type/devices/').$data['sub_type']);
            
		}else
		{
			echo 'update error';
		}

   }

   
}