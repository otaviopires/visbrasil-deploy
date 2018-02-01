<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe controladora responsável pela gerência do usuário
*/


class Assunto extends CI_Controller {

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

		$this->load->model('Assunto_model','assunto');

		$data['assuntos'] = $this->assunto->getAssunto();

		//Carregamento das views
		$this->load->view('include/header');
		$this->load->view('admin/assunto',$data);	
	}

	public function ver($id = null){
		$this->verificarSession();
		if($id == null){
			redirect('Assunto');
		}

		$this->load->model('Assunto_model','assunto');

		$query = $this->assunto->getAssuntoById($id);

		if($query == null){
			redirect('Assunto');
		}

		$dados['assunto'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/ver-assunto',$dados);
	}

	public function cadastro(){
		$this->verificarSession();

		$this->load->view('include/header');
		$this->load->view('admin/cadastro-assunto');
	}

	public function cadastrar(){
		$this->verificarSession();

		$this->load->model('Assunto_model','assunto');

		$dados['DS_ASSUNTO'] = $this->input->post('DS_ASSUNTO');

		$this->assunto->cadastroAssunto($dados);

		redirect('Assunto');
	}

	public function atualizar($id= null){
		$this->verificarSession();
		if($id == null){
			redirect('Assunto');
		}

		$this->load->model('Assunto_model','assunto');

		$query = $this->assunto->getAssuntoById($id);

		if($query == null){
			redirect('Assunto');
		}

		$dados['assunto'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/editar-assunto',$dados);
	}

	public function salvar_atualizacao(){
		$this->verificarSession();

		$this->load->model('Assunto_model','assunto');

		$dados['DS_ASSUNTO'] = $this->input->post('DS_ASSUNTO');

		if($this->input->post('CO_SEQ_ASSUNTO') != null){
			$this->assunto->editarAssunto($dados, $this->input->post('CO_SEQ_ASSUNTO'));
		} else {
			$this->assunto>cadastroAssunto($dados);
		}

		redirect('Assunto');
	}

	public function apagar($id = null){
		$this->verificarSession();

		$this->load->model('Assunto_model','assunto');

		if($this->assunto->delete($id)){
			redirect('Assunto');
		}
	}
}	