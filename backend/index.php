<?php
require "databaseConnector.php";
include "apikeyCheck.php";

$url_parts = explode("/",$_SERVER["REQUEST_URI"]);
$request_type = $_SERVER['REQUEST_METHOD'];
$request_apikey = $_SERVER['HTTP_API_KEY'];

if(!checkApikey($request_apikey)){
    header("HTTP/1.1 401 Unauthorized");
    exit();
}


