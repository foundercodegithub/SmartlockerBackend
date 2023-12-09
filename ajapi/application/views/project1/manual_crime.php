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
                    <h1 class="h3 mb-2 text-gray-800">Shaking Emergancy Mail</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Shaking Emergancy Mail</h6>
                        </div>
                        <div class="card-body">
                            <!--<div class="table-responsive"><a href="addrework"><button class ="btn btn-primary" style=" float:right; margin-top:25px ;">Add Project...</button></a>-->
                            
                            
                                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                   <thead>
								<tr style="background:blue; color:white;">
				<th scope="col">id</th>
				<th scope="col">User Name</th>
				<th scope="col">Mobile No.</th>
				<th scope="col">Map Link </th>
				<th scope="col">Datetime</th>
				<th scope="col">Action</th>
				
			</tr>
				</thead>
				<tbody>
								
		<?php foreach ($artic as $arti) { ?>
		<tr>
				
			<td scope="row"><?php echo $arti['id'] ?></td>
			<td scope="row"><?php echo $arti['name']; ?></td>
		   <td scope="row"><?php echo $arti['phone']; ?></td>
		   <td scope="row"><iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBt0XXMqrIAoo-tec72ZeRgnpQF4bkm4Tw&q=<?php echo $arti['lat'] ?>,<?php echo $arti['long'] ?>" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe></td>
		   
		   <td scope="row"><?php echo $arti['datetime'] ?></td>
		  
			
			<td scope="row"><a href="#?id=<?php echo $arti['id']; ?>"><button class="btn btn-danger">Delete</button></a>
			<a href="update_location?id=<?php echo $arti['id']; ?>"><button class="btn btn-secondary">Edit</button></a></td>
			
		
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
   
   
   
   
   
   
   
   
   








