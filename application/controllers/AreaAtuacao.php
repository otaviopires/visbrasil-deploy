<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe controladora responsável pela gerência da area de atuação
*/


class AreaAtuacao extends CI_Controller {

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

		$this->load->model('AreaAtuacao_model','areaAtuacao');

		

		$data['areaAtuacoes'] = $this->areaAtuacao->getAreaAtuacao();

		//Carregamento das views
		$this->load->view('include/header');
		$this->load->view('admin/area-atuacao',$data);	
	}

	public function ver($id = null){
		$this->verificarSession();

		if($id == null){
			redirect('AreaAtuacao');
		}

		$this->load->model('AreaAtuacao_model','areaAtuacao');

		$query = $this->areaAtuacao->getAreaAtuacaoById($id);

		if($query == null){
			redirect('AreaAtuacao');
		}

		$dados['area'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/ver-area-atuacao', $dados);
	}

	public function cadastro(){
		$this->verificarSession();

		$this->load->view('include/header');
		$this->load->view('admin/cadastro-area-atuacao');			
	}

	public function cadastrar(){
		$this->verificarSession();

		$this->load->model('AreaAtuacao_model','areaAtuacao');

		$dados['DS_AREA_ATUACAO'] = $this->input->post('DS_AREA_ATUACAO');

		$this->areaAtuacao->cadastroAreaAtuacao($dados);

		redirect('AreaAtuacao');
	}

	public function atualizar($id = null){
		$this->verificarSession();
		if($id == null){
			redirect('AreaAtuacao');
		}

		$this->load->model('AreaAtuacao_model','areaAtuacao');

		$query = $this->areaAtuacao->getAreaAtuacaoById($id);

		if($query == null){
			redirect('AreaAtuacao');
		}

		$dados['area'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/editar-area-atuacao',$dados);	
	}

	public function salvar_atualizacao(){
		$this->verificarSession();

		$this->load->model('AreaAtuacao_model','areaAtuacao');

		$dados['DS_AREA_ATUACAO'] = $this->input->post('DS_AREA_ATUACAO');

		if($this->input->post('CO_AREA_ATUACAO') != null){
			$this->areaAtuacao->editarAreaAtuacao($dados, $this->input->post('CO_AREA_ATUACAO'));
		} else {
			$this->areaAtuacao->cadastroAreaAtuacao($dados);
		}

		redirect('AreaAtuacao');
	}

	public function apagar($id = null){
		$this->verificarSession();
		$this->load->model('AreaAtuacao_model','areaAtuacao');	

		if($this->areaAtuacao->delete($id)){
			redirect('AreaAtuacao');
		}
	}
}