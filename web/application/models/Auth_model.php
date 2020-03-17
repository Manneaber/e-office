<?php

class Auth_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function login()
  {
    $data = array(
      'user' => $this->input->post('username'),
      'pass' => $this->input->post('password'),
    );

    if (strlen($data['user']) > 30 || strlen($data['pass']) > 50) {
      $this->session->set_flashdata('err', 'Username or password too long');
      return 99;
    }

    $enc_pass = hash('sha3-256', $data['pass']);

    $this->db->select('uid, name');
    $this->db->from('user');
    $this->db->where([
      'username' => $data['user'],
      'password' => $enc_pass
    ]);

    $result = $this->db->get()->result();

    if (sizeof($result) == 0) {
      $this->session->set_flashdata('err', 'User or pass missmatch');
      return 1;
    }

    $token = hash('sha3-256', uniqid('utok', true));

    $query = $this->db->update('user', [
      'token' => $token
    ]);

    if ($query == 0) {
      $this->session->set_flashdata('err', 'Unable to update db');
      return 2;
    }

    $this->session->set_userdata([
      'uid' => $result[0]->uid,
      'name' => $result[0]->name,
      'token' => $token
    ]);
    return 0;
  }

  /**
   * -1 = not login
   * 0 = no role
   * 1 = student
   * 2 = teacher
   * 3 = staff
   * 99 = admin
   */
  public function check()
  {
    $data = $this->session->userdata();

    if (
      !isset($data['uid']) || !isset($data['token']) ||
      strlen($data['uid']) == 0 || strlen($data['token']) == 0
    ) {
      $this->session->set_flashdata('err', 'Invalid Token');
      return -1;
    }

    $this->db->select('permission');
    $this->db->from('user');
    $this->db->where([
      'uid' => $data['uid'],
      'token' => $data['token']
    ]);

    $result = $this->db->get()->result();

    if (sizeof($result) == 0) {
      $this->session->set_flashdata('err', 'Invalid Token');
      return -1;
    } else {
      return $result[0]->permission;
    }
  }

  public function logout()
  {
    $data = $this->session->userdata();

    if (
      !isset($data['uid']) || !isset($data['token']) ||
      strlen($data['uid']) == 0 || strlen($data['token']) == 0
    ) {
      $this->session->set_flashdata('err', 'Username or password too long');
      return 99;
    }

    $this->db->select('uid');
    $this->db->from('user');
    $this->db->where([
      'uid' => $data['uid'],
      'token' => $data['token']
    ]);

    $result = $this->db->get()->result();

    if (sizeof($result) == 0) {
      $this->session->set_flashdata('err', 'Invalid Token');
      return 1;
    }

    $query = $this->db->update('user', [
      'token' => null
    ]);

    if ($query == 0) {
      $this->session->set_flashdata('err', 'Unable to update database');
      return 2;
    }

    $this->session->unset_userdata(['uid', 'token']);
    return 0;
  }
}
