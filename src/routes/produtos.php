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

    $this->post('/produtos/add', function($request, $response) {

        //validar

        $dados = $request->getParsedBody();
        $produto = Produto::create( $dados );
        return $response->withJson( $produto );

    });

    //Recupera produto para determinado id
    $this->get('/produtos/lista/{id}', function($request, $response, $args) {

        $produto = Produto::findOrFail( $args['id'] );
        return $response->withJson( $produto );

    });

    //Atualiza produto para determinado id
    $this->put('/produtos/att/{id}', function($request, $response, $args) {

        $dados = $request->getParsedBody();

        $produto = Produto::findOrFail( $args['id'] );
        $produto->update( $dados );
        return $response->withJson( $produto );

    });

    //remove produto para determinado id
    $this->get('/produtos/remove/{id}', function($request, $response, $args) {

        $produto = Produto::findOrFail( $args['id'] );
        $produto->delete();
        return $response->withJson( $produto );

    });

});



?>