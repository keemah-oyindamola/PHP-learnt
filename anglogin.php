<?php
   header('Access-Control-Allow-Origin: http://localhost:4200') ;
   header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
   header('Access-Control-Allow-Headers: Content-Type');
    
//    header('Content-Type: application/json');

   $data = json_decode(file_get_contents('php://input'), true);
   if ($data) {
    $email = $data['email'];
    $password = $data['password'];

    include("./database/connectdb.php");

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
       session_start();
       $token = bin2hex(random_bytes(16));
       $token_expire = time() + (60);
       $_SESSION['token'] = $token;
       $_SESSION['tokenExp'] = $token_expire;
       echo json_encode(['success'=>true,'message' => "login successful",'token'=>$token]);
    }else{
        echo json_encode(['success'=>false,'message' => "Invalid password or email"]);
    }

    // Close the connection
    mysqli_close($connect);
}else{
    echo json_encode(['success'=>false,'message' => 'Invalid data received']);
}
?>