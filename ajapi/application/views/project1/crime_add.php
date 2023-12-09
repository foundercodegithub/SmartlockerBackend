
	
	<?php  include'sidebar.php';?>
    <!-- Page Wrapper -->
    <div class="container-fluid">
        <?php  include'topbar.php';?>
    
        <div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row" style="background:black;">
						<div class="col-md-6 col-sm-12" >
							
					     <h3 style=" margin-left:30px; color:white;  ">Emails User</h3>
					 
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<button type="button" class="btn btn-primary">Bulk Import</button>

						</div>
					</div>
				</div></br>

				<div class="pd-20 card-box mb-30">
					 <!--style="background-image: linear-gradient(to right,#7ba68d,#9fcea4); "-->
					 
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard vertical" action="crime_add" method="post">
							
							<section>
								<div class="row">
								    
									<div class="col-md-4">
										<div class="form-group">
											<label style="color: black; font-size: 15px;" >User name :</label>
											<input type="text" name="name" class="form-control" placeholder=" Name..." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
										
									</div>
									<div class="col-md-4">
									   <div class="form-group">
											<label style="color: black; font-size: 15px;" >Enter Mobile Number</label>
											<input type="Number" placeholder=" Mobile Num...." name="num" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
											
										</div>
								
									</div>
									<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: black; font-size: 15px;" >Enter Email ID :</label>
											<input type="email" placeholder=" Email...." name="email" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
										</div>
									    
									</div>
								</div>
							
										
								<div class=row>
									<div class="col-md-4">
									    
									    <div class="form-group">
											<label style="color: black; font-size: 15px;" >Date</label>
											<input type="date" placeholder=" Enter Date...." name="date" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
										</div>
									    
									</div>
											
									
									<div class="col-md-4">
									    	<div class="form-group">
										
											<label style="color: black; font-size: 15px;" >Crime Address :</label>
											<input type="text" name="crime_add" class="form-control" placeholder="Address...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									  
									</div>
									<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: black; font-size: 15px;" >Attachment Image</label>
											<input type="file" placeholder=" Enter attachment...." name="attachment" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
										</div>
									    
										
									</div>
								</div>	
								
							
								<div class="row">
									<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: black; font-size: 15px;" >State :</label>
											<select class="form-control"  name="state" style="background:rgb(207, 230, 240);" >
										 	    
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
										<div class="col-md-4">
										<div class="form-group">
										
											<label style="color: black; font-size: 15px;" >City :</label>
											<input type="text" name="city" class="form-control" placeholder="City...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									</div>
								
									<div class="col-md-4">
									    
									</div>
								</div>
                             </div>
								<div class="row">
								   <div class="col-md-2">
								   	<div class="form-group">
								   		
								   	</div>
								   </div>
								   <div class="col-md-3">
								   	<div class="form-group">
								   		<button type="submit" value="submit" class="btn btn-primary " style="width:200px;margin-left:140px">Submit</button>
								   	</div>
								   </div>
								   <!--<div class="col-md-3">-->
								   <!--	<div class="form-group">-->
								   <!--		<button type="Cancel" value="cancel" class="btn btn-dark " style="width:200px;margin-left:140px">Cancel</button>-->
								   <!--	</div>-->
								   <!--</div>-->

								</div>
							</section>
							

						</form>
					</div>
				
				</div>

 <?php include'footer.php';?>

   </div>

  
	
	
	
	
	
	
				<!-- success Popup html Start -->
			






