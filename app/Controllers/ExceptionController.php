<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Exceptions\TestException;


final class ExceptionController{ // Ngm herda

	public function test( Request $request, Response $response, array $args): Response
	{
		try{
		//throw new \Exception("Mensagem de erro.");
		throw new TestException("Testando.");
		return $response->withJson(['msg'=>'Ok']);
		}
		catch(TestException $ex)
		{
			return $response->withJson([
				"error"=>TestException::class,
				"status"=>400,
				"code"=> "003",
				"userMessage"=>"TestException!",
				"developerMessage" => $ex->getMessage()
			], 400);
		}
		catch(\InvalidArgumentException $ex)
		{
			return $response->withJson([
				"error"=>\Exception::class,
				"status"=>400,
				"code"=> "002",
				"userMessage"=>"Preencha todos os dados!",
				"developerMessage" => $ex->getMessage()
			], 400);
		} 
		catch(\Exception | \Throwable $ex)
		{
			return $response->withJson([
				"error"=>\Exception::class,
				"status"=>500,
				"code"=> "001",
				"userMessage"=>"Erro na aplicação, entre em contato com o administrador do sistema",
				"developerMessage" => $ex->getMessage()
			], 500);
		}
		
	}
}
?>