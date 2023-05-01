<?php 

   require 'connexion.php';
   if(isset($_GET['id'])){
      $id=$_GET['id'];
      $sql="select * from expense where id='$id'";
      $s=mysqli_query($db,$sql);
      $row=mysqli_fetch_assoc($s);

      $edescription=$row['description'];
      $eamount=$row['amount'];
      $ecategory_id=$row['category_id'];

      
   }

?>



<!DOCTYPE html>
<html lang="en">
   
   <?php include('header.php'); ?>

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
         <div class="top-nav-search">
            <form>
               <input type="text" class="form-control" placeholder="Search here">
               <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
         </div>
         <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
         </a>
         <ul class="nav user-menu">
            <li class="nav-item dropdown noti-dropdown">
               <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <i class="far fa-bell"></i> <span class="badge badge-pill">3</span>
               </a>
               <div class="dropdown-menu notifications">
                  <div class="topnav-dropdown-header">
                     <span class="notification-title">Notifications</span>
                     <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                  </div>
                  <div class="noti-content">
                     <ul class="notification-list">
                        <li class="notification-message">
                           <a href="#">
                              <div class="media">
                                 <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                       src="assets/img/profiles/avatar-02.jpg">
                                 </span>
                                 <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved
                                       <span class="noti-title">your estimate</span></p>
                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                 </div>
                              </div>
                           </a>
                        </li>
                        <li class="notification-message">
                           <a href="#">
                              <div class="media">
                                 <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                       src="assets/img/profiles/avatar-11.jpg">
                                 </span>
                                 <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">International Software Inc</span>
                                       has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                 </div>
                              </div>
                           </a>
                        </li>
                        <li class="notification-message">
                           <a href="#">
                              <div class="media">
                                 <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                       src="assets/img/profiles/avatar-17.jpg">
                                 </span>
                                 
                              </div>
                           </a>
                        </li>
                        
                     </ul>
                  
               </div>
            </li>
          
         </ul>
      </div>
      <div class="sidebar" id="sidebar">
         <div class="sidebar-inner slimscroll">
             <div id="sidebar-menu" class="sidebar-menu">
                 <ul>
                     <li class="menu-title">
                         <span>Main Menu</span>
                     </li>
                     <li class="submenu">
                         <a href="#"><i class="fas fa-user-graduate"></i> <span> Dashboard</span> <span
                                 class="menu-arrow"></span></a>
                         <ul>
                             <li><a href="index.html">Student Dashboard</a></li>
                         </ul>
                     </li>
                     <li class="menu-title">
                            <span>Management</span>
                        </li>

                        <li >
                            <a href="revenues.html"><i class="fas fa-calendar-day"></i> <span>Revenues </span></a>
                        </li>
                        <li >
                            <a href="categories.html"><i class="fas fa-calendar-day"></i> <span>Categories</span></a>
                        </li>
                        <li >
                            <a href="expenses.html"><i class="fas fa-calendar-day"></i> <span>Expenses</span></a>
                        </li>

                        <li >
                            <a href="sub_users.html"><i class="fas fa-calendar-day"></i> <span>Sub_users</span></a>
                        </li>
                    


                 </ul>
             </div>
         </div>
     </div>
      <div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header">
               <div class="row align-items-center">
                  <div class="col">
                     <h3 class="page-title"><?php 
                                 
                                 if(isset($_GET['id'])){
                                    echo "Edit expense";
                                 }else{
                                    echo "Add expense";
                                 }
                                 
                                 ?></h3>
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="students.html">User</a></li>
                        <li class="breadcrumb-item active"><?php 
                                 
                                 if(isset($_GET['id'])){
                                    echo "Edit expense";
                                 }else{
                                    echo "Add expense";
                                 }
                                 
                                 ?>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-body">
                        <form  method="POST" action="addEditEx.php?<?php if(isset($_GET['id'])){
                           echo "id=edit";
                        } ?>"  >

                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
               
                           <div class="row">
                              <div class="col-12">
                                 <h5 class="form-title"><span>Expense</span></h5>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>description</label>
                                    <input type="text" class="form-control" name="edescription" value="<?php 
                                    
                                    if(isset($_GET['id'])){
                                       echo $edescription;
                                    }
                                    
                                    
                                    ?> ">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>amount</label>
                                    <input type="text" class="form-control" name="eamount" value="<?php 
                                    
                                    if(isset($_GET['id'])){
                                       echo $eamount;
                                    }
                                    
                                    
                                    ?>">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>category_id</label>
                                    <input type="text" class="form-control" name="ecategory_id" value="<?php 
                                    
                                    if(isset($_GET['id'])){
                                       echo $ecategory_id;
                                    }
                                    
                                    
                                    ?>">
                                 </div>
                              </div>
                             
                              <div class="col-12">
                                 <button type="submit" class="btn btn-primary" name="eSubmit"><?php 
                                 
                                 if(isset($_GET['id'])){
                                    echo "Edit";
                                 }else{
                                    echo "Add";
                                 }
                                 
                                 ?></button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
   <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/js/script.js"></script>
</body>
<!-- Mirrored from preschool.dreamguystech.com/html-template/add-student.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->

</html>