<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Showlist_type extends CI_Controller
{
    public function index()
    {
        $this->load->view('css');
        $this->load->view('showlist_type');
        $this->load->view('js');
    }

   
}
