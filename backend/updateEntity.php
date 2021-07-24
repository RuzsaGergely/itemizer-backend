<?php
function updateItem($id){
    global $conn;

    $post_data = json_decode(file_get_contents('php://input'), true);

    $item = [];

    $stmt = $conn->prepare("SELECT * FROM `items` WHERE `id`=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $item["id"] = $row["id"];
        $item["category"] = $row["category"];
        $item["name"] = $row["name"];
        $item["qty"] = $row["qty"];
        $item["note"] = $row["note"];
        $item["out_of_storage"] = $row["out_of_storage"];
    }

    if($item["category"] != $post_data["category"] && !checkIfCategoryExistsByID($item["category"])) {
        $item["category"] = $post_data["category"];
    } else {
        $item["category"] = 0;
    }
    if($item["name"] != $post_data["name"]) $item["name"] = $post_data["name"];
    if($item["qty"] != $post_data["qty"]) $item["qty"] = $post_data["qty"];
    if($item["note"] != $post_data["note"]) $item["note"] = $post_data["note"];
    if($item["out_of_storage"] != $post_data["out_of_storage"]) $item["out_of_storage"] = $post_data["out_of_storage"];

    $stmt = $conn->prepare("UPDATE `items` SET `category`=?,`name`=?,`qty`=?,`note`=?,`out_of_storage`=? WHERE `id`=? ");
    $stmt->bind_param("isisii", $item["category"], $item["name"], $item["qty"], $item["note"], $item["out_of_storage"], $id);
    print_r($item);
    if($stmt->execute()){
        putResponse("200 OK", "Item updated!");
    } else {
        putResponse("400 Bad request", "Your query was unsuccessful. Please revise your supplied parameters!");
    }
}

function updateCategory($id){
    global $conn;
}