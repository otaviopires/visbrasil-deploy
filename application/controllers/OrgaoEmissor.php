<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe controladora responsável pela gerência do orgão emissor
*/

class OrgaoEmissor extends CI_Controller{
	public function __construct()	{
		parent::__construct();
	}

	public function verificarSession(){
		if($this->session->userdata('logado') == false){
			redirect('Dashboard/login');
		}
	}

	public function index(){
		$this->verificarSession();

		$this->load->model('OrgaoEmissor_model','orgaoEmissor');

		$dados['orgaoEmissores'] = $this->orgaoEmissor->getOrgaoEmissor();

		$this->load->view('include/header');
		$this->load->view('admin/orgao-emissor', $dados);
	}

	public function ver($id = null){
		$this->verificarSession();

		$this->load->model('OrgaoEmissor_model','orgaoEmissor');

		if($id == null){
			redirect('OrgaoEmissor');
		}

		$query = $this->orgaoEmissor->getOrgaoEmissorById($id);

		if($query == null){
			redirect('OrgaoEmissor');
		}

		$dados['orgao'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/ver-orgao-emissor', $dados);
	}

	public function cadastro(){
		$this->verificarSession();

		$this->load->view('include/header');
		$this->load->view('admin/cadastro-orgao-emissor');
	}

	public function cadastrar(){
		$this->verificarSession();

		$this->load->model('OrgaoEmissor_model','orgaoEmissor');

		$dados['NO_ORGAO_EMISSOR'] = $this->input->post('NO_ORGAO_EMISSOR');

		$this->orgaoEmissor->cadastroOrgaoEmissor($dados);

		redirect('OrgaoEmissor');	
	}

	public function atualizar($id = null){
		$this->verificarSession();

		if($id == null){
			redirect('OrgaoEmissor');
		}

		$this->load->model('OrgaoEmissor_model','orgaoEmissor');

		$query = $this->orgaoEmissor->getOrgaoEmissorById($id);

		if($query == null){
			redirect('OrgaoEmissor');
		}

		$dados['orgao'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/editar-orgao-emissor', $dados);
	}

	public function salvar_atualizacao(){
		$this->verificarSession();

		$this->load->model('OrgaoEmissor_model','orgaoEmissor');

		$dados['NO_ORGAO_EMISSOR'] = $this->input->post('NO_ORGAO_EMISSOR');

		if($this->input->post('CO_ORGAO_EMISSOR') != null){
			$this->orgaoEmissor->editarOrgaoEmissor($dados, $this->input->post('CO_ORGAO_EMISSOR'));
		} else {
			$this->orgaoEmissor->cadastroOrgaoEmissor($dados);
		}

		redirect('OrgaoEmissor');
	}

	public function apagar($id = null){
		$this->verificarSession();

		$this->load->model('OrgaoEmissor_model','orgaoEmissor');

		if($this->orgaoEmissor->delete($id)){
			redirect('OrgaoEmissor');
		}
	}
}
