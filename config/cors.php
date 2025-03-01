<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    | Você pode especificar as rotas que devem ser acessíveis via CORS. Por
    | exemplo: ['api/*', 'sales'] ou simplesmente ['*'] para todas as rotas.
    |
    */

    'paths' => ['api/*', 'sales', 'products'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | Métodos HTTP permitidos para requisições CORS. Use ['*'] para permitir
    | todos os métodos.
    |
    */

    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Indique quais origens (domínios) podem acessar sua API. No seu caso, o
    | front-end está em http://localhost:3000.
    |
    */

    'allowed_origins' => ['http://localhost:3000'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins Patterns
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir padrões de origens permitidas.
    |
    */

    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Quais cabeçalhos HTTP são permitidos nas requisições. ['*'] permite
    | todos os cabeçalhos.
    |
    */

    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Cabeçalhos que podem ser expostos à aplicação cliente.
    |
    */

    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | Tempo máximo (em segundos) que o resultado de uma requisição CORS pode
    | ser cacheado.
    |
    */

    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Indica se as requisições podem enviar cookies ou autenticação HTTP.
    |
    */

    'supports_credentials' => false,
];
