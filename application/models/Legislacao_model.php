<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legislacao_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_legislacao($limit = null, $offset = null){
		if($limit){
			$this->db->limit($limit, $offset);
		}

		$this->db->select('*');
		$this->db->from('tb_legislacao');
		$this->db->join('tb_tipo_norma', 'tb_tipo_norma.CO_TIPO_NORMA = tb_legislacao.CO_TIPO_NORMA_ID');
		$this->db->join('tb_orgao_emissor', 'tb_orgao_emissor.CO_ORGAO_EMISSOR = tb_legislacao.CO_ORGAO_EMISSOR_ID');
		return $this->db->get()->result();
	}

	public function countAll(){
		return $this->db->count_all('tb_legislacao');
	}

	public function get_tipoNormas(){
		$query = $this->db->get('tb_tipo_norma');
		return $query->result();
	}

	public function get_orgaoEmissores(){
		$query = $this->db->get('tb_orgao_emissor');
		return $query->result();
	}

	public function cadastroLegislacao($dados){
		$this->db->insert('tb_legislacao', $dados);
	}

	public function getLegislacaoById($id = null){
		if($id != null){
			$this->db->where('CO_SEQ_LEGISLACAO', $id);
			$this->db->limit(1);
			$this->db->join('tb_tipo_norma', 'tb_tipo_norma.CO_TIPO_NORMA = tb_legislacao.CO_TIPO_NORMA_ID');
			$this->db->join('tb_orgao_emissor', 'tb_orgao_emissor.CO_ORGAO_EMISSOR = tb_legislacao.CO_ORGAO_EMISSOR_ID');
			$query = $this->db->get('tb_legislacao');
			return $query->row();
		}
	}

	public function editarLegislacao($dados = null, $id = null){
		if($dados != null && $id != null){
			$this->db->update('tb_legislacao', $dados, array('CO_SEQ_LEGISLACAO' => $id));
		}
	}

	public function delete($id = null){
		if($id){
			return $this->db->where('CO_SEQ_LEGISLACAO', $id)->delete('tb_legislacao');
		}
	}
}
