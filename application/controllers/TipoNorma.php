<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe controladora responsável pela gerência dos tipos de normas
*/


class TipoNorma extends CI_Controller {

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

		$this->load->model('TipoNorma_model', 'tipoNorma');

		$dados['tipoNormas'] = $this->tipoNorma->getTipoNorma();

		$this->load->view('include/header');
		$this->load->view('admin/tipos-normas', $dados);
	}

	public function ver($id = null){
		$this->verificarSession();

		$this->load->model('TipoNorma_model', 'tipoNorma');

		if($id == null){
			redirect('TipoNorma');
		}

		$query = $this->tipoNorma->getTipoNormaById($id);

		if($query == null){
			redirect('TipoNorma');
		}

		$dados['tipo'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/ver-tipos-normas', $dados);
	}

	public function cadastro(){
		$this->verificarSession();

		$this->load->view('include/header');
		$this->load->view('admin/cadastro-tipos-normas');
	}

	public function cadastrar(){
		$this->verificarSession();

		$this->load->model('TipoNorma_model', 'tipoNorma');

		$dados['DS_TIPO_NORMA'] = $this->input->post('DS_TIPO_NORMA');

		$this->tipoNorma->cadastroTipoNorma($dados);

		redirect('TipoNorma');
	}

	public function atualizar($id = null){
		$this->verificarSession();
		if($id == null){
			redirect('TipoNorma');
		}

		$this->load->model('TipoNorma_model', 'tipoNorma');

		$query = $this->tipoNorma->getTipoNormaById($id);

		if($query == null){
			redirect('TipoNorma');
		}

		$dados['tipo'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/editar-tipos-normas', $dados);
	}

	public function salvar_atualizacao(){
		$this->verificarSession();

		$this->load->model('TipoNorma_model', 'tipoNorma');

		$dados['DS_TIPO_NORMA'] = $this->input->post('DS_TIPO_NORMA');

		if($this->input->post('CO_TIPO_NORMA') != null){
			$this->tipoNorma->editarTipoNorma($dados, $this->input->post('CO_TIPO_NORMA'));
		} else {
			$this->tipoNorma->cadastroTipoNorma($dados);
		}

		redirect('TipoNorma');
	}

	public function apagar($id = null){
		$this->verificarSession();

		$this->load->model('TipoNorma_model', 'tipoNorma');

		if($this->tipoNorma->delete($id)){
			redirect('TipoNorma');
		}
	}
}