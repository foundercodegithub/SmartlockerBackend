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
                    <h1 class="h3 mb-2 text-gray-800">Manual crime list</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manual crime list</h6>
                        </div>
                        <div class="card-body">
                            <!--<div class="table-responsive"><a href="addrework"><button class ="btn btn-primary" style=" float:right; margin-top:25px ;">Add Project...</button></a>-->
                            
                            
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   <thead>
								<tr style="background:blue; color:white;" >
				<th scope="col">id</th>
				<th scope="col">App User id</th>
                <th scope="col">App User name</th>
				<th scope="col">Email</th>
				<th scope="col">Message </th>
				<th scope="col">Journey Image</th>
				<th scope="col">Created at</th>
				<th scope="col">Updated at</th>
				<th scope="col">Action</th>
				
			</tr>
				</thead>
				<tbody>
								
		<?php foreach ($rest as $arti) { ?>
		<tr>
				
			<td scope="row"><?php echo $arti['id'] ?></td>
			<td scope="row"><?php echo $arti['app_user_id'] ?></td>
		   <td scope="row"><?php echo $arti['app_user_name'] ?></td>
		   <td scope="row"><?php echo $arti['email_id'] ?></td>
		   <td scope="row"><?php echo $arti['message'] ?></td>
		   <td scope="row"><?php echo $arti['journey_image_attachment'] ?></td>
		   	<td scope="row"><?php echo $arti['created_at'] ?></td>
			<td scope="row"><?php echo $arti['updated_at'] ?></td>
			
			<td scope="row"><a href="delete_journey?id=<?php echo $arti['id']; ?>"><button class="btn btn-danger">Delete</button></a>
		</td>
			
		
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
   
   
   
   
   
   
   
   
   








