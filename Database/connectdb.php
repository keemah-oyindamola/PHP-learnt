<?php
    $connect = mysqli_connect("localhost", "root", "", "phpclass");

    if (!$connect) {
        echo "Database not  connected";
        die(mysqli_connect_error() . 'error');
    }
?>