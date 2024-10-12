<?php
        header('Access-Control-Allow-Origin: *') ;
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header('Access-Control-Allow-Headers: Content-Type');

    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        include("./database/connectdb.php");

        $product_name = $data['product_name'];
        $product_price = $data['product_price'];
        $qty = $data['quantity'];

        $sql = "INSERT INTO carts (product_name, product_price, quantity) VALUES ('$product_name', '$product_price', '$qty') ";

        if (mysqli_query($connect, $sql)) {
            echo json_encode(['message' => 'Registration successful']);
            
        }else{
            echo json_encode(['message' => 'Invalid data received']);

        }
    }

?>