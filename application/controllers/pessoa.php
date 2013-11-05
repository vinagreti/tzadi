<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pessoa extends Controller {

	private $nome;
	private $cpf;
	private $sexo;

	function __construct()
	{
	  parent::Controller();
	}

	public function __set($campo,$valor){
	    $this->$campo = $valor;
	}

	public function get($campo){
	    return $this->$campo;
	}

	function index(){
	
		$data = array();

		$joao = new pessoa();
		$joao->nome = "JOAO";
		$joao->sexo = "M";
		$joao->cpf = "123.456.789-00";

		$leticia = new pessoa();
		$leticia->nome = "LETICIA";
		$leticia->sexo = "F";
		$leticia->cpf = "987.654.321-99";

		$data['joao']['nome'] = $joao->nome;
		$data['joao']['sexo'] = $joao->sexo;
		$data['joao']['cpf'] = $joao->cpf;

		$data['leticia']['nome'] = $leticia->nome;
		$data['leticia']['sexo'] = $leticia->sexo;
		$data['leticia']['cpf'] = $leticia->cpf;

		$this->load->view('pessoa',$data);
	}
}