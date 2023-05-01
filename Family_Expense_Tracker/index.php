<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from preschool.dreamguystech.com/html-template/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:39 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Preskool - Login</title>
      <link rel="shortcut icon" href="StudentPages/assets/img/favicon.png">
      <link rel="stylesheet" href="StudentPages/https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="StudentPages/assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="StudentPages/assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="StudentPages/assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="StudentPages/assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper login-body">
         <div class="login-wrapper">
            <div class="container">
               <div class="loginbox">
                  <div class="login-left">
                  </div>
                  <div class="login-right">
                     <div class="login-right-wrap">
                        <h1>Login</h1>
                        <form action="log.php" method="POST" >
                        <?php
               if(isset($_GET["error"])){ 
               ?>
               <p class="error" ><?php echo $_GET["error"] ; ?></p>
               <?php } ?>
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Email" name="email" required>
                           </div>
                           <div class="form-group">
                              <input class="form-control" type="password" placeholder="Password" name="password" required>
                           </div>
                           <div class="form-group">
                              <input value='User log in' class="btn btn-primary btn-block" type="submit" name="Loginuser">
                           </div>
                           <div class="form-group">
                              <input value='SubUser log in' class="btn btn-primary btn-block" type="submit" name="Loginsubuser">
                           </div>
                           <a href="register.php"> Register</a>;
                        </form>


                       
                     </div>
                  </div>
               </div>

             
               
               <style>
               .error{
                  background: #f2dede;
                  color:#a94442;
                  padding: 10px;
                  width:95%;
                  border-radius: 5px;
                  margin:20px auto;
               }
            </style>
            </div>
         </div>
      </div>
      <script src="StudentPages/assets/js/jquery-3.6.0.min.js"></script>
      <script src="StudentPages/assets/js/popper.min.js"></script>
      <script src="StudentPages/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="StudentPages/assets/js/script.js"></script>
   </body>
   <!-- Mirrored from preschool.dreamguystech.com/html-template/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:40 GMT -->
</html>