<?php
    header('Access-Control-Allow-Origin: *') ;
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header('Access-Control-Allow-Headers: Content-Type');
    // if ($_GET['message']) {
    //     $message = $_GET['message'];
    //     echo $message;
    // }
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $email = $data['email'];
        $password = $data['password'];

        include ("../database/connectdb.php");
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $response = mysqli_query($connect, $sql);
        $result = mysqli_fetch_assoc($response);

        if ($result) {
            // if ($result['password'] !== $password) {
            //     header("Location: adminlogin.php?message=Incorrect details");
            //     echo "Incorrect details";
            //     return;
            // }
            if ($result['role'] !== "admin") {
                header("Location: adminlogin.php?message=You are not authorised to access this page");
                exit();
            }
            session_start();
            $token = bin2hex(random_bytes(16));
            $token_expires = time() + (60 * 10);
            $_SESSION['token'] = $token;
            $_SESSION['role'] = $result['role'];
            $_SESSION['email'] = $email;
            $_SESSION['tokenExp'] = $token_expires;
            // header("Location: createProduct.php");
            echo json_encode(['success'=>true,'message' => "login successful",'token'=>$token]);
        }else{
            echo json_encode(['success'=>false,'message' => 'user doesnt exist']);
            
        }
    }

?>





