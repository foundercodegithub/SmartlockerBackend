<?php include('header.php'); ?>
<div class="left-side-bar"  style="background-color:#ec1f60; ">
		<div class="brand-logo"  style="background-color:#ec1f60;">
			<a href="#">
				<img src="<?php echo base_url() ?>assets/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				&nbsp;&nbsp;
				<img src="<?php echo base_url() ?>assets/vendors/images/ladli.jpeg" alt="" class="light-logo" style="height: 50px; border-radius: 10px;">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll" style="background-image:linear-gradient(to down,#ec1f60,#9c369a);">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="index" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
						
					</li>
				
					<!--<li class="dropdown">-->
					<!--	<a href="adminlist" class="dropdown-toggle">-->
					<!--		<span class="micon dw dw-user"></span><span class="mtext">Admin Users</span>-->
					<!--	</a>-->
						
					<!--</li>-->
						<li>
						<a href="#" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-copy"></span><span class="mtext">Districtwise Crime Analytics</span>
						</a>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<span class="micon dw dw-copy"></span><span class="">Citywise Crime Analytics</span>
						</a>
					
					</li>
						<li>
						<a href="#" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-copy"></span><span class="mtext">Zipwise Age Analytics</span>
						</a>
					</li>
					</li>
						<li>
						<a href="#" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-copy"></span><span class="mtext">Zipwise Crime Analytics</span>
						</a>
					</li>
						 <!--<li class="nav-item">-->
              
       <!-- <a href="<?php echo base_url();?>project/crimetype" style="color:white; margin-left:20px"><i class='fas fa-clone'></i>                 -->
       <!--<span style="font-size: 14px;">Districtwise Crime Analytics </span> </a>-->
                
       <!--     </li></br>-->
						<li class="">
						<a href="index2" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class=""> App User</span>
						</a>
					
					</li>
					<!--<li class="dropdown">-->
					<!--	<a href="fetch_email" class="dropdown-toggle">-->
					<!--		<span class="micon dw dw-user"></span><span class="mtext"> Emails</span>-->
					<!--	</a>-->
						
					<!--</li>-->
					<li >
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="">Hotspot</span>
						</a>
						<ul class="submenu">
							
							<li><a href="crime_view">Crime Report by Manual</a></li>
							<li><a href="crime_by_map">Crime report by map</a></li>
						</ul>

					
					</li>
					<!--	<li>-->
					<!--	<a href="location" class="dropdown-toggle no-arrow">-->
					<!--		<span class="micon dw dw-copy"></span><span class="mtext">Location</span>-->
					<!--	</a>-->
					<!--</li>-->
					
				
					
				
					
				</ul>
			</div>
		</div>
	</div>
