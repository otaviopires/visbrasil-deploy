<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema_model extends CI_Model  {

	public function __construct()
	{
		parent::__construct();
	}

	public function getTemas($limit = null, $offset = null){
		if($limit){
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get('tb_tema');
		return $query->result();
	}

	public function countAll(){
		return $this->db->count_all('tb_tema');
	}

	public function cadastroTema($dados){
		$this->db->insert('tb_tema',$dados);
	}

	public function getTemaById($id = null){
		if($id != null){
			$this->db->where('CO_SEQ_TEMA', $id);
			$this->db->limit(1);
			$query = $this->db->get('tb_tema');
			return $query->row();
		}
	}

	public function editarTema($dados = null, $id = null){
		if($dados != null && $id != null){
			$this->db->update('tb_tema', $dados, array('CO_SEQ_TEMA' => $id));
		}
	}

	public function delete($id = null){
		if($id){
			return $this->db->where('CO_SEQ_TEMA', $id)->delete('tb_tema');
		}
	}
}