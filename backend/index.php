<?php
require "databaseConnector.php";
include "backCheck.php";
include "getEntity.php";
include "createEntity.php";
include "supportFunctions.php";

$url_parts = explode("/",$_SERVER["REQUEST_URI"]);
$request_type = $_SERVER['REQUEST_METHOD'];
$request_apikey = $_SERVER['HTTP_API_KEY'];

if(!checkApikey($request_apikey)){
    header("HTTP/1.1 401 Unauthorized");
    exit();
}

if($request_type == "GET"){
    switch ($url_parts[3]){
        case "category":
            if(!empty($url_parts[4])){
                getCategories($url_parts[4]);
            } else {
                getCategories();
            }
            break;
        case "item":
            if(!empty($url_parts[4])){
                getItem($url_parts[4]);
            } else {
                getItem();
            }
            break;
    }

} else if ($request_type == "POST"){
    switch ($url_parts[3]){
        case "category":
            break;
        case "item":
            createItem();
            break;
    }
} else if ($request_type == "DELETE"){

} else if ($request_type == "PUT"){

} else {
    header("HTTP/1.1 501 Not Implemented");
    exit();
}

