<?php
$names = ['femi', 'bisola', 'tola'];

// for ($i=0; $i <count($names) ; $i++) { 
//     echo ($names[$i]) . "<br/>";
// };

// foreach ($names as $key) {
//     echo $key . "<br/>";
// };

// for ($i = 0, $j = 10; $i < 10; $i++, $j--) {
//     echo "i: $i, j: $j<br>";
// }
// for ($i = 1; $i <= 3; $i++) {
//     for ($j = 1; $j <= 3; $j++) {
//         echo "i: $i, j: $j<br>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <?php include "./component/nav.html" ?>
        <h1>Welcome to PHP</h1>
        <?php foreach($names as $nnn){
            echo "<h2>" . $nnn . "<h2/>";
        }?>

        <?php include "./component/footer.html" ?>
    </main>
</body>
</html>