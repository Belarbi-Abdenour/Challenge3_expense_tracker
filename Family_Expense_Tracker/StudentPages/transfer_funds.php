<?php
include "connexion.php";
session_start();
$flag = $_SESSION['flag'];
$id = $_SESSION['user_id'];
$select_sub = mysqli_query($db,"SELECT * FROM subuser WHERE user_id = $id;");
if(isset($_POST['sub'])){
if($flag==1){


      $sub_id = $_POST['id_sub'];
      $money = $_POST['money'];
      mysqli_query($db,"INSERT INTO `transfer` VALUES(NULL,$money,$id,$sub_id);");
      mysqli_query($db,"INSERT INTO `revenue` VALUES('','fund from user ',$money,1,$sub_id)");
      mysqli_query($db,"INSERT INTO `expense` VALUES(NULL,'expense given to subuser',$money,1,$id)");
      header("reload:0");
   
   
} else{
   $money = $_POST['money'];  
   $user_select = mysqli_query($db,"SELECT user_id FROM subuser WHERE id =$id ");
   $user_id = mysqli_fetch_row($user_select);
   $user_id = $user_id[0];
   $money = $money*(-1);
   mysqli_query($db,"INSERT INTO `transfer` VALUES(NULL,$money,$user_id,$id);");
   header("reload:0");
   }
}



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


    <?php 
    if($flag==1){
       echo '<div class="sidebar" id="sidebar">
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
</div>';}else{

              echo '
              <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
              <ul>
              <li><a href="sub_user.php">User Dashboard</a></li>
          </ul>
              <li >
                    <a href="transfer_funds.php"><i class="fas fa-calendar-day"></i> <span>transfer_funds</span></a>
                </li>
                </div>
                </div>
            </div>';

} ?>

         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Students</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active">Students</li>
                        </ul>
                     </div>
                     <div class="col-auto text-right float-right ml-auto">
                        <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                        
                           <div class="table-responsive">
                           
                           <?php
                           if($flag==1){
echo '<form method="post">
          <table class="table table-hover table-center mb-0 datatable">
            <thead>
              <tr>
                <th>sub_user ID</th>
                <th>sub_user name</th>
                <th>sub user email</th>
              </tr>
            </thead>
            <tbody>';
while($row=mysqli_fetch_assoc($select_sub)){
    echo '<tr>
            <td>'.$row['id'].'</td>
            <td>
              <h2 class="table-avatar">
                <a href="#">'.$row['name'].'</a>
              </h2>
            </td>
            <td>'.$row['email'].'</td>
          </tr>';
}
echo '</tbody>
      </table>
      <input type="text" placeholder="enter id of sub_user" name="id_sub">
      <input type="text" placeholder="Money To transfer" name="money">
      <input type="submit" value="transfer" name="sub">
    </form>';
} else{

   echo '<form method="post"><input type="text" placeholder="Money To transfer To Owner" name="money">
   <input type="submit" value="transfer" name="sub"></post>';
}
?>
    
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer>
               <p>Copyright © 2020 Dreamguys.</p>
            </footer>
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