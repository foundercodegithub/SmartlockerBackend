
	
	<?php  include'sidebar.php';?>
    <!-- Page Wrapper -->
    <div class="container-fluid">
      
    
        <div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					
				</div> </br></br>

				<div class="pd-20 card-box mb-30">
					 <!--style="background-image: linear-gradient(to right,#7ba68d,#9fcea4); "-->
					 
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard vertical" action="reportinsert" method="post">
							
							<section>
								<div class="row">
								    
									<div class="col-md-4">
										<div class="form-group">
											<label style="color: black; font-size: 15px;" >Image :</label>
											<?php foreach($data as $rest): ?>
                            <img src="<?php echo $rest['img_url'];?>" style="width:50%; height:550px;">
                            <?php endforeach; ?>
											
										</div>
										
									</div>
								</div>
							</section>
							

						</form>
					</div>
				
				</div>

 <?php include'footer.php';?>

   </div>

  
	
	
	
	
	
	
				<!-- success Popup html Start -->
			






