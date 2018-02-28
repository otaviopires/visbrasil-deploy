<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){

		$this->load->model('Indexacao_model', 'indexacao');
		
		$this->load->model('Indexacao_model', 'indexacao');
		
		$dados['legislacoes'] = $this->indexacao->get_legislacao();
		$dados['areaAtuacao'] = $this->indexacao->get_areaAtuacao();
		$dados['assuntos'] = $this->indexacao->get_assunto();
		$dados['subassuntos'] = $this->indexacao->get_assunto();
		$dados['temas'] = $this->indexacao->get_tema();

        $this->load->view('include/header_public');
		$this->load->view('public/home', $dados);
	}


}
