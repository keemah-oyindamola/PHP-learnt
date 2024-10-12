<?php

if(isset($_POST['login'])){
    include "./Database/connectdb.php";
    $email = $_POST['email'];
    $pass = $_POST['password'];

    echo $email . $pass;

    $sql = "SELECT * FROM users WHERE email='$email'";
    $response = mysqli_query($connect, $sql);
    $result = mysqli_fetch_assoc($response);
    print_r($result);

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
        <form class="w-50 mx-auto px-4 py-3 shadow"  action="dan.php" method="POST">
            <input class="form-control my-3" type="email" placeholder="Email" name="email">
            <input class="form-control my-3" type="password" placeholder="*******************" name="password">
            <button class="btn btn-success my-3"  name="login">Login</button>
        </form>
    </main>
</body>
</html>