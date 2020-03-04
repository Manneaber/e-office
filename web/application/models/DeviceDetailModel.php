<?php

class DeviceDetailModel extends CI_Model
{
    public function get_device_detail($list_id) {
        $this->db->select('*');
        $this->db->from('device_list');
        $this->db->join('device_sub', 'list_subid = sub_id');
        $this->db->where('list_id', $list_id);
        
        return $this->db->get()->result();
    }

    public function get_device_sub($sub_id) {
        $this->db->select('*');
        $this->db->from('device_sub');
        $this->db->join('device_list', 'list_subid = sub_id');
        $this->db->where('sub_id', $sub_id);
        $this->db->where('list_removed', 0);
        
        return $this->db->get()->result();
    }

    public function get_device_sub_name($sub_id) {
        $this->db->select('sub_name');
        $this->db->from('device_sub');
        $this->db->where('sub_id', $sub_id);
        
        return $this->db->get()->result()[0]->sub_name;
    }

    public function get_device_type($sub_id) {
        $this->db->select('type_id, type_name');
        $this->db->from('device_type');
        $this->db->join('device_sub', 'sub_type = type_id');
        $this->db->where('sub_id', $sub_id);
        
        return $this->db->get()->result();
    }

    public function insert_list() {
        $inp = $this->input->post([
			'listid', 'spec', 'location', 'note',
			'status', 'perm1', 'perm2', 'perm3', 'subid'
        ], TRUE);

        $perm = 0;
        if ($inp['perm1'] == 1) {
            $perm += 1;
        }
        if ($inp['perm2'] == 2) {
            $perm += 2;
        }
        if ($inp['perm3'] == 4) {
            $perm += 4;
        }

        $list_id = str_replace("/", "_", $inp['listid']);
        $list_id = str_replace("คพ.", "", $list_id);
        
        $this->db->insert('device_list', [
            'list_id' => $list_id,
            'list_spec' => $inp['spec'],
            'list_note' => $inp['note'],
            'list_location' => $inp['location'],
            'list_status' => $inp['status'],
            'list_permission' => $perm,
            'list_subid' => $inp['subid'],
        ]);
    }

    public function hide_list($list_id) {
        $this->db->where('list_id', $list_id);
        $this->db->update('device_list', [
            'list_removed' => 1
        ]);
    }

    public function edit_list() {
        $inp = $this->input->post([
			'listid', 'spec', 'location', 'note',
			'status', 'perm1', 'perm2', 'perm3', 'subid'
        ], TRUE);

        $perm = 0;
        if ($inp['perm1'] == 1) {
            $perm += 1;
        }
        if ($inp['perm2'] == 2) {
            $perm += 2;
        }
        if ($inp['perm3'] == 4) {
            $perm += 4;
        }
        
        $this->db->where('list_id', $inp['listid']);
        $this->db->update('device_list', [
            'list_spec' => $inp['spec'],
            'list_note' => $inp['note'],
            'list_location' => $inp['location'],
            'list_status' => $inp['status'],
            'list_permission' => $perm,
            'list_subid' => $inp['subid'],
        ]);
    }
}
