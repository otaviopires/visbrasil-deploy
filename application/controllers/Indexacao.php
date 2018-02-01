<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe controladora responsável pela gerência de indexações
*/


class Indexacao extends CI_Controller {

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

		$this->load->model('Indexacao_model', 'indexacao');

		$dados['indexacao'] = $this->indexacao->get_indexacao();

		$this->load->view('include/header');
		$this->load->view('admin/indexacao', $dados);
	}

	public function ver($id = null){
		$this->verificarSession();
		if($id == null){
			redirect('Indexacao');
		}

		$this->load->model('Indexacao_model', 'indexacao');

		$query = $this->indexacao->getIndexacaoById($id);


		if($query == null){
			redirect('Indexacao');
		}

		$dados['indexacao'] = $query;


		$this->load->view('include/header');
		$this->load->view('admin/ver-indexacao', $dados);
	}

	public function cadastro(){
		$this->verificarSession();

		$this->load->model('Indexacao_model', 'indexacao');

		$dados['legislacoes'] = $this->indexacao->get_legislacao();
		$dados['areaAtuacao'] = $this->indexacao->get_areaAtuacao();
		$dados['assuntos'] = $this->indexacao->get_assunto();
		$dados['subassuntos'] = $this->indexacao->get_assunto();
		$dados['temas'] = $this->indexacao->get_tema();

		$this->load->view('include/header');
		$this->load->view('admin/cadastro-indexacao', $dados);
	}

	public function cadastrar(){
		$this->verificarSession();

		$this->load->model('Indexacao_model', 'indexacao');

		$dados['CO_SEQ_LEGISLACAO_ID'] = $this->input->post('legislacao');
		$dados['CO_AREA_ATUACAO_ID'] = $this->input->post('areaAtuacao');
		$dados['CO_SEQ_ASSUNTO_ID'] = $this->input->post('assunto');
		$dados['CO_SEQ_SUBASSUNTO_ID'] = $this->input->post('subassunto');
		$dados['CO_SEQ_TEMA_ID'] = $this->input->post('tema');
		$dados['DS_TEXTO_MARCACAO'] = $this->input->post('marcacao');

		$this->indexacao->cadastroIndexacao($dados);

		redirect('Indexacao');
	}

	public function atualizar($id = null){
		$this->verificarSession();

		if($id == null){
			redirect('Indexacao');
		}

		$this->load->model('Indexacao_model', 'indexacao');

		$query = $this->indexacao->getIndexacaoById($id);

		if($query == null){
			redirect('Indexacao');
		}

		$dados['legislacoes'] = $this->indexacao->get_legislacao();
		$dados['areaAtuacao'] = $this->indexacao->get_areaAtuacao();
		$dados['assuntos'] = $this->indexacao->get_assunto();
		$dados['subassuntos'] = $this->indexacao->get_assunto();
		$dados['temas'] = $this->indexacao->get_tema();
		$dados['indexacao'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/editar-indexacao', $dados);
	}

	public function salvar_atualizacao(){
		$this->verificarSession();

		$this->load->model('Indexacao_model', 'indexacao');

		$dados['CO_SEQ_LEGISLACAO_ID'] = $this->input->post('legislacao');
		$dados['CO_AREA_ATUACAO_ID'] = $this->input->post('areaAtuacao');
		$dados['CO_SEQ_ASSUNTO_ID'] = $this->input->post('assunto');
		$dados['CO_SEQ_SUBASSUNTO_ID'] = $this->input->post('subassunto');
		$dados['CO_SEQ_TEMA_ID'] = $this->input->post('tema');
		$dados['DS_TEXTO_MARCACAO'] = $this->input->post('marcacao');

		if($this->input->post('CO_SEQ_INDICE') != null){
			$this->indexacao->editarIndexacao($dados, $this->input->post('CO_SEQ_INDICE'));

		} else {
			$this->indexacao->cadastroIndexacao($dados);
		}

		redirect('Indexacao');
	}

	public function apagar($id = null){
		$this->verificarSession();
		$this->load->model('Indexacao_model', 'indexacao');
		if($this->indexacao->delete($id)){
			redirect('Indexacao');
		}
	}

}
