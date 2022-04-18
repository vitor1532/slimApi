<?php

use Slim\Http\Request;
use Slim\Http\Response;

//CORS OPTIONS
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

// Routes

require __DIR__ . '/routes/auth.php';

require __DIR__ . '/routes/produtos.php';


//CORS MAP
/*trata e exibe mensagem do slim para pagina não encontrada*/
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});

?>