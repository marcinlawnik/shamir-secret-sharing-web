<?php

use Illuminate\Http\Request;
use TQ\Shamir\Secret;

$app->get('/', function () use ($app) {
    return view(
        'index',
        [
            'version' => $app->version(),
            'status'  => null,
        ]
    );
});

$app->post('/', function (Request $request) use ($app) {
    $response = 'An error ocurred';

    // Set up post values

    $action = $request->input('action');

    // Check if action was sent

    if (!isset($action) || trim($action) == '') {
        throw new \Exception('No action specified.');
    }

    // Share

    if ($action === 'share') {
        $sharesThreshold = (string) $request->input('shares_threshold');
        $sharesAmount = (string) $request->input('shares_amount');
        $secret = (string) $request->input('secret');
        try {
            //Check if fields are not empty
            $fields = [
                'secret',
                'shares_amount',
                'shares_threshold',
            ];
            foreach ($fields as $field) {
                $fieldValue = $request->input($field);
                if (!isset($fieldValue) || trim($fieldValue) == '') {
                    throw new \Exception('All of the fields are required.');
                }
            }

            if (!filter_var($sharesThreshold, FILTER_VALIDATE_INT)
                || !filter_var($sharesAmount, FILTER_VALIDATE_INT)) {
                throw new \Exception('The threshold and amount of shares must be integers.');
            }

            if ($sharesThreshold > $sharesAmount) {
                throw new \Exception('The threshold must be lower than or equal to the amount of shares.');
            }

            $status = 'success';
            $response = Secret::share(
                $secret,
                $sharesAmount,
                $sharesThreshold
            );
        } catch (Exception $exception) {
            $status = 'error';
            $response = $exception->getMessage();
        }
    }

    // Recover

    if ($action === 'recover') {
        $shares = $request->input('shares');
        try {
            $status = 'success';
            $response = Secret::recover(array_filter($shares));
        } catch (Exception $exception) {
            $status = 'error';
            $response = $exception->getMessage();
        }
    }

    // Return response
    return view(
        'index',
        [
            'version'        => $app->version(),
            'action'         => $action,
            'status'         => (empty($status)) ? null : $status,
            'response'       => json_encode($response),
            'shareAmount'    => (empty($sharesAmount)) ? null : $sharesAmount,
            'shareThreshold' => (empty($sharesThreshold)) ? null : $sharesThreshold,
        ]
    );
});
