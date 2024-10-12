<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header('Access-Control-Allow-Headers: Content-Type');

session_start();
$data = json_decode(file_get_contents('php://input'), true);

$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_category = $_POST['product_category'];
$product_description = $_POST['product_description'];
$in_stock = $_POST['in_stock'];

include("../database/connectdb.php");

$img_path = "";
if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
    $img_path = "profile_images/";
    if (!file_exists($img_path)) {
        mkdir($img_path, 0777, true);
    }
    $file_name = basename($_FILES['profile']['name']);
    $file = $img_path . $file_name;
    if (move_uploaded_file($_FILES['profile']['tmp_name'], $file)) {
        $img_path = $file;
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to upload image']);
        exit;
    }
}

$sql = "INSERT INTO products (product_name, product_price, product_category, product_desc, in_stock, product_img) 
        VALUES ('$product_name', '$product_price', '$product_category', '$product_description', '$in_stock', '$img_path')";

if (mysqli_query($connect, $sql)) {
    echo json_encode(['success' => true, 'message' => 'Product created successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error inserting product into database']);
}
?>
