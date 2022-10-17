<?php

namespace App\Dao\MySQL\GerenciadorDeLojas;
use App\Models\MySQL\GerenciadorDeLojas\TokenModel;

class TokenDao extends Conexao{
	
	public function __construct(){
		
		parent::__construct();
		
	}
	
	public function createToken(TokenModel $token):void{
		
		$stmt = $this->pdo->prepare('INSERT INTO tokens
			(token,
			refresh_token,
			expired_at, 
			usuarios_id) 
			VALUES 
			(:token, 
			:refresh_token, 
			:expired_at, 
			:usuarios_id );
		');
		$stmt->execute([
		'token'=>$token->getToken(),
		'refresh_token'=>$token->getRefreshToken(),
		'expired_at'=>$token->getExpiredAt(),
		'usuarios_id'=>$token->getUsuariosId()
		]);
		
	}
	
}

?>