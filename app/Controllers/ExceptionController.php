<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


final class ExceptionController{ // Ngm herda

	public function test( Request $request, Response $response, array $args): Response
	{
		try{
		throw new \Exception("Mensagem de erro.");
		return $response->withJson(['msg'=>'Ok']);

		} catch(\Exception and \Throwable $ex){
			return $response-withJson([
				"error"=>\Exception::class,
				"status"=>500,
				"code"=> "001"
				"userMessage"=>"Erro na aplicação, entre em contato com o administrador do sistema"
				"developerMessage" => $ex->getMessage()
			], 500);
		}
		
	}
}
?>