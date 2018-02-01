<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model  {

	public function __construct()
	{
		parent::__construct();
	}

	public function getUsuarios($limit = null, $offset = null){ //Metodo responsável pela listagem de usuários
		//Paginação e seus números de páginas 
		if($limit){
			$this->db->limit($limit, $offset);
		}

		//Vai no banco de dados de usuario e retorna os resultados
		$query = $this->db->get('usuario');
		return $query->result();
	}

	public function countAll(){
		return $this->db->count_all('usuario');
	}

	public function cadastroUsuario($dados){ //Metodo responsável pelo cadastro de usuários
		$this->db->insert('usuario',$dados);
	}

	public function getUsuarioByID($id = null){ //Metodo responsável por pegar os usuarios para fazer o update
		if($id != null){
			//verifica a id no banco de dados
			$this->db->where('id', $id);
			//Limita para apenas 1 registro
			$this->db->limit(1);
			//pega o usuario
			$query = $this->db->get('usuario');
			//retorna o usuario
			return $query->row();
		}
	}

	public function editarUsuario($dados = null, $id=null){
		//verifica se foi passado os dados e o id
		if($dados != null && $id != null){
			$this->db->update('usuario', $dados, array('id'=>$id));
		}
	}

	public function delete($id = null){ //metodo de delete

		if($id){
			return $this->db->where('id', $id)->delete('usuario');
		}

	}
}