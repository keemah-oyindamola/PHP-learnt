<?php
    session_start();
    include ("./database/connectdb.php");
    echo time() . "currecnt time";
    echo $_SESSION['tokenExp'];
    
    echo "<br>";
    if (!isset($_SESSION['email']) || time()> $_SESSION['tokenExp']) {
        session_destroy();
        header("Location: loggin.php?message=Your token has expired. Kindly log in");
    }else{
        $user_email = $_SESSION['email'];
        echo $user_email;
        $sql = "SELECT * FROM users WHERE email = '$user_email'";
        $response = mysqli_query($connect, $sql);
        $result = mysqli_fetch_assoc($response);
        print_r($result);
        if ($result) {
            $name = $result['first_name'];
            $prof_pix = $result['profile'];
        }
    }
    
    if (isset($_POST['update'])) {
        $img_path = "images/";
        $file = $img_path. basename($_FILES['profile_picture']['name']);
        echo $file;
        $sql = "UPDATE users SET profile='$file' WHERE email='$user_email'";
        if (mysqli_query($connect, $sql)) {
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $file);
            echo "Profile pic updated successfully";
            header("Location: dashboard.php?message=Profile picture updated");

        }else{
            echo mysqli_error($connect). "Cannot upload image";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to your dashboard.............</h1>
    <h1> <?php echo ($name ."<br>");
    echo $user_email;
    ?></h1>

    <div>
        <img src="<?php echo $prof_pix
        ?>" alt="">
        <form action="dashboard.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="profile_picture" id="">
            <button class='btn btn-primary' name="update">Update</button>
        </form>
    </div>
</body>
</html>