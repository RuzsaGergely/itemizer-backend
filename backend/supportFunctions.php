<?php

function putResponse($code, $message)
{
    $response['message'] = $message;
    header('Content-Type: application/json');
    header("HTTP/1.1 " . $code);
    $json_response = json_encode($response);
    echo $json_response;
    exit();
}