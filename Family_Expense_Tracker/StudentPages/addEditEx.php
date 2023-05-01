<?php

require 'connexion.php';

if(isset($_GET['id'])){

    $edescription = $_POST['edescription'];
    $eamount = $_POST['eamount'];
    $ecategory_id = $_POST['ecategory_id'];
    $id=$_POST['id'];

    $sql="Update expense set  description = '$edescription' , amount = '$eamount' , category_id = '$ecategory_id' where id='$id' ";
    $q=mysqli_query($db,$sql);

    if(isset($q)){

        header('Location : expenses.php');

    }else{
        echo "<h2> The edit faild </h2>";
    }
    
}else{
    $edescription = $_POST['edescription'];
    $eamount = $_POST['eamount'];
    $ecategory_id = $_POST['ecategory_id'];
    
    

    $requete = "INSERT INTO expense(description, amount,category_id,) VALUES ( '$edescription', '$eamount' ,'$ecategory_id')";
    
    $query = mysqli_query($db,$requete);

    if(isset($query)){

        header('Location : expenses.php');

    }else{
        echo "<h2> The addition faild </h2>";
    }

}


?>