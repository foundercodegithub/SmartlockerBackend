<html>
<head>
    <title>Ladli.com</title>
    <link href="<?php echo base_url();?>vendor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        	
        		<!-- Google Font -->
	<link href="<?php echo base_url() ?>https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/styles/core.css">-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/styles/icon-font.min.css">-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/styles/style.css">-->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <link href="<?php echo base_url();?>vendor/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #rest:hover {
            background-color:red;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img  src="<?php echo base_url(); ?>upload/ladli.jpeg" width="45%" style="border-radius:5%;margin-left:-70">
                </div>
                <!--<div class="sidebar-brand-text mx-3"></div>-->
            </a>

          
            <hr class="sidebar-divider my-0">

            
            <li class="nav-item active">
                <a class="nav-link" href="index">
                    <i class="fas fa-fw fa-tachometer-alt" style="font-size:30px; color:white;"></i>
                    <span style="font-size:20px;">Dashboard</span></a>
            </li>

           
            <hr class="sidebar-divider">

            
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
              
        <a href="<?php echo base_url();?>project/crimetype" style="color:white; margin-left:20px"><i class='fas fa-clone'></i>                 
       <span style="font-size: 14px;">Districtwise Crime Analytics </span> </a>
                
            </li></br>
            <li class="nav-item">
              
        <a href="<?php echo base_url();?>project/topcity" style="color:white; margin-left:20px"><i class='fas fa-clone'></i>                 
       <span style="font-size: 15px;">Citywise Crime Analytics</span> </a>
                
            </li></br>
            <li class="nav-item">
              
        <a href="<?php echo base_url();?>project/topage" style="color:white; margin-left:20px"><i class='fas fa-clone'></i>                 
       <span style="font-size: 15px;">Zipwise Age Analytics</span> </a>
                
            </li></br>
             <li class="nav-item">
              
        <a href="<?php echo base_url();?>project/zipcrime" style="color:white; margin-left:20px"><i class='fas fa-clone'></i>                 
       <span style="font-size: 15px;">Zipwise Crime Analytics</span> </a>
                
            </li></br>
       <!--      <li class="nav-item">-->
              
       <!-- <a href="<?php echo base_url();?>project/crimetype" style="color:white; margin-left:20px"><i class='fas fa-clone'></i>                 -->
       <!--<span style="font-size: 15px;">Crime Type Analytics</span> </a>-->
                
       <!--     </li>-->
            


            <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
              <a href="index2" style="color:white; padding-left:15px; font-size:20px;"> <i class='far fa-user' style='font-size:20px; color:white;'></i> &nbsp; &nbsp; App User</a>
               
            </li><br>
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"-->
            <!--        aria-expanded="true" aria-controls="collapseUtilities">-->
            <!--        <i class='far fa-user' style='font-size:20px; color:white;'></i> -->
            <!--        <span style="font-size:20px; color:white;">&nbsp; &nbsp;App Users</span>-->
            <!--    </a>-->
            <!--    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"-->
            <!--        data-parent="#accordionSidebar">-->
            <!--        <div class="bg-white py-2 collapse-inner rounded">-->
            <!--            <h6 class="collapse-header">App Users</h6>-->
            <!--            <a class="collapse-item" href="<?php echo base_url();?>Project/registation">Add</a>-->
            <!--            <a class="collapse-item" href="<?php echo base_url();?>Project/index2">List</a>-->
                        
            <!--        </div>-->
            <!--    </div>-->
            <!--</li>-->

            <li class="nav-item">
              <a href="fetch_email" style="color:white; padding-left:15px; font-size:20px;"><i class='fas fa-envelope' style='font-size:20px; padding:px; color:white;'></i>&nbsp; &nbsp; Email</a>
               
            </li><br>

            <!--<li class="nav-item">-->
            <!--    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebanner"-->
            <!--        aria-expanded="true" aria-controls="collapseproduct">-->
            <!--        <i class='fas fa-clone'></i>-->
            <!--        <span>Crime  Prone Areas</span>-->
            <!--    </a>-->
            <!--    <div id="collapsebanner" class="collapse" aria-labelledby="headingbanner"-->
            <!--        data-parent="#accordionSidebar">-->
            <!--        <div class="bg-white py-2 collapse-inner rounded">-->
            <!--            <h6 class="collapse-header">Crime  Prone Areas</h6>-->
            <!--            <a class="collapse-item" href="#">Add</a>-->
            <!--            <a class="collapse-item" href="#">List</a>-->
                       
            <!--        </div>-->
            <!--    </div>-->
            <!--</li>-->

            <!--<li class="nav-item">-->
            <!--    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder"-->
            <!--        aria-expanded="true" aria-controls="collapseOrder">-->
            <!--        <i class='fas fa-dolly'></i>-->
            <!--        <span>Geo Fence</span>-->
            <!--    </a>-->
            <!--    <div id="collapseOrder" class="collapse" aria-labelledby="headingOrder"-->
            <!--        data-parent="#accordionSidebar">-->
            <!--        <div class="bg-white py-2 collapse-inner rounded">-->
            <!--            <h6 class="collapse-header">Geo Fence</h6>-->
            <!--            <a class="collapse-item" href="#">Add</a>-->
            <!--            <a class="collapse-item" href="#">List</a>-->
                        
            <!--        </div>-->
            <!--    </div>-->
            <!--</li>-->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselead"
                    aria-expanded="true" aria-controls="collapselead">
                    <i class='fas fa-clone' style="color:white;"></i>
                    <span style="color:white; font-size:15px;">&nbsp; &nbsp;Crime Prone Areas</span>
                </a>
                <div id="collapselead" class="collapse" aria-labelledby="headinglead"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Crime Prone Areas</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>/Project/crime_by_map">Report by map</a>
                        <a class="collapse-item" href="<?php echo base_url();?>/Project/crime_view">Report by manual</a>
                        
                    </div>
                </div>
            </li></br>
 <li class="nav-item">
              <a href="location" style="color:white; padding-left:15px; font-size:20px;"><i class='fas fa-map-marker-alt' style='font-size:20px; padding:px; color:white;'></i>&nbsp; &nbsp; Locations</a>
               
            </li></br>
            <!-- <li class="nav-item">-->
            <!--  <a href="geofence" style="color:white; padding-left:15px; font-size:20px;"><i class='fas fa-map-marker-alt' style='font-size:20px; padding:px; color:white;'></i>&nbsp; &nbsp; Geo Fences</a>-->
               
            <!--</li>-->
            <!-- <li class="nav-item">-->
            <!--  <a href="journey" style="color:white; padding-left:15px; font-size:20px;"><i class='fas fa-map-marker-alt' style='font-size:20px; padding:px; color:white;'></i>&nbsp; &nbsp;Report journeys</a>-->
               
            <!--</li>-->
            
            <!-- <li class="nav-item">-->
            <!--    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRental"-->
            <!--        aria-expanded="true" aria-controls="collapseRental">-->
            <!--        <i class='fas fa-clone'></i>-->
            <!--        <span>Crime Reported via</span>-->
            <!--    </a>-->
            <!--    <div id="collapseRental" class="collapse" aria-labelledby="headingOrder"-->
            <!--        data-parent="#accordionSidebar">-->
            <!--        <div class="bg-white py-2 collapse-inner rounded">-->
            <!--            <h6 class="collapse-header">Report Journeys</h6>-->
            <!--            <a class="collapse-item" href="<?php echo base_url();?>/Project/repotadd">Crime report by manaul</a>-->
            <!--            <a class="collapse-item" href="<?php echo base_url();?>/Project/repotlist">Crime Reprot by7 map</a>-->
                       
            <!--        </div>-->
            <!--    </div>-->
            <!--</li>-->


            
             
            <!-- Divider -->
            <hr class="sidebar-divider">

           
           

        </ul>
        <!-- End of Sidebar -->