<?php include('header.php'); ?>

	<?php include('sidebar.php'); ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12" >
							
					     <h3 style=" margin-left:30px;  ">Add Crime</h3>
					 
						</div>
					
					</div>
				</div>

				<div class="pd-20 card-box mb-30" style="background-image: linear-gradient(to right,#f36523,#ec1f60); ">
					
					 
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard vertical" action="crime_add" method="post">
							
							<section>
								<div class="row">
								    
									<div class="col-md-4">
										<div class="form-group">
											<label style="color: white; font-size: 15px;" >Name :</label>
											<input type="text" name="user_id" class="form-control" placeholder=" Name..." style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
										</div>
										
									</div>
									<div class="col-md-4">
									    <div class="form-group">
											<label style="color: white; font-size: 15px;" >Description. :</label>
											<input type="text" placeholder=" Enter description here..." name="description" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
											
										</div>
								
									</div>
									<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: white; font-size: 15px;" >Incident Type :</label>
											<input type="text" placeholder=" Enter incedent type..." name="incident_type" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
											
										</div>
									    
									</div>
								</div>
							
										
								<div class=row>
								    <div class="col-md-2"></div>
									<div class="col-md-4">
									    
									    	<div class="form-group">
											<label style="color: white; font-size: 15px;" >Address..</label>
											<input type="text" placeholder=" Enter address here...." name="address" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
											
											
										</div>
									    
									</div>
											
									
									<!--<div class="col-md-4">-->
									 <!--   	<div class="form-group">-->
										
										<!--	<label style="color: white; font-size: 15px;" >State :</label>-->
										<!--	<input type="text" name="state" class="form-control"  style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>-->
										<!--</div>-->
									  
									<!--</div>-->
									
									    
										
								
							
								
							
							
										<div class="col-md-4">
										<div class="form-group">
											<label style="color: white; font-size: 15px;" > Enter City...</label>
											<input type="text"  placeholder="Enter City here !" name="city" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>
											
										</div>
										</div>
										 <div class="col-md-2"></div>
										 </div>
										 <div class="row">
										     <div class="col-md-4"></div>
								<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: white; font-size: 15px;" >State :</label>
											<select class="form-control"  name="state" style="border-radius: 13px; box-shadow: 3px 3px 3px;">
										 	    
                                            <option >Uttar Pradesh</option>
                                            <option >Madhya Pradesh</option>
                                            <option >Maharashtra</option>
                                            <option>Gujarat</option>
                                            <option >Andhra Pradesh</option>
                                            <option >Chhattisgarh</option>
                                            <option >Bihar</option>
                                            <option >Tamil Nadu</option>
                                            <option >Telangana</option>
                                            <option >Arunachal Pradesh</option>
                                            <option >Jharkhand</option>
                                            <option >Assam</option>
                                            <option >Himachal Pradesh</option>
                                            <option >Ladakh</option>
                                            <option >Uttarakhand</option>
                                            <option >Punjab</option>
                                            <option >Haryana</option>
                                            <option >Jammu and Kashmir</option>
                                            <option >Kerala</option>
                                            <option value="">Meghalaya</option>
                                            <option value="">Manipur</option>
                                            <option value="">Mizoram</option>
                                            <option value="">Nagaland</option>
                                            <option value="">Tripura</option>
                                            <option value="">Andaman and Nicobar Islands</option>
                                            <option value="">Sikkim</option>
                                            <option value="">Goa</option>
                                            <option value="">Delhi</option>
                                            <option value="">Dadra and Nagar Haveli</option>
                                            <option value="">Puducherry</option>
                                            <option value="">Chandigarh</option>
                                            <option value="">Lakshadweep</option>
                                            </select>
											
										</div>

									</div>
									 <div class="col-md-e"></div>
								
                             </div>
								<div class="row">
								  
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