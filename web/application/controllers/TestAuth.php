<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestAuth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function login()
    {
        $res = $this->Auth_model->login();

        if ($res == 0) {
            // Pass
            echo 'Pass';
        } else if ($res == 1) {
            // User or password missmatch
            echo 'User or pass missmatch';
        } else if ($res == 2) {
            // Unable to update db
            echo 'Unable to update db';
        } else if ($res == 99) {
            // Username or password too long
            echo 'Username or password too long';
        }
    }

    public function checkToken()
    {
        $res = $this->Auth_model->check();
        if ($res == 0) {
            // Valid
            echo 'Valid';
        } else if ($res == 1) {
            // Invalid
            echo 'Invalid';
        } else if ($res == 99) {
            // UID or Token is undefined
            echo 'UID or Token is undefined';
        }
    }

    public function logout()
    {
        $res = $this->Auth_model->logout();
        if ($res == 0) {
            // Valid
            echo 'Logged out';
        } else if ($res == 1) {
            // Invalid
            echo 'Nah';
        } else if ($res == 2) {
            // Unable to update db
            echo 'Unable to update db';
        } else if ($res == 99) {
            // UID or Token is undefined
            echo 'UID or Token is undefined';
        }
    }
}
