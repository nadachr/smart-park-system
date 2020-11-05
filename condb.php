<?php 

    $servname = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'smartpark';
    $con = mysqli_connect($servname, $user, $pass, $dbname);

    $con -> set_charset('utf8');
    
?>