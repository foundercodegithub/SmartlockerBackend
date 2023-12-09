<?php  include'sidebar.php';?>
    <!-- Page Wrapper -->
    <div class="container-fluid">
        <?php  include'topbar.php';?>
    
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"> User add</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User add</h6>
                        </div>
                        <div class="card-body">
                            <!--<div class="table-responsive"><a href="addrework"><button class ="btn btn-primary" style=" float:right; margin-top:25px ;">Add Project...</button></a>-->
                            
                            
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   <thead>
								<tr>
				<th scope="col">id</th>
				<th scope="col"> name </th>
				<th scope="col">Mobile </th>
			    <th scope="col">Email</th>
				<th scope="col">Crime Location</th>
				<th scope="col">Incident Type</th>
				<th scope="col">Date</th>
				<th scope="col">Time</th>
				<!--<th scope="col">City</th>-->
				
			</tr>
				</thead>
				<tbody>
								
		<?php foreach ($artic as $arti) { ?>
		<tr>
				
			<td scope="row"><?php echo $arti['id'] ?></td>
			<td scope="row"><?php echo $arti['name'] ?></td>
			<td scope="row"><?php echo $arti['email'] ?></td>
			<td scope="row"><?php echo $arti['number'] ?></td>
			<td scope="row"><?php echo $arti['crime_location'] ?></td>
			<td scope="row"><?php echo $arti['incident_type'] ?></td>
			<td scope="row"><?php echo $arti['date'] ?></td>
			<td scope="row"><?php echo $arti['time'] ?></td>
			<!--<td scope="row"><?php echo $arti['city'] ?></td>-->
			
		
			</tr>
			<?php } ?>
			
							</tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

   </div>
   <?php include'footer.php';?>
   
   
   
   
   
   
   
   
   








