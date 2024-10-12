<?php
   header('Access-Control-Allow-Origin: *') ;
   header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
   header('Access-Control-Allow-Headers: Content-Type');

   session_start();
   include("./database/connectdb.php");
   $sql = "SELECT * FROM products";
   $rez = mysqli_query($connect, $sql);

   if ($rez) {
        $rez= mysqli_fetch_all($rez, MYSQLI_ASSOC);
        echo json_encode($rez);
   }
?>