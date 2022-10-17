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
	public function verifyRefreshToken(string $refreshToken): bool {
		
		$stmt = $this->pdo->prepare("SELECT * FROM tokens WHERE refresh_token = :refresh_token");
		$stmt->bindParam('refresh_token',$refreshToken);
		$stmt->execute();
		
		$tokens = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		//return $count($tokens) === 0 ? false : true;
		if(count($tokens) === 0){
			return false;
		} else{
			return true;
		}
		
	}
}

?>