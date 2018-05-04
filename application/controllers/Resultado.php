<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resultado extends CI_Controller {

	public function index(){
        //$this->load->view('include/header_public');
		//$this->load->view('public/resultado');
		$this->load->model('Indexacao_model', 'indexacao');

		$this->load->model('Indexacao_model', 'indexacao');

		$dados['legislacoes'] = $this->indexacao->get_legislacao();

		/* So estão sendo usados */
		$dados['areaAtuacao'] = $this->indexacao->get_areaAtuacao();
		$dados['assuntos'] = $this->indexacao->get_assunto();
		$dados['subassuntos'] = $this->indexacao->get_assunto();
		$dados['temas'] = $this->indexacao->get_tema();
		$dados['normas']= $this->indexacao->get_tipo_norma();

		$search = $this->input->post('PESQUISE_ASSUNTO');

	  $data['results'] = $this->indexacao->getLegislacao($search);
		//print_r($query);
	 //echo json_encode ($query);
	 $this->load->view('include/header_public');
  $this->load->view('public/resultado',  $data);
        //$this->load->view('include/header_public');
		//$this->load->view('public/home', $dados);
	}


}
