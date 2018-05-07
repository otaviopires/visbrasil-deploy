<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    CONST TB_AREA_ATUACAO = 3;
    CONST TB_ASSUNTO = 4;
    CONST TB_INDEXACAO = 7;
    CONST TB_LEGISLACAO = 2;
    CONST TB_SUBASSUNTO = 5;
    CONST TB_TEMA = 6;
    CONST TB_TIPO_NORMA = 1;

    public function getTableName(){
        return [
            self::TB_AREA_ATUACAO => 'tb_area_atuacao',
            self::TB_ASSUNTO => 'tb_assunto',
            self::TB_INDEXACAO => 'tb_indexacao',
            self::TB_LEGISLACAO => 'tb_legislacao',
            self::TB_SUBASSUNTO => 'tb_subassunto',
            self::TB_TEMA => 'tb_tema',
            self::TB_TIPO_NORMA => 'tb_tipo_norma',
        ];

    }

    public function getNiceNameTable(){
        return [
            self::TB_AREA_ATUACAO => 'Área de Atuação',
            self::TB_ASSUNTO => 'Assunto',
            self::TB_INDEXACAO => 'Indexação',
            self::TB_LEGISLACAO => 'Legislacao',
            self::TB_SUBASSUNTO => 'Sub-assunto',
            self::TB_TEMA => 'Tema',
            self::TB_TIPO_NORMA => 'Tipo de Norma',
        ];

    }


    public function getTable($tableID){
        return self::getTableName()[$tableID];
    }

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


    public function visualization(){

	    $this->load->view('include/header_public');
        $this->load->model('Indexacao_model', 'indexacao');
        $config = array();
        //ID
        $id = $this->uri->segment(3);

        //TABLE
        $table = $this->getTable($this->uri->segment(4));

        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $config["per_page"] = 6;


        if($table == 'tb_tipo_norma'){
            $config["total_rows"] = count($this->indexacao->getTipoNormaWithLegislacao(null, 0, $id));
            $dados["results"] =  $this->indexacao->getTipoNormaWithLegislacao($config["per_page"], $page, $id);

        }

        if($table == 'tb_legislacao'){
            $config["total_rows"] = count($this->indexacao->get_legislacaoByID(null, 0, $id));
            $dados["results"] =  $this->indexacao->get_legislacaoByID($config["per_page"], $page, $id);

        }

        if($table == 'tb_area_atuacao'){
            $config["total_rows"] = count($this->indexacao->getAreaDeAtuacaoWithIndexacao(null, 0, $id));
            $dados["results"] =  $this->indexacao->getAreaDeAtuacaoWithIndexacao($config["per_page"], $page, $id);
        }

        if($table == 'tb_assunto' || $table == 'tb_subassunto'){
            $config["total_rows"] = count($this->indexacao->getAssuntoORSubAssuntoWithIndexacao(null, 0, $id));
            $dados["results"] =  $this->indexacao->getAssuntoORSubAssuntoWithIndexacao($config["per_page"], $page, $id);
        }

        if($table == 'tb_tema'){
            $config["total_rows"] = count($this->indexacao->getTemaWithIndexacao(null, 0, $id));
            $dados["results"] =  $this->indexacao->getTemaWithIndexacao($config["per_page"], $page, $id);
        }

        if($table == 'tb_indexacao'){
            $config["total_rows"] = count($this->indexacao->getIndexacaoById2(null, 0, $id));
            $dados["results"] =  $this->indexacao->getIndexacaoById2($config["per_page"], $page, $id);
        }

        $config["base_url"] = base_url() . "Home/visualization/" . $id . "/" . $this->uri->segment(4);
        $config["uri_segment"] = 5;

        $this->pagination->initialize($config);

        $dados["links"] = $this->pagination->create_links();
        $dados['table'] = $table;
        $dados['niceTable'] = self::getNiceNameTable()[$this->uri->segment(4)];

        $this->load->view('public/resultado', $dados);
    }

}
