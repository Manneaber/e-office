<?php
class Typedevice_model extends CI_Model 
{

    public function showdataDevicetype()
    {
            $query = $this->db->get('device_type');
            return $query->result();
    }

	//update data Device subject table
    public function editdataDevicesub()
    {
        //call device_subject from edit_view.php for insert to table device_type -> database 
		$data = array
		(
			'devicesub_name' => $this->input->post('devicesub_name'),
			'devicesub_type' => $this->input->post('devicesub_type'),
			'devicesub_rentable' => $this->input->post('devicesub_rentable'),
			
			
		);

		$this->db->where('devicesub_id',$this->input->post('devicesub_id'));
		$query = $this->db->update('device_subject',$data);

		if($query)
		{
			echo 'update success';
		}else
		{
			echo 'update error';
		}

	}
	
	//insert data to device_subject table database
	public function adddataDevicesubject()
    {
        //call device_subject from edit_view.php for insert to table device_type -> database 
		$data = array
		(
			'devicesub_name' => $this->input->post('devicesub_name'),
			'devicesub_type' => $this->input->post('devicesub_type'),
			'devicesub_rentable' => $this->input->post('devicesub_rentable'),
			
			
		);

		$query = $this->db->insert('device_subject',$data);

		if($query)
		{
			echo 'adding success';
		}else
		{
			echo 'adding error';
		}

	}

	public function showdataDevicesubject()
    {
            $querySubject = $this->db->get('device_subject');
            return $querySubject->result();
	}
	
	//select data from device_subject
	public function readDataDevicesubjectAfterInsertSuccess($devicesub_id)
	{
		$this->db->select('*');
		$this->db->from('device_subject');
		$this->db->where('devicesub_id',$devicesub_id);
		$query=$this->db->get();
		if($query->num_rows() > 0 )
		{
			$data = $query->row();
			return $data;
		}
		return FALSE;
		
	}

	


}