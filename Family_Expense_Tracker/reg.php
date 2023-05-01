<?php 

include "connexion.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"])) {
    $Supervisor_name = validate($_POST["name"]);
    
    $Supervisor_Mail = validate($_POST["email"]);
    $Password_User = validate($_POST["password"]);

    if (empty($Supervisor_Mail)) {
        header("Location: loginuser.php?error=email is required");
        exit();
    } else if (empty($Password_User)) {
        header("Location: loginuser.php?error=password is required");
        exit();
    } 
    else if (empty($Supervisor_name)) {
        header("Location: loginuser.php?error=name is required");
        exit();
    } else {
        $hashed_password = md5($Password_User); 
        $sql = "SELECT * FROM user WHERE email='$Supervisor_Mail';"; 
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) === 1) {
            header("Location: loginuser.php?error=email already exists"); 
        } else {
           
            $sql = "INSERT INTO `user`(`id`, `name`, `email`, `password_hash`, `role`, `is_active`) VALUES ('NULL','$Supervisor_name','$Supervisor_Mail','$hashed_password',1,1)";
            $result = mysqli_query($db, $sql);
           
                header("Location: index.php");
            }
            exit();
        }
    }
 else {
    header("Location: loginuser.php?error");
    exit();
}