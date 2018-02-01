<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assunto_model extends CI_Model  {

	public function __construct()
	{
		parent::__construct();
	}

	public function getAssunto($limit = null, $offset = null){
		if($limit){
			$this->db->limit($limit, $offset);
		}
		
		$query = $this->db->get('tb_assunto');
		return $query->result();
	}

	public function countAll(){
		return $this->db->count_all('tb_assunto');
	}

	public function cadastroAssunto($dados){
		$this->db->insert('tb_assunto',$dados);
	}

	public function getAssuntoById($id = null){
		if($id != null){
			$this->db->where('CO_SEQ_ASSUNTO', $id);
			$this->db->limit(1);
			$query = $this->db->get('tb_assunto');
			return $query->row();
		}
	}

	public function editarAssunto($dados = null, $id = null){
		if($dados != null && $id != null){
			$this->db->update('tb_assunto', $dados, array('CO_SEQ_ASSUNTO' => $id));
		}
	}

	public function delete($id = null){
		if($id){
			return $this->db->where('CO_SEQ_ASSUNTO',$id)->delete('tb_assunto');
		}
	}
}