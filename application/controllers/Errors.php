<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function error404(){
        $data['title'] = "Error 404 - Page not find";
        $this->load->view('mdb/includes/header', $data);
        $this->load->view("errors/error_404", $data);
        $this->load->view('mdb/includes/footer', $data);
    }
}