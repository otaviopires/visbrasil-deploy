<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){

		//$search = $this->input->post('PESQUISE_ASSUNTO');
	  //$query = $this->indexacao->getLegislacao($search);
		//print_r($query);
	 //echo json_encode ($query);

        $this->load->model('Indexacao_model', 'indexacao');

        $dados['legislacoes'] = $this->indexacao->get_legislacao();
        $dados['areaAtuacao'] = $this->indexacao->get_areaAtuacao();
        $dados['assuntos'] = $this->indexacao->get_assunto();
        $dados['subassuntos'] = $this->indexacao->get_assunto();
        $dados['temas'] = $this->indexacao->get_tema();
        $dados['normas']= $this->indexacao->get_tipo_norma();
        $dados['results'] = null;

        $this->load->view('include/header_public');
		$this->load->view('public/home', $dados);



         //$search = $this->input->post('PESQUISE_ASSUNTO');
         //$query = $this->indexacao->getLegislacao($search);
        // echo json_encode ($query);


	}


	public function search(){

	    //Melhorar abordagem
        $this->load->model('Indexacao_model', 'indexacao');

        $dados['legislacoes'] = $this->indexacao->get_legislacao();
        $dados['areaAtuacao'] = $this->indexacao->get_areaAtuacao();
        $dados['assuntos'] = $this->indexacao->get_assunto();
        $dados['subassuntos'] = $this->indexacao->get_assunto();
        $dados['temas'] = $this->indexacao->get_tema();
        $dados['normas']= $this->indexacao->get_tipo_norma();

        ini_set('display_errors', 0);


        $this->load->view('include/header_public');

	    $request = $this->input->post();

        $query_text = array();
        $where = array();

        if(!is_null($request['PESQUISE_ASSUNTO'])){
            $query_text['DS_TEXTO_MARCACAO'] =  addslashes(strip_tags($request["PESQUISE_ASSUNTO"]));
        }
        if(!is_null($request['legislacao'])){
            $where['tb_legislacao.CO_SEQ_LEGISLACAO'] =  $request['legislacao'];
        }

        if(!is_null($request['areaAtuacao'])){
            $where['areaAtuacao.CO_AREA_ATUACAO'] =  $request['areaAtuacao'];
        }

        if(!is_null($request['assunto'])){
            $where['tb_assunto.CO_SEQ_ASSUNTO'] =  $request['assunto'];
        }

        if(!is_null($request['subassunto'])){
           $where['tb_legislacao.CO_SEQ_SUBASSUNTO'] =  $request['subassunto'];
        }

        if(!is_null($request['tema'])){
           $where['tb_tema.CO_SEQ_TEMA'] =  $request['tema'];
        }

	    $dados['results'] = $this->indexacao->search($query_text, null, null, null, null, null, $where);
        $this->load->view('public/home', $dados);
    }

}
