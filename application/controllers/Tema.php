<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe controladora responsável pela gerência do usuário
*/


class Tema extends CI_Controller {

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

		$this->load->model('Tema_model','tema');

		$data['temas'] = $this->tema->getTemas();

		//Carregamento das views
		$this->load->view('include/header');
		$this->load->view('admin/temas',$data);	
	}

	public function ver($id = null){
		$this->verificarSession();
		if($id == null){
			redirect('Tema');
		}

		$this->load->model('Tema_model','tema');

		$query = $this->tema->getTemaById($id);

		if($query == null){
			redirect('Tema');
		}

		$dados['tema'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/ver-tema',$dados);
	}

	public function cadastro(){
		$this->verificarSession();

		$this->load->model('Tema_model','tema');

		$this->load->view('include/header');
		$this->load->view('admin/cadastro-temas');
	}

	public function cadastrar(){
		$this->verificarSession();

		$this->load->model('Tema_model','tema');

		$dados['DS_TEMA'] = $this->input->post('DS_TEMA');
		
		$this->tema->cadastroTema($dados);

		redirect('Tema');
	}

	public function atualizar($id = null){
		$this->verificarSession();
		if($id == null){
			redirect('Tema');
		}

		$this->load->model('Tema_model','tema');

		$query = $this->tema->getTemaById($id);

		if($query == null){
			redirect('Tema');
		}

		$dados['tema'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/editar-tema',$dados);

	}

	public function salvar_atualizacao(){
		$this->verificarSession();

		$this->load->model('Tema_model','tema');

		$dados['DS_TEMA'] = $this->input->post('DS_TEMA');

		if($this->input->post('CO_SEQ_TEMA') != null){
			$this->tema->editarTema($dados, $this->input->post('CO_SEQ_TEMA'));

		} else {
			$this->tema->cadastroTema($dados);
		}

		redirect('Tema');
	}

	public function apagar($id = null){
		$this->verificarSession();
		$this->load->model('Tema_model','tema');
		if($this->tema->delete($id)){
			redirect('Tema');
		}

	}
}