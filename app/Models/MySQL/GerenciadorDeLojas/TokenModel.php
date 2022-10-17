<?php

namespace App\Models\MySQL\GerenciadorDeLojas;


final class TokenModel{
	
	private $id;
	private $usuariosId;
	private $token;
	private $refreshToken;
	private $expiredAt;
	private $active;

	//Getters
	public function getId():int{
		return $this->id;
	}
	public function getUsuariosId():int{
		return $this->usuariosId;
	}
	public function getToken():string{
		return $this->token;
	}
	public function getRefreshToken():string{
		return $this->refreshToken;
	}
	public function getExpiredAt():string{
		return $this->expiredAt;
	}
	public function getActive():int{
		return $this->active;
	}	
	
	//Setters
	public function setId(string $id): self{
		$this->id=$id;
		return $this;
	}
	public function setUsuariosId(string $usuariosId): TokenModel{
		$this->usuariosId=$usuariosId;
		return $this;
	}
	public function setToken(string $token): TokenModel{
		$this->token=$token;
		return $this;
	}
	public function setRefreshToken(string $refreshToken): TokenModel{
		$this->refreshToken=$refreshToken;
		return $this;
	}
	public function setExpiredAt(string $expiredAt): TokenModel{
		$this->expiredAt=$expiredAt;
		return $this;
	}
	public function setActive(string $active): TokenModel{
		$this->active=$active;
		return $this;
	}
}



?>