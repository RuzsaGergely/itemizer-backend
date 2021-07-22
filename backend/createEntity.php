<?php

function createItem(){
    global $conn;
    $post_data = json_decode(file_get_contents('php://input'), true);

    if(checkIfCategoryExists($post_data["category"])){
        $stmt = $conn->prepare("INSERT INTO `items`(`category`, `name`, `qty`, `note`, `out_of_storage`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("isisi", $post_data["category"], $post_data["name"], $post_data["qty"],$post_data["note"],$post_data["out_of_storage"]);
        if($stmt->execute()){
            putResponse("201 Created", "OK!");
        } else {
            putResponse("400 Bad request", "Your query was unsuccessful. Please revise your supplied parameters!");
        }
    } else {
        putResponse("404 Not found", "Category not found!");
    }

}

function createCategory(){

}