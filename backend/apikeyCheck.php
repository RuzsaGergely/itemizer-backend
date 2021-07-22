<?php

function checkApikey($apikey){
    require "databaseConnector.php";

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