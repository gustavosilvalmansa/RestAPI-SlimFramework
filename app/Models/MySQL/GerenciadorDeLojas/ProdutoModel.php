<?php

namespace App\Models\MySQL\GerenciadorDeLojas;


final class ProdutoModel{
	
	private $id;
	private $lojaId;
	private $nome;
	private $preco;
	private $quantidade;
	
	//Getters
	public function getId():int{
		return $this->id;
	}
	public function getLojaId():int{
		return $this->lojaId;
	}
	public function getNome():string{
		return $this->nome;
	}
	public function getPreco():float{
		return $this->preco;
	}
	public function getQuantidade():int{
		return $this->quantidade;
	}
	
	
	//Setters
	
	public function setLojaId(int $lojaId): ProdutoModel{
		$this->lojaId=$lojaId;
		return $this;
	}
	
	public function setNome(string $nome): ProdutoModel{
		$this->nome=$nome;
		return $this;
	}
	public function setPreco(float $preco): ProdutoModel{
		$this->preco=$preco;
		return $this;
	}
	public function setQuantidade(int $quantidade): ProdutoModel{
		$this->quantidade=$quantidade;
		return $this;
	}
}



?>