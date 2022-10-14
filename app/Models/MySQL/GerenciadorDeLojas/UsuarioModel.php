<?php

namespace App\Models\MySQL\GerenciadorDeLojas;


final class UsuarioModel{
	
	private $id;
	private $nome;
	private $email;
	private $senha;
	
	//Getters
	public function getId():int{
		return $this->id;
	}
	public function getNome():string{
		return $this->nome;
	}
	public function getEmail():string{
		return $this->email;
	}
	public function getSenha():string{
		return $this->senha;
	}
	
	
	//Setters
	public function setNome(string $nome): UsuarioModel{
		$this->nome=$nome;
		return $this;
	}
	public function setEmail(string $email): UsuarioModel{
		$this->email=$email;
		return $this;
	}
	public function setSenha(string $senha): UsuarioModel{
		$this->senha=$senha;
		return $this;
	}public function setId(string $id): UsuarioModel{
		$this->id=$id;
		return $this;
	}
}



?>