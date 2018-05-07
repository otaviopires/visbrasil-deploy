<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function verificarSession(){
		if($this->session->userdata('logado') == false){
			redirect('Dashboard/login');
		}
	}

	public function index(){
		$this->verificarSession();
		$this->load->view('include/header');
		$this->load->view('admin/dashboard');
	}

	public function login(){
		
		$this->load->view('login');
	}

	public function logar(){

		$user = $this->input->post('user');
		$senha = md5($this->input->post('senha'));

		$this->db->where('user',$user);
		$this->db->where('senha',$senha);
		$this->db->where('status',1);

		$data['usuario'] = $this->db->get('usuario')->result();

		if(count($data['usuario']) == 1){
			$dados['nome'] = $data['usuario'][0]->nome;
			$dados['id'] = $data['usuario'][0]->id;
			$dados['logado'] = true;
			$this->session->set_userdata($dados);
            redirect('Dashboard');
		} else{
			redirect('dashboard/login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Dashboard');
	}


}
