<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indexacao_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_indexacao($limit = null, $offset = null){
		if($limit){
			$this->db->limit($limit, $offset);
		}

		// $this->db->select('CO_SEQ_INDICE, CO_SEQ_LEGISLACAO, DS_AREA_ATUACAO, DS_TEXTO_MARCACAO, DS_TEMA, DS_ASSUNTO, DS_SUBASSUNTO');
		// $this->db->from('tb_indexacao');
		//
		// $this->db->join('tb_legislacao', 'tb_legislacao.CO_SEQ_LEGISLACAO = tb_indexacao.CO_SEQ_LEGISLACAO_ID');
		// $this->db->join('tb_area_atuacao', 'tb_area_atuacao.CO_AREA_ATUACAO = tb_indexacao.CO_AREA_ATUACAO_ID');
		// $this->db->join('tb_tema', 'tb_tema.CO_SEQ_TEMA = tb_indexacao.CO_SEQ_TEMA_ID');
		//
		// $this->db->join('tb_assunto', 'tb_assunto.CO_SEQ_ASSUNTO = tb_indexacao.CO_SEQ_ASSUNTO_ID');
		// $this->db->join('tb_subassunto', 'tb_subassunto.CO_SEQ_SUBASSUNTO = tb_indexacao.CO_SEQ_SUBASSUNTO_ID');

		$this->db->select('ind.*, ass1.DS_ASSUNTO ass1DS_ASSUNTO, ass2.DS_ASSUNTO ass2DS_ASSUNTO, tema.DS_TEMA temaDS_TEMA, areaAtuacao.DS_AREA_ATUACAO areaAtuacaoDS_AREA_ATUACAO, tb_legislacao.DS_CONTEUDO');
		$this->db->from('tb_indexacao as ind');
		$this->db->join('tb_assunto as ass1', 'ass1.CO_SEQ_ASSUNTO = ind.CO_SEQ_ASSUNTO_ID', 'left');
		$this->db->join('tb_assunto as ass2', 'ass2.CO_SEQ_ASSUNTO = ind.CO_SEQ_SUBASSUNTO_ID', 'left');
		$this->db->join('tb_tema as tema', 'tema.CO_SEQ_TEMA = ind.CO_SEQ_TEMA_ID', 'left');
		$this->db->join('tb_area_atuacao as areaAtuacao', 'areaAtuacao.CO_AREA_ATUACAO = ind.CO_AREA_ATUACAO_ID', 'left');
		$this->db->join('tb_legislacao', 'tb_legislacao.CO_SEQ_LEGISLACAO = ind.CO_SEQ_LEGISLACAO_ID');

		return $this->db->get()->result();

	}

	public function search($like = array(), $distinct = null, $or_like = array(), $limit = null, $offset = null, $order_by = null, $where = array()){

        $this->db->select('ind.*, ass1.DS_ASSUNTO ass1DS_ASSUNTO, ass2.DS_ASSUNTO ass2DS_ASSUNTO, tema.DS_TEMA temaDS_TEMA, areaAtuacao.DS_AREA_ATUACAO areaAtuacaoDS_AREA_ATUACAO, tb_legislacao.DS_CONTEUDO');
        $this->db->from('tb_indexacao as ind');
        $this->db->join('tb_assunto as ass1', 'ass1.CO_SEQ_ASSUNTO = ind.CO_SEQ_ASSUNTO_ID');
        $this->db->join('tb_assunto as ass2', 'ass2.CO_SEQ_ASSUNTO = ind.CO_SEQ_SUBASSUNTO_ID');
        $this->db->join('tb_tema as tema', 'tema.CO_SEQ_TEMA = ind.CO_SEQ_TEMA_ID');
        $this->db->join('tb_area_atuacao as areaAtuacao', 'areaAtuacao.CO_AREA_ATUACAO = ind.CO_AREA_ATUACAO_ID');
        $this->db->join('tb_legislacao', 'tb_legislacao.CO_SEQ_LEGISLACAO = ind.CO_SEQ_LEGISLACAO_ID');

        if ($like) {
            $this->db->like($like);
        }
        if(!is_null($distinct)){
            $this->db->distinct($distinct);
        }
        if ($or_like) {
            $this->db->or_like($or_like);
        }
        if ($order_by) {
            $this->db->order_by($order_by);
        }

        if ($where) {
            $this->db->where($where);
        }

        //$this->db->like('DS_TEXTO_MARCACAO', $search);
        //$this->db->order_by('DS_TEXTO_MARCACAO','ASC');

        return $this->db->get()->result();
    }

	public function countAll(){
		return $this->db->count_all('tb_indexacao');
	}

	public function get_tipo_norma($like = array()){
        if(!is_null($like)){
            $this->db->like($like);
        }
		$query = $this->db->get('tb_tipo_norma');
		return $query->result();
	}

	public function get_legislacao($like = array()){
        if(!is_null($like)){
            $this->db->like($like);
        }
		$query = $this->db->get('tb_legislacao');
		return $query->result();
	}

	public function get_indexacoes(){
		$query = $this->db->get('tb_indexacao');
		return $query->result();
	}

	public function get_areaAtuacao($like = array()){
        if(!is_null($like)){
            $this->db->like($like);
        }
		$query = $this->db->get('tb_area_atuacao');
		return $query->result();
	}

	public function get_assunto($like = array()){
        if(!is_null($like)){
            $this->db->like($like);
        }
		$query = $this->db->get('tb_assunto');
		return $query->result();
	}

	public function get_subassunto($like = array()){
        if(!is_null($like)){
            $this->db->like($like);
        }
	    return $this->db->get('tb_subassunto')->result();
    }

	public function get_tema($like = array()){
        if(!is_null($like)){
            $this->db->like($like);
        }
		$query = $this->db->get('tb_tema');
		return $query->result();
	}

	public function cadastroIndexacao($dados){
        if(!is_null($like)){
            $this->db->like($like);
        }
		$this->db->insert('tb_indexacao', $dados);
	}

	public function getLegislacao($search){

  //$this->load->database();
  $query = $this->db->query("SELECT * FROM tb_indexacao_2  WHERE (DS_TEXTO_MARCACAO='%search%' OR DS_ASSUNTO='%search%' OR DS_SUBASSUNTO='%search%' OR DS_TEMA='%search%' ) ");
  return $query->result_array();
 }

	public function getIndexacaoById($id = null){
		if($id != null){
			$this->db->select('ind.*, CO_SEQ_INDICE, ass1.DS_ASSUNTO ass1DS_ASSUNTO, ass2.DS_ASSUNTO ass2DS_ASSUNTO, tema.DS_TEMA temaDS_TEMA, areaAtuacao.DS_AREA_ATUACAO areaAtuacaoDS_AREA_ATUACAO');

			// $this->db->join('tb_area_atuacao', 'tb_area_atuacao.CO_AREA_ATUACAO = tb_indexacao.CO_AREA_ATUACAO_ID');
			// $this->db->join('tb_assunto', 'tb_assunto.CO_SEQ_ASSUNTO = tb_indexacao.CO_SEQ_ASSUNTO_ID');
			// $this->db->join('tb_subassunto', 'tb_subassunto.CO_SEQ_SUBASSUNTO = tb_indexacao.CO_SEQ_SUBASSUNTO_ID');
			// $this->db->join('tb_tema', 'tb_tema.CO_SEQ_TEMA = tb_indexacao.CO_SEQ_TEMA_ID');

			$this->db->join('tb_assunto as ass1', 'ass1.CO_SEQ_ASSUNTO = ind.CO_SEQ_ASSUNTO_ID', 'left');
			$this->db->join('tb_assunto as ass2', 'ass2.CO_SEQ_ASSUNTO = ind.CO_SEQ_SUBASSUNTO_ID', 'left');
			$this->db->join('tb_tema as tema', 'tema.CO_SEQ_TEMA = ind.CO_SEQ_TEMA_ID', 'left');
			$this->db->join('tb_area_atuacao as areaAtuacao', 'areaAtuacao.CO_AREA_ATUACAO = ind.CO_AREA_ATUACAO_ID', 'left');
			$this->db->join('tb_legislacao', 'tb_legislacao.CO_SEQ_LEGISLACAO = ind.CO_SEQ_LEGISLACAO_ID');

			$this->db->where('ind.CO_SEQ_INDICE', $id);
			$this->db->limit(1);

			$query = $this->db->get('tb_indexacao as ind');
			return $query->row();
		}
	}

	public function editarIndexacao($dados = null, $id = null){
		if($dados != null && $id != null){
			$this->db->update('tb_indexacao', $dados, array('CO_SEQ_INDICE' => $id));
		}
	}

	public function delete($id = null){
		if($id){
			return $this->db->where('CO_SEQ_INDICE', $id)->delete('tb_indexacao');
		}
	}


}
