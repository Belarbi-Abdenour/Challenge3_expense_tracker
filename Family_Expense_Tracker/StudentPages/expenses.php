<?php

   require 'connexion.php';
   $re= "select * from expense";
   $q=mysqli_query($db,$re);

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
                            <ul>
                                <li><a href="index.php">Sub_User Dashboard</a></li>
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
                        <h3 class="page-title">Expense</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active">User</li>
                        </ul>
                     </div>
                     <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                        <a href="add-expense.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-hover table-center mb-0 datatable">
                                 <thead>
                                    <tr>
                                       <th>ID_expense</th>
                                       <th>description</th>
                                       <th>amount</th>
                                       <th>category_id (to change later as select or searchbox)</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    
                                 <?php
                                       while($rows=mysqli_fetch_assoc($q)){
                                          $id = $rows['id'];
                                       
                                 ?>
                                    <tr>

                                       <td><?php echo $rows['id']; ?></td> <!-- Id -->

                                       <td>
                                       <?php echo $rows['description']; ?>
                                       </td>

                                       <td>
                                       <?php echo $rows['amount']; ?>
                                       </td>

                                       <td>
                                       <?php echo $rows['category_id']; ?>
                                       </td>
                                       
                                       
                                       <td class="text-right">
                                          <div class="actions">
                                          <?php echo "<a href='add-expense.php?id=".$id."' class='btn btn-sm bg-success-light mr-2'>
                                             <i class='fas fa-pen'></i>
                                             </a>
                                          "?>
                                            <?php echo " <a href='edelete.php?id=".$id."' class='btn btn-sm bg-danger-light'  >
                                             <i class='fas fa-trash'></i>
                                             </a>
                                             "?>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php
                                          }
                                    ?>
                                    
                                 </tbody>
                              </table>
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