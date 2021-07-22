<?php
// BOOLEAN --> 0 false; 1 true

function checkApikey($apikey){

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM `api_keys` WHERE `apikey`=?");
    $stmt->bind_param("s", $apikey);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        if($row["status"] == "valid"){
            return true;
        } else {
            return false;
        }
    }
    return false;
}

function checkIfCategoryExists($category){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM `categories` WHERE `id`=?");
    $stmt->bind_param("i", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        return true;
    }
    return false;
}