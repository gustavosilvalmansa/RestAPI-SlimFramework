<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\MySQL\GerenciadorDeLojas\ProdutoDao;
use App\Models\MySQL\GerenciadorDeLojas\ProdutoModel;

final class ProductController{ // Final class ngm herda
	
	public function getProdutos(Request $request, Response $response, array $args): Response{
		
		$prodDao = new ProdutoDao();
		$produtos = $prodDao->getAllProdutos();
		
		$response = $response->withJson($produtos); // Converte retorno para Json 
		

		return $response;
	}
	
	public function insertProduto(Request $request, Response $response, array $args): Response{
		
		$data = $request->getParsedBody();
		
		$prodDao = new ProdutoDao();
		$prod = new ProdutoModel();
		$prod->setLojaId($data['lojaId'])
		->setNome($data['nome'])
		->setPreco($data['preco'])
		->setQuantidade($data['quantidade']);   // Metodo encadeado, funciona pois o objeto retorna ele mesmo {$this}
		$prodDao->insertProduto($prod);

		$response = $response->withJson([
			"MESSAGE"=>"Produto Inserido"
		]);

	
		return $response;
		
	}
	
	public function updateProduto(Request $request, Response $response, array $args): Response{
		
		$data = $request->getParsedBody();
		
		$prodDao = new ProdutoDao();
		$prod = new ProdutoModel();
		
		$prod->setLojaId($data['lojaId'])
		->setNome($data['nome'])
		->setPreco($data['preco'])
		->setQuantidade($data['quantidade']);   
		$prodDao->updateProduto($data['id'], $prod);
		
		$response = $response->withJson([
			"MESSAGE"=>"Cadastro de produto atualizado"
		]);
		
		return $response;
	}
	
	public function deleteProduto(Request $request, Response $response, array $args): Response{
		
		$data = $request->getParsedBody();
		
		$prodDao = new ProdutoDao();
		$prodDao->deleteProduto($data['prodId']);
		
		$response = $response->withJson([
			"message"=>"Produto Excluido com sucesso"
		]);
		

		return $response;		
		
	}
	
	
}


?>