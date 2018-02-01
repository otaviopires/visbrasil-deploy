<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resultado extends CI_Controller {

	public function index(){
        $this->load->view('include/header_public');
		$this->load->view('public/resultado');
	}


}
