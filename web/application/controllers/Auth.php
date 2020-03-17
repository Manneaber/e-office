<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
  }

  public function login()
  {
    $this->load->view('login', ['err' => $this->session->flashdata('err')]);
  }

  public function submitLogin()
  {
    $res = $this->Auth_model->login();
    if ($res == 0) {
      redirect(base_url());
    } else {
      redirect(base_url('auth/login'));
    }
  }

  public function logout()
  {
    $this->Auth_model->logout();
    redirect(base_url('auth/login'));
  }
}
