<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoNorma_model extends CI_Model  {

	public function __construct()
	{
		parent::__construct();
	}

	public function getTipoNorma($limit = null, $offset = null){
		if($limit){
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get('tb_tipo_norma');
		return $query->result();
	}

	public function countAll(){
		return $this->db->count_all('tb_tipo_norma');
	}
	
	public function cadastroTipoNorma($dados){
		$this->db->insert('tb_tipo_norma', $dados);
	}

	public function getTipoNormaById($id = null){
		if($id != null){
			$this->db->where('CO_TIPO_NORMA', $id);
			$this->db->limit(1);
			$query = $this->db->get('tb_tipo_norma');
			return $query->row();
		}
	}

	public function editarTipoNorma($dados = null, $id = null){
		if($dados != null && $id != null){
			$this->db->update('tb_tipo_norma', $dados, array('CO_TIPO_NORMA' => $id));
		}
	}

	public function delete($id = null){
		if($id){
			return $this->db->where('CO_TIPO_NORMA', $id)->delete('tb_tipo_norma');
		}
	}

}