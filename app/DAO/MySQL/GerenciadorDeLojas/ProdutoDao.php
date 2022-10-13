<?php

namespace App\Dao\MySQL\GerenciadorDeLojas;
use App\Models\MySQL\GerenciadorDeLojas\ProdutoModel;

class ProdutoDao extends Conexao{
	
	public function __construct(){
		
		parent::__construct();
		
	}
	
	public function getAllProdutos(): array{
		
		$produtos = $this->pdo->query('SELECT * FROM produto')->fetchAll(\PDO::FETCH_ASSOC);
		
		return $produtos;
	}
	
	public function insertProduto(ProdutoModel $prod):void{
		$stmt = $this->pdo->prepare('INSERT INTO produto VALUES(null, :loja_id, :nome, :preco, :quantidade);');
		$stmt->execute([
			"loja_id"=>$prod->getLojaId(),
			"nome"=>$prod->getNome(),
			"preco"=>$prod->getPreco(),
			"quantidade"=>$prod->getQuantidade()
			]);
	}

	public function updateProduto(int $id, ProdutoModel $prod):void{
		$stmt = $this->pdo->prepare('UPDATE produto SET loja_id = :loja_id, nome = :nome, preco = :preco, quantidade = :quantidade WHERE id = :id');
		$stmt->execute([
			"id"=>$id,
			"loja_id"=>$prod->getLojaId(),
			"nome"=>$prod->getNome(),
			"preco"=>$prod->getPreco(),
			"quantidade"=>$prod->getQuantidade()
			]);
	}
	
	public function deleteProduto(int $id):void{
		$stmt = $this->pdo->prepare('DELETE FROM produto where id=:id');
		$stmt->execute([
			"id"=>$id
		]);
	}
	
}

?>