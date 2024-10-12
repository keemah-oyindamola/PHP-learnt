<?php
include("./database/connectdb.php");

if (isset($_POST['register'])) {
    if (empty($_POST['first_name'])) {
        // header("Location: forms.php?error= First name is required");
        die("Firstname is required");
    };
    if (empty($_POST['last_name'])) {
        // header("Location: forms.php?error= Last name is required");
        die("lastname is required");
    }
    if (empty($_POST['email'])) {
        // header("Location: forms.php?error= Email is required");
        die("email is required");
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Must be a valid Email");
    }
    if (empty($_POST['password'])) {
        // header("Location: forms.php?error= Password is required");
        die("password is required");
    }
    if (strlen($_POST['password']) <8) {
        die("password mmust not be less than 8");
    }
    if (!preg_match('/[a-z]/i' , $_POST['password'])) {
        die("password must contain an alphabet");
    }
    // if (!preg_match('/^(')) {
    //     # code...
    // }

    // if (empty($_POST['confirm_password'])) {
    //     // header("Location: forms.php?error= Confirm Password is required");
    //     die("confirm password is required");
    // }

    if ($_POST['confirm_password'] !== $_POST['password']) {
        // header("Location: forms.php?error= Confirm Password and Password must match");
        die(" Confirm Password and Password must match");
    }

    $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    echo $hashpassword;
    $first_name = mysqli_escape_string($connect, $_POST['first_name']);
    $last_name = mysqli_escape_string($connect, $_POST['last_name']);
    $email = mysqli_escape_string($connect, $_POST['email']);

    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUE ('$first_name', '$last_name',' $email', '$hashpassword')";
    $res = mysqli_query($connect, $sql);
    if ($res) {
        echo "data saved";
        header("Location: loggin.php");
    }else{
        if (mysqli_errno($connect) === 1062) {
            echo "Email already in use. Please try another one";
        }else{
            echo "Error". mysqli_error($connect) . mysqli_errno($connect);
        }
    }

    $sql = "UPDATE";
    $sql = "DELETE";
   
}

// echo "My First name is " . $first_name . "<br/>";
// echo "My Last name is " . $last_name . "<br/>";
// echo "My Last name is " . $email . "<br/>";
// echo "My Last name is " . $password . "<br/>";




?>