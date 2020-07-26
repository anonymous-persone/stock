<?php 


use Symfony\Component\HttpFoundation\Response;


/**
 * Create new anonymous resource collection.
 *
 * @return \Illuminate\Http\Resources\Json
 */

function entityNotFound()
{
    return response([
        'status'=>'error',
        'message'=>'Entity Not Found'
    ], 404);
}

/**
 * Create new anonymous resource collection.
 *
 * @param  string  $message
 * @param  string  $code
 * @return \Illuminate\Http\Resources\Json
 */

function errorMessage($message, $statusCode)
{
    return response([
        'status' => 'error',
        'message' => $message
	],
    $statusCode);
}

function successMessage($message, $statusCode)
{
    return response([
        'status' => 'sucess',
        'message' => $message
	],
    $statusCode);
}