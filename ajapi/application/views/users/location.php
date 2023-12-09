<?php include('header.php'); ?>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<!--<div class="close-sidebar" data-toggle="right-sidebar-close">-->
			<!--	<i class="icon-copy ion-close-round"></i>-->
			<!--</div>-->
		</div>
			<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	
	
<?php include('sidebar.php'); ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							
						</div>
						<div class="col-md-6 col-sm-12 text-right">						</div>
					</div></br></br>
				
				<!-- Checkbox select Datatable End -->
				<!-- Export Datatable start -->
				<div class="card-box mb-30" style="background-image: linear-gradient(to right,#f36523,#9c369a); ">
					<div class="pd-20">
						<h1  style="color:white;">Location  List</h1>
					</div>
				</br></br>
				<!--<div class="crime_add" style="padding:20px;">-->
				<!--	     <a href="add_crime"><button class="btn btn-primary" style="float:right; margin-top:-20px;">Add +</button></a></div>-->
					<div class="pb-20">
					   
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
				<th scope="col">id</th>
				<th scope="col">App User</th>
				<th scope="col">Address </th>
				<th scope="col">City</th>
				<th scope="col">District</th>
				<th scope="col">State </th>
				<th scope="col">Country</th>
				<th scope="col">Zipcode</th>
				<th scope="col">Crime  </th>
				<th scope="col">Incedent_type</th>
				<th scope="col">R_type</th>
				<!--<th scope="col">Created at</th>-->
				<!--<th scope="col">Updated at</th>-->
				<th scope="col">Action</th>
				
			</tr>
				</thead>
				<tbody>
								
		<?php foreach ($rest as $arti) { ?>
		<tr>
				
			<td scope="row"><?php echo $arti['id'] ?></td>
			<td scope="row"><?php echo $arti['uname'] ?></td>
		   <td scope="row"><?php echo $arti['address'] ?></td>
		   <td scope="row"><?php echo $arti['city'] ?></td>
		   <td scope="row"><?php echo $arti['district'] ?></td>
		   <td scope="row"><?php echo $arti['state'] ?></td>
		   <td scope="row"><?php echo $arti['country'] ?></td>
		   <td scope="row"><?php echo $arti['zip'] ?></td>
		   <td scope="row"><?php echo $arti['crime_count'] ?></td>
		   <td scope="row"><?php echo $arti['incident_type'] ?></td>
		   <td scope="row"><?php echo $arti['r_type'] ?></td>
		   
			<!--<td scope="row"><?php echo $arti['created_at'] ?></td>-->
			<!--<td scope="row"><?php echo $arti['updated_at'] ?></td>-->
			
			<td scope="row"><a href="delete_loaction?id=<?php echo $arti['id']; ?>"><button class="btn btn-danger">Delete</button></a>
			<a href="update_location?id=<?php echo $arti['id']; ?>"><button class="btn btn-secondary">Edit</button></a></td>
			
		
			</tr>
			<?php } ?>
			
							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->
	<?php include('footerdatabase.php'); ?>		