<?php

use TQ\Shamir\Secret;

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
            'version' => $app->version(),
            'status' => null
        ]
    );
});

$app->post('/', function () use ($app) {

    // Check if action was sent

    if(!isset($_POST['action']) || trim($_POST['action']) == '') {
        throw new \Exception('No action specified.');
    }

    // Share

    if ($_POST['action'] === 'share') {
        $action = 'share';

        try {

            //Check if fields are not empty
            $fields = [
                'secret',
                'shares_amount',
                'shares_threshold'
            ];
            foreach ($fields as $field) {
                if(!isset($_POST[$field]) || trim($_POST[$field]) == ''){
                    throw new \Exception('All of the fields are required.');
                }
            }

            if(!filter_var($_POST['shares_threshold'], FILTER_VALIDATE_INT)
                || !filter_var($_POST['shares_amount'], FILTER_VALIDATE_INT)) {
                throw new \Exception('The threshold and amount of shares must be integers.');
            }

            if($_POST['shares_threshold'] > $_POST['shares_amount']) {
                throw new \Exception('The threshold must be lower than or equal to the amount of shares.');
            }

            $status = 'success';
            $response = Secret::share(
                $_POST['secret'],
                $_POST['shares_amount'],
                $_POST['shares_threshold']
            );

        } catch (Exception $e) {
            $status = 'error';
            $response = $e->getMessage();
        }

    }
    
    // Recover

    if ($_POST['action'] === 'recover') {
        $action = 'recover';
        try {
            $status = 'success';
            $response = Secret::recover(array_filter($_POST['shares']));
        } catch (Exception $e) {
            $status = 'error';
            $response = $e->getMessage();
        }
    }
    
    // Return response
    return view('index',
        [
            'version' => $app->version(),
            'data' => json_encode($_POST),
            'action' => $action,
            'status' => (empty($status)) ? null : $status,
            'response' => json_encode($response),
            'shareAmount' => (empty($_POST['shares_amount'])) ? null : $_POST['shares_amount'],
            'shareThreshold' => (empty($_POST['shares_threshold'])) ? null : $_POST['shares_threshold']
        ]
    );
});
