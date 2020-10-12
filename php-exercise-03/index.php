<!DOCTYPE html>
<?php
function palindrome($str){
$str =strtolower($str);
if(strrev($str)==$str){
    return "true";
}else{
    return "false";
}

}





?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?=palindrome(@$_GET["q"])?>
</body>
</html>