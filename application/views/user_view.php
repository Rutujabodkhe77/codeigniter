<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
</head>
<body>
    <h1>

<?php

//  echo $welcome;
//  echo $results;
 
foreach ($results as $object)
{
    echo $object->user_name."<br>";
    // echo $object->password."<br>";
}

?>

    </h1>
</body>
</html>