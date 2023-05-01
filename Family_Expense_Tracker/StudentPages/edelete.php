<?php 


    require 'connexion.php';
    $id=$_GET['id'];
    $sql="DELETE FROM `expense` WHERE id = '$id' ";
    $qu = mysqli_query($db,$sql);

    if(isset($qu)){
        header('Location : expenses.php');
    }else{
        echo "delete error";
    }


?>