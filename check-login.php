<?php 

session_start();

include 'condb.php';

if(isset($_POST['login'])){
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    $email = mysqli_real_escape_string($con, $email);
    $pass = mysqli_real_escape_string($con, $pass);

    $sql = "SELECT * FROM member WHERE mem_email = '$email'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_num_rows($result);

    if($row == 1){
        foreach($result as $mem){
            if($mem['mem_pass'] == $pass){
                $_SESSION['email'] = $mem['mem_email'];
                $_SESSION['name'] = $mem['mem_name'];
                $id = $mem['mem_id'];
                $memstt = "UPDATE member SET mem_status = b'1' WHERE mem_id = $id";
                $set = mysqli_query($con, $memstt);
                header("Location: index.php");
            }else{
                header("Location: login.php?alert=1");  
            }
        }
    }else{
        header("Location: login.php?alert=1");

    }
}

?>