<?php
    if (isset($_POST['message'])) {
        $message = $_GET['message'];
        echo $message;
    }
    include("./database/connectdb.php");
    if (isset($_POST['login'])) {
        // $email= mysqli_escape_string($connect, $_POST['email']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $password= mysqli_escape_string($connect, $_POST['password']);
        echo $email;
        echo $password;
        $sql = "SELECT * FROM users WHERE email='$email'";
        $response = mysqli_query($connect, $sql);
        $result = mysqli_fetch_assoc($response);
        if ($result) {
            print_r($result);
            // if (password_verify($password, $result['password'])) {
                if ($password === $result['password']) {
                // print_r($result);
                echo ("Login successful");
                header("Location:dashboard.php");
                session_start();
                $token = bin2hex(random_bytes(16));
                $token_expires = time() + (60 * 10);
                $_SESSION['token'] = $token;
                $_SESSION['email'] = $email;
                $_SESSION['tokenExp'] = $token_expires;

                
            }else{
                die ("Invalid password");
            }

        }else{
            die ("Account does not exist");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main>
        <form class="w-50 mx-auto px-4 py-3 shadow"  action="loggin.php" method="POST">
            <input class="form-control my-3" type="email" placeholder="Email" name="email">
            <input class="form-control my-3" type="password" placeholder="*******************" name="password">
            <button class="btn btn-success my-3"  name="login">Login</button>
        </form>
    </main>
</body>
</html>