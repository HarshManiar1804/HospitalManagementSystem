<?php
    require_once("connection.php");
    session_start();
    if(!isset($_SESSION['un'])){
      $_SESSION['sess1']="PLEASE LOGIN FIRST....";
      //header("Location:loginfile.php");
      //die();
    }
    $query="SELECT * FROM doctorspecialization";
    $execute=mysqli_query($con,$query);
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        
.alert {
  padding: 20px;
  background-color: green;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
             <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-heartbeat" style="font-size:24px"></i>
                                <span>Aayush Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                    <i class="fa fa-user-md" style="font-size:24px"></i>
                                <span>Doctor</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="Adddoctor.php">Add Doctor</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="managedoctor.php">Manage Doctors</a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-plus-square" style="font-size:24px"></i>
                                <span>Specialization</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="Addspecialization.php">Add Specialization</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="managespecification.php">Manage Specialization</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-hospital-o" style="font-size:24px"></i>
                                <span>Appointment</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="manageappointment.php">Manage Appointment</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class='fas fa-user-alt' style='font-size:24px'></i>
                                <span>User</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="manageuseretails.php">View User</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class='fas fa-file-medical' style='font-size:24px'></i>
                                <span>Report</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="managereport.php">View Report</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <!-- Actucal Page Layout..!!!! -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Aayush Hospital</h3>
            </div>

   
    <?php 
                if (isset($_SESSION['depmsg'])) {
                  ?>
                        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong><?php echo $_SESSION['depmsg']; ?></strong></div>       
                  <?php   
                }
                unset($_SESSION['depmsg']);
                if (isset($_SESSION['deperr'])) {
                  ?>
                   <div class="alert" style="background: red">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Specialization not Added Successfully!!!!!..</strong></div> 
                  <?php
                }
                unset($_SESSION['deperr']);
              ?>
            <div class="page-content">
                <section class="row">   
                    <div class="col-md-12">
                        <table align="center" style="margin-left: 200px;">
<form method="post" action="insertspecialization.php">
       <section class="content center">
      <div class="row">
        <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Specialization</h3>

              
            </div> 

            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Specialization Name</label>
                <input type="text" name="Specialization" id="inputName" class="form-control" required="required">
              </div>
            </div>


          <div class="row">
        <div class="col-12">
        
          <input type="submit" value="Add Specialization" name="submit" class="btn btn-success float-right">
        </div>
      </div>
    </section>
       
       </form>
            </table>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
                    </div>
             </div>
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>