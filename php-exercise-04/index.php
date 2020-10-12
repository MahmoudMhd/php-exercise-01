<!DOCTYPE html>
<?php 
$array = [
    'musicals' => ['Oklahoma', 'The Music Man', 'South Pacific'],
    'dramas' => ['Lawrence of Arabia', 'To Kill a Mockingbird', 'Casablanca'],
    'mysteries' => ['The Maltese Falcon', 'Rear Window', 'North by Northwest']
];
array_multisort($array,SORT_DESC);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    foreach($array as $k => $arrv){
        echo "[$k]<br>";
        foreach($arrv as $k1 => $v1){
            echo "----> $k1 = $v1 <br>";
        }
    }
    ?>
</body>
</html>