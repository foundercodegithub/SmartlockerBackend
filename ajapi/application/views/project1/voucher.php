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
                    <h1 class="h3 mb-2 text-gray-800">All Voucher</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Voucher</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"><a href="addvoucher"><button class ="btn btn-primary" style=" float:right; margin-top:25px ;">Add Voucher...</button></a>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            
                                            <th>Sl.</th>
                                            <th>  Voucher ID</th>
                                            <th>Voucher Date</th>
                                            <th>Voucher Amount</th>
                                            <th>Recipient Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                           



                                          
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        
                                        
                                        
                                       
                                        <tr>
                                            <td>1</td>
                                            <td>42312</td>
                                            <td>12/12/2022</td>
                                            <td>20000</td>
                                            <td>Nitish Gupta</td>
                                            <td><button class="btn btn-success">Done</button></td>
                                            <td>
                                                <a href="#"><button class="btn btn-primary">Edit</button></a>
                                                 <a href="#"><button class="btn btn-danger">Delete</button></a>
                                            </td>
                                           
                                            
                                        </tr>
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
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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