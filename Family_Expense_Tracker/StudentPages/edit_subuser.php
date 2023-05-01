<?php
include "connexion.php";
session_start();
$flag = $_SESSION['flag'];


?>

<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from preschool.dreamguystech.com/html-template/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:43 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Preskool - Students</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">

         <div class="header">

            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>



            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>




            </ul>

        </div>

        <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a href="#"><i class="fas fa-user-graduate"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php">User Dashboard</a></li>
                    </ul>
                </li>


                <li class="menu-title">
                    <span>Management</span>
                </li>

                <li >
                    <a href="revenues.php"><i class="fas fa-calendar-day"></i> <span>Revenues </span></a>
                </li>
                <li >
                    <a href="categories.php"><i class="fas fa-calendar-day"></i> <span>Categories</span></a>
                </li>
                <li >
                    <a href="expenses.php"><i class="fas fa-calendar-day"></i> <span>Expenses</span></a>
                </li>

                <li >
                    <a href="subuser.php"><i class="fas fa-calendar-day"></i> <span>Sub_users</span></a>
                </li>

                        
                <li >
                    <a href="transfer_funds.php"><i class="fas fa-calendar-day"></i> <span>transfer_funds</span></a>
                </li>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


                <li >
                    <a href="../index.php"><i ></i> <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
        <?php
include "connexion.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form inputs
  session_start();
  $getid = $_GET["id"];
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $userid = $_SESSION["user_id"];
  $active = 1;
  if(isset($_POST["is_active"])){$active = 0;}

  // Update the record in the database
  $sql = "UPDATE subuser SET name='$name', email='$email', is_active= $active , user_id= $userid , is_active= $active WHERE id=$getid ;";
  $reslt=mysqli_query($db, $sql);
  if (isset($reslt)) {
    header("location: subuser.php");
  } else {
    echo "Error updating record: " . mysqli_error($db);
  }
}

// Get the ID of the record to be edited

$id = $_GET["id"];
// Select the record from the database
$sql = "SELECT * FROM subuser WHERE id='$id'";
$result = mysqli_query($db, $sql);


if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
} else {
  echo "Error: Record not found";
  exit;
}

// Close the connection
mysqli_close($db);
?>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                  
                     
                  </div>
               </div>
               
               <title>Edit subuser</title>
            </head>
            <body>
              <h1>Edit subuser</h1>
            
              <form method="POST">
               
            
                <label for="name">name:</label>
                <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"><br>
            
                <label for="email">email:</label>
                <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>"><br>

                <label for="is_active">block</label>
                <input type="checkbox" <?php if($row["is_active"] == 0){echo 'checked';}else{ echo '';}?> name="is_active" >
            
                
                <input type="submit" id="is_active" value="Update">
              </form>
              <style>
  form {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
  }

  label {
    font-weight: bold;
    margin-bottom: 10px;
  }

  input[type="text"] {
    padding: 10px;
    margin-bottom: 20px;
    border: 2px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
  }

  input[type="submit"]:hover {
    background-color: black;
  }
</style>
         </div>
      </div>

      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/plugins/datatables/datatables.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
   <!-- Mirrored from preschool.dreamguystech.com/html-template/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:49 GMT -->
</html>