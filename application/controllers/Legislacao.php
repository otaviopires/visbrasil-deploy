<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe controladora responsável pela gerência de legislações
*/


class Legislacao extends CI_Controller {

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

		$this->load->model('Legislacao_model', 'legislacao');

		$dados['legislacoes'] = $this->legislacao->get_legislacao();

		$this->load->view('include/header');
		$this->load->view('admin/legislacao', $dados);
	}

	public function ver($id = null){
		$this->verificarSession();
		if($id == null){
			redirect('Legislacao');
		}

		$this->load->model('Legislacao_model', 'legislacao');

		$query = $this->legislacao->getLegislacaoById($id);

		if($query == null){
			redirect('Legislacao');
		}

		$dados['legislacao'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/ver-legislacao',$dados);
	}

	public function cadastro(){
		$this->verificarSession();

		$this->load->model('Legislacao_model', 'legislacao');

		$dados['tipoNormas'] = $this->legislacao->get_tipoNormas();
		$dados['orgaoEmissores'] = $this->legislacao->get_orgaoEmissores();

		$this->load->view('include/header');
		$this->load->view('admin/cadastro-legislacao', $dados);
	}

	public function cadastrar(){
		$this->verificarSession();

		$this->load->model('Legislacao_model', 'legislacao');

		$dados['CO_TIPO_NORMA_ID'] = $this->input->post('tipoNorma');
		$dados['NU_NORMA'] = $this->input->post('numNorma');
		$dados['CO_ORGAO_EMISSOR_ID'] = $this->input->post('orgaoEmissor');
		$dados['DT_SANCAO'] = implode('-', array_reverse(explode('/', $this->input->post('dataSancao'))));
		$dados['DT_PUBLICACAO'] = implode('-', array_reverse(explode('/', $this->input->post('dataPub'))));
		$dados['DS_CONTEUDO'] = $this->input->post('conteudo');
		$dados['DS_EMENTA'] = $this->input->post('ementa');

		$this->legislacao->cadastroLegislacao($dados);

		redirect('Legislacao');
	}

	public function atualizar($id = null){
		$this->verificarSession();

		if($id == null){
			redirect('Legislacao');
		}

		$this->load->model('Legislacao_model', 'legislacao');

		$dados['tipoNormas'] = $this->legislacao->get_tipoNormas();
		$dados['orgaoEmissores'] = $this->legislacao->get_orgaoEmissores();
		$query = $this->legislacao->getLegislacaoById($id);

		if($query == null){
			redirect('Legislacao');
		}

		$dados['legislacao'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/editar-legislacao', $dados);

	}

	public function salvar_atualizacao(){
		$this->verificarSession();

		$this->load->model('Legislacao_model', 'legislacao');

		$dados['CO_TIPO_NORMA_ID'] = $this->input->post('tipoNorma');
		$dados['NU_NORMA'] = $this->input->post('numNorma');
		$dados['CO_ORGAO_EMISSOR_ID'] = $this->input->post('orgaoEmissor');
		$dados['DT_SANCAO'] = implode('-', array_reverse(explode('/', $this->input->post('dataSancao'))));
		$dados['DT_PUBLICACAO'] = implode('-', array_reverse(explode('/', $this->input->post('dataPub'))));
		$dados['DS_CONTEUDO'] = $this->input->post('conteudo');
		$dados['DS_EMENTA'] = $this->input->post('ementa');

		if($this->input->post('CO_SEQ_LEGISLACAO') != null){
			$this->legislacao->editarLegislacao($dados, $this->input->post('CO_SEQ_LEGISLACAO'));
		} else {
			$this->legislacao->cadastroLegislacao($dados);
		}


		redirect('legislacao');
	}

	public function apagar($id = null){
		$this->verificarSession();
		$this->load->model('Legislacao_model', 'legislacao');

		if($this->legislacao->delete($id)){
			redirect('Legislacao');
		}
	}
}
