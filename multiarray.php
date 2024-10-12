<?php 
$users = [
    ["firstname" => "Daniel", "age"=>5, "gender" =>"Male"],
    ["firstname"=> "Samuel" , "age"=>7, "gender" =>"Male"],
    ["firstname" => "Victor", "age"=>8, "gender" =>"Male"]
];

echo $users[0]["firstname"]."<br/>";
echo $users[0]["gender"]. "<br/>";
echo $users[1]["firstname"]. "<br/>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
    </tr>
  </thead>
  <tbody>
    <?php
  foreach($users as $key=> $table){
                echo "
                    <tr>
                        <td>$key</td>
                        <td>$table[firstname]</td>
                        <td>$table[age]</td>
                        <td>$table[gender]</td>
                    </tr>
                ";
                  
            }?>
  </tbody>
</table>
    </main>
</body>
</html>