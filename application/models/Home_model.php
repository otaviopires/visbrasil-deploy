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

		$this->db->select('ind.*, ass1.DS_ASSUNTO ass1DS_ASSUNTO, ass2.DS_ASSUNTO ass2DS_ASSUNTO, tema.DS_TEMA temaDS_TEMA, areaAtuacao.DS_AREA_ATUACAO areaAtuacaoDS_AREA_ATUACAO');
		$this->db->from('tb_indexacao as ind');
		$this->db->join('tb_assunto as ass1', 'ass1.CO_SEQ_ASSUNTO = ind.CO_SEQ_ASSUNTO_ID', 'left');
		$this->db->join('tb_assunto as ass2', 'ass2.CO_SEQ_ASSUNTO = ind.CO_SEQ_SUBASSUNTO_ID', 'left');
		$this->db->join('tb_tema as tema', 'tema.CO_SEQ_TEMA = ind.CO_SEQ_TEMA_ID', 'left');
		$this->db->join('tb_area_atuacao as areaAtuacao', 'areaAtuacao.CO_AREA_ATUACAO = ind.CO_AREA_ATUACAO_ID', 'left');
		$this->db->join('tb_legislacao', 'tb_legislacao.CO_SEQ_LEGISLACAO = ind.CO_SEQ_LEGISLACAO_ID');

		return $this->db->get()->result();

	}

	public function countAll(){
		return $this->db->count_all('tb_indexacao');
	}

	public function get_tipo_norma(){
		$query = $this->db->get('tb_tipo_norma');
		return $query->result();
	}

	public function get_legislacao(){
		$query = $this->db->get('tb_legislacao');
		return $query->result();
	}

	public function get_indexacoes(){
		$query = $this->db->get('tb_indexacao');
		return $query->result();
	}

	public function get_areaAtuacao(){
		$query = $this->db->get('tb_area_atuacao');
		return $query->result();
	}

	public function get_assunto(){
		$query = $this->db->get('tb_assunto');
		return $query->result();
	}

	public function get_tema(){
		$query = $this->db->get('tb_tema');
		return $query->result();
	}

	public function cadastroIndexacao($dados){
		$this->db->insert('tb_indexacao', $dados);
	}

	public function getIndexacaoById($id = null){
		if($id != null){
			$this->db->select('ind.*, CO_SEQ_INDICE, ass1.DS_ASSUNTO ass1DS_ASSUNTO, ass2.DS_ASSUNTO ass2DS_ASSUNTO, tema.DS_TEMA temaDS_TEMA, areaAtuacao.DS_AREA_ATUACAO areaAtuacaoDS_AREA_ATUACAO');

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


}
