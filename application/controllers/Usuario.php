<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Classe controladora responsável pela gerência do usuário
*/

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function verificarSession(){
		if($this->session->userdata('logado') == false){
			redirect('Dashboard/login');
		}
	}

	public function index(){
		$this->verificarSession();
		//Carregamento do model
		$this->load->model('Usuario_model','usuario');

		//Pega os dados do model
		$data['usuarios'] = $this->usuario->getUsuarios();

		//Carregamento das views
		$this->load->view('include/header');
		$this->load->view('admin/usuario', $data);	
	}

	public function ver($id = null){
		$this->verificarSession();

		$this->load->model('Usuario_model', 'usuario');

		//Verifica se foi passado um id
		if($id == null){
			redirect('usuario');
		}

		//Faz uma consulta no banco de dados para ver se existe
		$query = $this->usuario->getUsuarioByID($id);

		//Verifica se a query retorna registro, se não vai para á página de listar usuarios
		if($query == null){
			redirect('usuario');
		}

		//Criamos um array onde vamos guardar os dados e depois passar para a view
		$dados['usuario'] = $query;

		$this->load->view('include/header');
		$this->load->view('admin/ver-usuario', $dados);
	}

	public function cadastro(){ //Metodo responsável pelos carregamentos da página de cadastro
		$this->verificarSession();

		//Carregamento da model
		$this->load->model('Usuario_model','usuario');

		//Carregamento das views
		$this->load->view('include/header');
		$this->load->view('admin/cadastro-usuario');
	}	

	public function cadastrar(){ //Metodo responsável pelo salvamento dos dados
		$this->verificarSession();
		//Carregamento da model
		$this->load->model('Usuario_model','usuario');

		//Pega os dados do formulário e guarda no array dados
		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');
		$dados['user'] = $this->input->post('user');
		$dados['senha'] = md5($this->input->post('senha'));
		$dados['status'] = $this->input->post('status');
		$dados['nivel'] = $this->input->post('nivel');


		//Executa a função do usuario_model para adicionar
		$this->usuario->cadastroUsuario($dados);

		redirect('Usuario');
	}

	public function atualizar($id = null){ //Metodo utilizado para verificar os dados para realizar o update
		$this->verificarSession();

		//Verifica se foi passado um id
		if($id == null){
			redirect('usuario');
		}

		//Carrega a model usuario
		$this->load->model('Usuario_model','usuario');

		//Faz uma consulta no banco de dados para ver se existe
		$query = $this->usuario->getUsuarioByID($id);

		//Verifica se a query retorna registro, se não vai para á página de listar usuarios
		if($query == null){
			redirect('usuario');
		}

		//Criamos um array onde vamos guardar os dados e depois passar para a view
		$dados['usuario'] = $query;

		//carrega a view
		$this->load->view('include/header');
		$this->load->view('admin/editar-usuario', $dados);
	}
	
	public function salvar_atualizacao(){ //metodo de cadastro da atualização
		$this->verificarSession();
		//Carregamento do model de usuario
		$this->load->model('Usuario_model','usuario');
		//pega os dados do post e guarda no array $dados
		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');
		$dados['user'] = $this->input->post('user');
		$dados['senha'] = md5($this->input->post('senha'));
		$dados['status'] = $this->input->post('status');
		$dados['nivel'] = $this->input->post('nivel');


		if($this->input->post('id') != null){
			//Se foi passado, ele vai fazer a atualização no registro
			$this->usuario->editarUsuario($dados, $this->input->post('id'));
		} else{
			//Se não foi passado o id, ele adiciona um novo registro
			$this->usuario->cadastroUsuario($dados);
		}

		redirect('Usuario');
	} 

	public function apagar($id = null){
		$this->load->model('Usuario_model','usuario');
		if($this->usuario->delete($id)){
			redirect('Usuario');
		}
	}
}
