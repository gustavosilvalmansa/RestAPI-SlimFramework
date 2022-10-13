<?php

use function src\{slimConfiguration,basicAuth}; // Disponivel a partir do PHP 7.4, se utilizar versão inferior: Separe as classes
use App\Controllers\ProductController;
use App\Controllers\LojaController;
use Tuupola\Middleware\HttpBasicAuthentication;

$app = new \Slim\App(slimConfiguration());

// Workspace
 //Rotas agrupadas sem rota pai definida
$app->group('', function() use ($app){
	$app->get('/loja' , LojaController::class . ':getLojas');	
	$app->post('/loja', LojaController::class . ':insertLoja');
	$app->put('/loja', LojaController::class . ':updateLoja');
	$app->delete('/loja', LojaController::class . ':deleteLoja');


	$app->get('/produto' , ProductController::class . ':getProdutos');
	$app->post('/produto', ProductController::class . ':insertProduto');
	$app->put('/produto', ProductController::class . ':updateProduto');
	$app->delete('/produto', ProductController::class . ':deleteProduto');	
})->add(basicAuth());

//End  of worspace
$app->run();


/* comments about SlimASpp

## Duas funções funcionam igual ## 
$app->get('/', '\App\Controllers\ProductController:getProducts');
$app->get('/', ProductController::class . ':getProducts');  ProductController:class retorna string com namespace e classe


## Maneira simples de adicionar Middleware a rota ## 
$app->get('/loja' , LojaController::class . ':getLojas')->add(new HttpBasicAuthentication(["users"=>["root"=>"teste123"]]));


## Rotas sem agrupamento ## 
$app->get('/loja' , LojaController::class . ':getLojas')->add(basicAuth());	
$app->post('/loja', LojaController::class . ':insertLoja');
$app->put('/loja', LojaController::class . ':updateLoja');
$app->delete('/loja', LojaController::class . ':deleteLoja');


$app->get('/produto' , ProductController::class . ':getProdutos');
$app->post('/produto', ProductController::class . ':insertProduto');
$app->put('/produto', ProductController::class . ':updateProduto');
$app->delete('/produto', ProductController::class . ':deleteProduto');

*/

?>