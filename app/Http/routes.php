<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return view('index',
        [
            'version' => $app->version()
        ]
    );
});

$app->post('/', function () use ($app) {

    // Share

    if ($_POST['action'] === 'share') {
        
    }
    
    // Recover

    if ($_POST['action'] === 'recover') {

    }
    
    // Return response
    return view('index',
        [
            'version' => $app->version(),
            'data' => implode($_POST, '.')
        ]
    );
});
