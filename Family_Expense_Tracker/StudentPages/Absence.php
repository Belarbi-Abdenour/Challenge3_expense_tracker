<?php
include "connexion.php";
session_start();
$s_id = $_SESSION['s_id'];
$stmt = $db->prepare("SELECT DATE_FORMAT(Session_Start, '%Y-%m-%d') AS formatted_date, absence.absent, Class_Id, Session_End FROM absence JOIN session_ ON absence.Session_Id=session_.Session_Id WHERE Student_Id=? AND Session_End<NOW()");
$stmt->bind_param("i", $s_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/event.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Holiday</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">


    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
  <script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    dayCellDidMount: function(cell) {
      cell.el.style.width = '100px'; // set the cell width
      cell.el.style.height = '100px'; // set the cell height
    },

    events: [
           <?php  while($row=mysqli_fetch_assoc($result)){ 
            $c_id = $row['Class_Id'];
            $class_name  = mysqli_query($db,"SELECT class_name from class where Class_Id=$c_id;");
            $class_name = mysqli_fetch_row($class_name);
            $class_name = $class_name[0];
            ?> {
              title: '<?php echo "".$class_name." Status : "; if($row['absent']==1) echo "absent"; else echo "present"; ?>',

              start: '<?php 
 echo "{$row['formatted_date']}";
 ?>'
            },<?php } ?>],


            dateClick: function(info) {
      // get the clicked date and cell information
      var dateStr = info.dateStr;
      var dayEl = info.dayEl;
      var cellTitle = dayEl.getAttribute('title');
      
      // create a Bootstrap modal
      var modal = document.createElement('div');
      modal.classList.add('modal', 'fade');
      modal.innerHTML = `
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">`+cellTitle+` wiii</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>This is the cell title:</p>
              <p>${cellTitle}wiii</p>
            </div>
          </div>
        </div>
      `;
      
      // add the modal to the page and show it
      document.body.appendChild(modal);
      $(modal).modal('show');
    },



  });
  calendar.render();
});

</script>
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
                            <?php 
                                include "connexion.php";
                                $query = "SELECT  DISTINCT teacher.Teacher_LastName, teacher.Teacher_FirstName, resources.Resource_Text, Class.class_name
                                 FROM resources JOIN class ON resources.Class_Id=class.Class_Id JOIN teacher ON class.Teacher_Id=teacher.Teacher_Id ;";
                                 $send_query = mysqli_query($db,$query);
                                 while($arr = mysqli_fetch_assoc($send_query)){
                                ?>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title"><?php echo "teacher : ".$arr['Teacher_LastName']." ".$arr['Teacher_FirstName']; ?></span> has
                                                    has released a new ressource for class : <?php echo $arr['class_name'];   ?> <span class="noti-title"><?php echo $arr['Resource_Text']; ?></span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php } ?>
                
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg"
                                width="31" alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>bendi Amine</h6>
                                <p class="text-muted mb-0">Student</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
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
                        <li class="submenu">
                            <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="students.html">Student List</a></li>
                                <li><a href="student-details.html">Student View</a></li>
                                <li><a href="add-student.html">Student Add</a></li>
                                <li><a href="edit-student.html">Student Edit</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Management</span>
                        </li>

                        <li >
                            <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                        </li>
                        <li >
                            <a href="Absence.html"><i class="fas fa-calendar-day"></i> <span>Absence</span></a>
                        </li>
                        <li >
                            <a href="Resources.html"><i class="fas fa-calendar-day"></i> <span>Resources</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">



                            <div class="container">
                                <div id="calendar">
                                  
                                </div>
                            </div>

                

            </div>

        </div>

    </div>
   


    <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/jquery-ui.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/event.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:57 GMT -->

</html>


