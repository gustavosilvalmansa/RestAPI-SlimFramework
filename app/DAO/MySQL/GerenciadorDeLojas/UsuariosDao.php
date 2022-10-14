<?php

namespace App\Dao\MySQL\GerenciadorDeLojas;
use App\Models\MySQL\GerenciadorDeLojas\UsuarioModel;

class UsuariosDao extends Conexao{
	
	public function __construct(){
		
		parent::__construct();
		
	}
	
	public function getUserByEmail(string $email): ?UsuarioModel 
	{
		$stmt = $this->pdo->prepare('SELECT id, nome, email, senha FROM usuarios WHERE email = :email');
		
		$stmt->bindParam('email', $email);
		$stmt->execute();
		$usuarios = $stmt->fetchALL(\PDO::FETCH_ASSOC);
		
		if(count($usuarios) === 0){
			return null;
		}else{
			$usuario = new UsuarioModel();
			$usuario->setId($usuarios[0]['id'])
			->setNome($usuarios[0]['nome'])
			->setEmail($usuarios[0]['email'])
			->setSenha($usuarios[0]['senha']);
			return $usuario;
		}
	}
	
}

?>