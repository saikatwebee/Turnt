<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plane extends CI_Controller
{
    public function purchase(){
        $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('purchase');
            $this->load->view('includes/footer');
    }
}
?>