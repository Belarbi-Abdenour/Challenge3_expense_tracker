
<?php
 include "connexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Dashboard</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css">

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
                    <img src="assets/img/logo-small.png" alt="Logo" width="100" height="50">
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
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome <?php
                                         $userid =1 ;
                                           $sql1 = "SELECT name FROM user WHERE id = '$userid';";
                                           $result1 = mysqli_query($db,$sql1);
                                           $username = mysqli_fetch_row($result1);
                                        // Use the count of subusers as needed
                                        echo $username[0];

                                        ?></h3>
                            <ul class="breadcrumb">
                                
                                <li class="breadcrumb-item active">User Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-nine w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3>
                                        <?php
                                        $userid =1 ; 
                                          
                                           $sql = "SELECT COUNT(*) FROM subuser WHERE user_id = '$userid';";
                                           $result = mysqli_query($db,$sql);
                                           $subuser_count = mysqli_fetch_row($result);
                                        // Use the count of subusers as needed
                                        echo $subuser_count[0];

                                        ?>
                                        </h3>
                                        <h6>All Subusers</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-six w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3>
                                        <?php
                                            $userid =1 ; 
                                            $sql2 = " SELECT sum(amount) FROM revenue WHERE user_id = '$userid';";
                                            $res1 = mysqli_query($db,$sql2);
                                            $sql3 = " SELECT sum(amount)  FROM expense WHERE user_id = '$userid';";
                                            $res2 = mysqli_query($db,$sql3);
                                            $sum1 = mysqli_fetch_row($res1);
                                            $sum2 = mysqli_fetch_row($res2);
                                            $userbalnce = $sum1[0] -$sum2[0];
                                            $sql3 = " SELECT sum(amount)  FROM transfer WHERE from_user_id = '$userid';";
                                            $exp= mysqli_query($db,$sql3);
                                            $sum2 = mysqli_fetch_row($exp);
                                           $balnceglobal = -$sum2[0] + $userbalnce ;
                                        // Use the count of subusers as needed
                                        echo $balnceglobal;

                                        ?>
                                        </h3>
                                        <h6>Global balnce </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-ten w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3>
                                        <?php
                                        $userid =1 ; 
                                        
                                        $sql2 = " SELECT sum(amount) FROM revenue WHERE user_id = '$userid';";
                                        $res1 = mysqli_query($db,$sql2);
                                        $sql3 = " SELECT sum(amount)  FROM expense WHERE user_id = '$userid';";
                                        $res2 = mysqli_query($db,$sql3);
                                        $sum1 = mysqli_fetch_row($res1);
                                        $sum2 = mysqli_fetch_row($res2);
                                        $userbalnce = $sum1[0] -$sum2[0];
                                        
                                        echo $userbalnce;

                                        ?>
                                    </h3>
                                        <h6>User Balance</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                </div>


                
            </div>

            <div class="page-wrapper">
            <div class="content container-fluid">
            
            <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome <?php
                                        $subuserid = 1;
                                           include "connexion.php";
                                           $sql1 = "SELECT name FROM subuser WHERE id = '$subuserid';";
                                           $result1 = mysqli_query($db,$sql1);
                                           $username = mysqli_fetch_row($result1);
                                        // Use the count of subusers as needed
                                        echo $username[0];

                                        ?></h3>
                            <ul class="breadcrumb">
                                
                                <li class="breadcrumb-item active">Subuser Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-nine w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="db-info">
                                        <h3>
                                        <?php
                                        $subuserid =2 ; 
                                          
                                           $sql = "SELECT sum(amount) FROM transfer WHERE to_user_id = '$subuserid';";
                                           $result = mysqli_query($db,$sql);
                                           $subuser = mysqli_fetch_row($result);
                                        
                                        echo $subuser[0]*(-1);
                                        ?>
                                        </h3>
                                        <h6>Subuser Balance</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>

            <footer>
                
            </footer>

        </div>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
    <script src="assets/js/calander.js"></script>

    <script src="assets/js/circle-progress.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:43 GMT -->

</html>