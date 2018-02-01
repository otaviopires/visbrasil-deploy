<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AreaAtuacao_model extends CI_Model  {

	public function __construct()
	{
		parent::__construct();
	}

	public function getAreaAtuacao($limit = null, $offset = null){
		if($limit){
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get('tb_area_atuacao');
		return $query->result();
	}
	
	public function countAll(){
		return $this->db->count_all('tb_area_atuacao');
	}

	public function cadastroAreaAtuacao($dados){
		$this->db->insert('tb_area_atuacao', $dados);
	}

	public function getAreaAtuacaoById($id = null){
		if($id != null){
			$this->db->where('CO_AREA_ATUACAO',$id);
			$this->db->limit(1);
			$query = $this->db->get('tb_area_atuacao');
			return $query->row();
		}
	}

	public function editarAreaAtuacao($dados = null, $id = null){
		if($dados != null && $id != null){
			$this->db->update('tb_area_atuacao', $dados, array('CO_AREA_ATUACAO' => $id));
		}
	}

	public function delete($id = null){
		if($id){
			return $this->db->where('CO_AREA_ATUACAO', $id)->delete('tb_area_atuacao');
		}
	}

}