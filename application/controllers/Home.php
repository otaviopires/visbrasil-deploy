<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){

		//$search = $this->input->post('PESQUISE_ASSUNTO');
	  //$query = $this->indexacao->getLegislacao($search);
		//print_r($query);
	 //echo json_encode ($query);

        $this->load->model('Indexacao_model', 'indexacao');

        $dados['legislacoes'] = $this->indexacao->get_legislacao(null);
        $dados['areaAtuacao'] = $this->indexacao->get_areaAtuacao(null);
        $dados['assuntos'] = $this->indexacao->get_assunto(null);
        $dados['subassuntos'] = $this->indexacao->get_subassunto(null);
        $dados['temas'] = $this->indexacao->get_tema(null);
        $dados['normas']= $this->indexacao->get_tipo_norma(null);
        $dados['results'] = null;
        $dados['all'] = $this->indexacao->get_indexacao(null);
        $dados['search'] = null;

        $this->load->view('include/header_public');
		$this->load->view('public/home', $dados);



         //$search = $this->input->post('PESQUISE_ASSUNTO');
         //$query = $this->indexacao->getLegislacao($search);
        // echo json_encode ($query);


	}


	public function search(){

	    //Melhorar abordagem
        $this->load->model('Indexacao_model', 'indexacao');

        ini_set('display_errors', 0);

        $this->load->view('include/header_public');

	    $request = $this->input->post();

        $query_text = array();

        $query_text['DS_TEXTO_MARCACAO'] = addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $query_text_or_like['tb_legislacao.DS_CONTEUDO'] = addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $query_text_or_like['tb_legislacao.DS_EMENTA'] = addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $query_text_or_like['ass1.DS_ASSUNTO'] = addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $query_text_or_like['tema.DS_TEMA'] = addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));

        $legislacao['tb_legislacao.DS_CONTEUDO'] =  addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $legislacao['tb_legislacao.DS_EMENTA'] =  addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $dados['legislacoes'] = $this->indexacao->get_legislacao($legislacao);

        $areaAtuacao['tb_area_atuacao.DS_AREA_ATUACAO'] =  addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $dados['areaAtuacao'] = $this->indexacao->get_areaAtuacao($areaAtuacao);

        $assunto['tb_assunto.DS_ASSUNTO'] =  addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $dados['assuntos'] = $this->indexacao->get_assunto($assunto);

        $subassunto['tb_subassunto.DS_SUBASSUNTO'] =  addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $dados['subassuntos'] = $this->indexacao->get_subassunto($subassunto);

        $tema['tb_tema.DS_TEMA'] =  addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $dados['temas'] = $this->indexacao->get_tema($tema);

        $normas['tb_tipo_norma.DS_TIPO_NORMA'] =  addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        $dados['normas']= $this->indexacao->get_tipo_norma($normas);


	    $dados['all'] = $this->indexacao->search($query_text, null, $query_text_or_like, null, null, null, null);

	    $dados['search'] = $request["PESQUISE_ASSUNTO"];

	    $this->load->view('public/home', $dados);
    }

}
