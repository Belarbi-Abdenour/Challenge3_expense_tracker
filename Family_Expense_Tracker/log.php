<?php 

include "connexion.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $Supervisor_Mail = validate($_POST["email"]);
    $Password_User = validate($_POST["password"]);

    if (empty($Supervisor_Mail)) {
        header("Location: index.php?error=email is required");
        exit();
    } else if (empty($Password_User)) {
        header("Location: index.php?error=password is required");
        exit();
    } else {
        session_start();
        $hashed_password = md5($Password_User); 
        if(isset($_POST['Loginuser'])) {
            $flag=1;
            $sql = "SELECT * FROM user WHERE email='$Supervisor_Mail' AND password_hash='$hashed_password' ;"; // removed password check

        } elseif(isset($_POST['Loginsubuser'])) {
            $sql = "SELECT * FROM subuser WHERE email='$Supervisor_Mail' AND password_hash='$hashed_password' ;"; // removed password check
            $flag=0;

        }
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) === 1) {
            
            $row = $result->fetch_assoc();
            $user_id = $row['id']; 
         
            $_SESSION['user_id'] = $user_id;
            $_SESSION['flag']=$flag;
         
            if(isset($_POST['Loginuser'])) {
                header("Location: StudentPages");
            }
            elseif(isset($_POST['Loginsubuser'])) {
                header("Location: StudentPages/sub_user.php");          
            }
            
            
        } else {
            
                
                header("Location: index.php?error=Incorrect info");

            
            exit();
        }
    }
} else {
    header("Location: index.php?error");
    exit();
}