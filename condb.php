<?php 

    $servname = 'localhost';
    $user = 'root';
    $pass = '@Mm201036';
    $dbname = 'Smartpark';
    $con = mysqli_connect($servname, $user, $pass, $dbname);

    $con -> set_charset('utf8');
    
?>
