<?php
include "connexion.php";
session_start();
$flag = $_SESSION["flag"];
$id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/revenues.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Holiday</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>



            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>


            

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
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM revenue WHERE user_id =$user_id ";
        $result = mysqli_query($db, $sql);
        ?>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Revenues</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Revenues</li>
                            </ul>
                        </div>
                        <div class="col-auto text-right float-right ml-auto">
                            <a href="add-revenue.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="table-responsive">
                            <?php
                           if (mysqli_num_rows($result) > 0) {
                            echo '
                              <table class="table table-hover table-center mb-0 datatable">
                                 <thead>
                                    <tr>
                                       <th>description</th>
                                       <th>amount</th>
                                       <th>category_id (to change later as select or searchbox)</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody> '; 

                                   
  while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
            <td>' . $row["description"] . '</td>
            <td>' . $row["amount"] . '</td>
            <td>' . $row["category_id"] . '</td>
            <td class="text-right">
              <a href="edit-revenue.php?id=' . $row["id"] . '" class="btn btn-sm bg-success-light mr-2">
              <i class="fas fa-pen"></i></a>| 

              <a href="delete-revenue.php?id=' . $row["id"] . '" class="btn btn-sm bg-danger-light"><i class="fas fa-trash"></i></a>
            </td>
          </tr>';
  }

  echo '</tbody></table>';
} else {
  echo "No records found";
}

// Close the connection
mysqli_close($db);
?>

                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

                <div class="modal fade none-border" id="my_event">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Event</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>

                            
                           
    </div>
    
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/revenues.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:57 GMT -->

</html>