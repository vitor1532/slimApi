<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

// Routes
// ORM -> Object Relational Mapper (Mapeador de objeto relacional)
// Illuminate -> é o motor da base de dados Laravel, sem o laravel
// Eloquent ORM

$app->group('/api/v1', function() {

    $this->get('/produtos/lista', function($request, $response) {

        $produtos = Produto::get();
        return $response->withJson( $produtos );

    });

});

?>