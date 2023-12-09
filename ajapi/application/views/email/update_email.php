<?php include(APPPATH.'views/users/header.php'); ?>

	<?php include(APPPATH.'views/users/sidebar.php'); ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12" >
							
					     <h3 style=" margin-left:30px;  ">Update Email</h3>
					 
						</div>
						
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30" style="background-image: linear-gradient(to right,#7ba68d,#9fcea4); ">
					
					 
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard vertical" action="email_update" method="post">
							<?php foreach($data as $row): ?>
							<section>
								<div class="row">
								   <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
									<div class="col-md-4">
										<div class="form-group">
											<label style="color: white; font-size: 15px;" >User Name:</label>
											<input type="text" name="app_user" class="form-control" value="<?php echo $row['app_user']; ?>" placeholder="Name..." style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
										</div>
										
									</div>
									<div class="col-md-4">
									   <div class="form-group">
											<label style="color: white; font-size: 15px;" >Enter Mobile Number</label>
											<input type="text" placeholder=" Mobile Num...." name="contact_person" class="form-control" value="<?php echo $row['contact_person']; ?>" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
											
											
										</div>
								
									</div>
									<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: white; font-size: 15px;" >Enter Email ID :</label>
											<input type="email" placeholder=" Email...." name="email_id" value="<?php echo $row['email_id']; ?>" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
											
										</div>
									    
									</div>
								</div>
							
										
								<div class=row>
								    <div class="col-md-2"></div>
									<div class="col-md-4">
									    
									    <div class="form-group">
											<label style="color: white; font-size: 15px;" >Address</label>
											<input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
											
										</div>
									    
									</div>
											
									
									<!--<div class="col-md-4">-->
									<!--    	<div class="form-group">-->
										
									<!--		<label style="color: white; font-size: 15px;" >Image:</label>-->
									<!--		<input type="file" name="image_attachment" class="form-control"  style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>-->
									<!--	</div>-->
									  
									<!--</div>-->
									<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: white; font-size: 15px;" >City Name</label>
											<input type="text" placeholder=" Enter city name" value="<?php echo $row['city_name']; ?>" name="city_name" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
											
										</div>
									    
										
									</div>
									 <div class="col-md-2"></div>
								</div>	
								
							
								
								<div class="row">
								   <div class="col-md-2">
								   	<div class="form-group">
								   		<input type="hidden" name="updated_at" value="<?php echo date('Y-m-d'); ?>" /> 
								   	</div>
								   </div>
								   <div class="col-md-3">
								   	<div class="form-group">
								   		<button type="submit" value="submit" class="btn btn-primary " style="width:200px;margin-left:140px">Submit</button>
								   	</div>
								   </div>
								   <div class="col-md-3">
								   	<div class="form-group">
								   		<button type="Cancel" value="cancel" class="btn btn-dark " style="width:200px;margin-left:140px">Cancel</button>
								   	</div>
								   </div>

								</div>
							</section>
							
<?php endforeach; ?>
						</form>
					</div>
				</div>

				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Form Submitted!</h3>
								<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							<div class="modal-footer justify-content-center">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Smart Finance Locker Create By  <a href="https://github.com/dropways" target="_blank">Founder codes Technology</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url() ?>assets/vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="<?php echo base_url() ?>assets/vendors/scripts/steps-setting.js"></script>
</body>
</html>