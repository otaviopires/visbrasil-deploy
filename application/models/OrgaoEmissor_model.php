<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe Model responsável pela gerência do orgão emissor
*/

class OrgaoEmissor_model extends CI_Model  {

	public function __construct()
	{
		parent::__construct();
	}

	public function getOrgaoEmissor($limit = null, $offset = null){
		if($limit){
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get('tb_orgao_emissor');
		return $query->result();
	}

	public function countAll(){
		return $this->db->count_all('tb_orgao_emissor');
	}

	public function cadastroOrgaoEmissor($dados){
		$this->db->insert('tb_orgao_emissor', $dados);
	}

	public function getOrgaoEmissorById($id = null){
		if($id != null){
			$this->db->where('CO_ORGAO_EMISSOR', $id);
			$this->db->limit(1);
			$query = $this->db->get('tb_orgao_emissor');
			return $query->row();
		}
	}

	public function editarOrgaoEmissor($dados = null, $id = null){
		if($dados != null && $id != null){
			$this->db->update('tb_orgao_emissor', $dados, array('CO_ORGAO_EMISSOR' => $id));
		}
	}

	public function delete($id = null){
		if($id){
			return $this->db->where('CO_ORGAO_EMISSOR', $id)->delete('tb_orgao_emissor');
		}
	}

}