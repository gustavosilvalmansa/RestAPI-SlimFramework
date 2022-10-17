<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class JwtDateTimeMiddleware 
{
	private $request;
	private $response;
	private $next;
	
	
	
	public function __invoke(Request $request, Response $response, callable $next): Response
	{
		$token = $request->getAttribute('jwt');
		$expiredDate = new \DateTime($token["expired_at"]);
		$now = new  \DateTime();
		if($expiredDate < $now){
			return $response->withStatus(401);
		}else{
		$response = $next($request, $response);
		return $response;
	}
}
}
?>