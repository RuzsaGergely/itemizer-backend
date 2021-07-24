<?php

function getItem($id=null){
    global $conn;
    $response = [];
    $stmt = null;
    if($id!=null){
        $stmt = $conn->prepare("SELECT * FROM `items` WHERE `id`=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("SELECT * FROM `items`");
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        array_push($response, array(
            "id" => $row["id"],
            "category" => $row["category"],
            "name" => $row["name"],
            "qty" => $row["qty"],
            "note" => $row["note"],
            "out_of_storage" => $row["out_of_storage"]
        ));
    }
    header('Content-Type: application/json');
    $json_response = json_encode($response);
    echo $json_response;
}

function getCategories($id=null){
    global $conn;
    $response = [];
    $stmt = null;
    if($id!=null){
        $stmt = $conn->prepare("SELECT * FROM `categories` WHERE `id`=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("SELECT * FROM `categories`");
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        array_push($response, array(
            "id" => $row["id"],
            "name" => $row["category"]
        ));
    }
    header('Content-Type: application/json');
    $json_response = json_encode($response);
    echo $json_response;
}
