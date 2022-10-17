<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\MySQL\GerenciadorDeLojas\{UsuariosDao,TokenDao};
//use App\Models\MySQL\GerenciadorDeLojas\UsuarioModel;
use App\Models\MySQL\GerenciadorDeLojas\{TokenModel,UsuarioModel};

use Firebase\JWT\JWT;

final class AuthController{ // Ngm herda
	public function login(Request $request, Response $response, array $args): Response{
		
		$data = $request->getParsedBody();
		
		$email = $data["email"];
		$senha = $data["senha"];
		$expiredDate = $data["expiracao"];
		
		$usuarioDao = new UsuariosDao();
		$usuario = $usuarioDao->getUserByEmail($email);
		
		if(is_null($usuario)){
			return $response->withStatus(401);
		}
		
		if(!password_verify($senha, $usuario->getSenha())){
			return $response->withStatus(401);
		}
		
		//$expired_at = (new \DateTime())->modify('+ 2 days')->format('Y-m-d H:i:s');
		
		$tokenPayLoad = [
			'sub'=>$usuario->getId(),
			'name'=>$usuario->getNome(),
			'email'=>$usuario->getEmail(),
			'expired_at'=>$expiredDate
		];
		
		$token = JWT::encode($tokenPayLoad, getenv('JWT_SECRET_KEY'));
		
		$refreshTokenPayload = [
			'email' => $usuario->getEmail(),
			'ramdom'=>uniqid()
		];
		$refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));
		
		$tokenModel = new TokenModel();
		$tokenModel->setExpiredAt($expiredDate)
		->setRefreshToken($refreshToken)
		->setToken($token)
		->setUsuariosId($usuario->getId());
		
		$TokenDao = new TokenDao();
		$TokenDao->createToken($tokenModel);
		
		$response = $response->withJson([
			"token"=>$token,
			"refresh_token"=>$refreshToken
		]);
		
		return $response;
	}

}
?>