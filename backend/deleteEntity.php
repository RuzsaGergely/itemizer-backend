<?php

function deleteItem($id){
    global $conn;

    $stmt = $conn->prepare("DELETE FROM `items` WHERE `id`=?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()){
        putResponse("200 OK", "Item deleted!");
    } else {
        putResponse("400 Bad request", "Your query was unsuccessful. Please revise your supplied parameters!");
    }
}

function deleteCategory($id){
    global $conn;

    if(checkIfCategoryExistsByID($id)){
        $stmt = $conn->prepare("DELETE FROM `categories` WHERE `id`=?");
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            categoryCleanup($id);
            putResponse("200 OK", "Category deleted!");
        } else {
            putResponse("400 Bad request", "Your query was unsuccessful. Please revise your supplied parameters!");
        }
    } else {
        putResponse("404 Not found", "Category not found!");
    }
}

function categoryCleanup($id_to_check){
    global $conn;
    $stmt = $conn->prepare("UPDATE `items` SET `category`=0 WHERE `category`=?");
    $stmt->bind_param("i", $id_to_check);
    $stmt->execute();
}