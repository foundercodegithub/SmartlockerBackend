
	
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
							
					     <h3 style=" margin-left:30px; color:white ">Location</h3>
					 
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<button type="button" class="btn btn-primary">Bulk Import</button>

						</div>
					</div>
				</div></br>

				<div class="pd-20 card-box mb-30">
					 <!--style="background-image: linear-gradient(to right,#7ba68d,#9fcea4); "-->
					 
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard vertical" action="locationinsert" method="post">
							
							<section>
								<div class="row">
								    
									<div class="col-md-4">
										<div class="form-group">
											<label style="color: balck; font-size: 15px;" >Address</label>
											<input type="text" name="address" class="form-control" placeholder=" Address..." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
										
									</div>
									<div class="col-md-4">
									    	<div class="form-group">
										
											<label style="color: black; font-size: 15px;" >District:</label>
											<input type="text" name="district" class="form-control" placeholder="district...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									  
									</div>
									<div class="col-md-4">
									    
									    <div class="form-group">
											<label style="color: black; font-size: 15px;" >City</label>
											<input type="text" placeholder=" City...." name="city" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
										</div>
									    
									</div>
									
									
								</div>
							
										
								<div class=row>
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
										
											<label style="color: black; font-size: 15px;" >Country :</label>
											<input type="text" name="country" value="India" class="form-control"  style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									    
									    
									</div>		
									
								<div class="col-md-4">
									   <div class="form-group">
											<label style="color: black; font-size: 15px;" >Latitude</label>
											<input type="text" placeholder=" latitude...." name="latitude" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
											
										</div>
								
									</div>
								
								
								</div>	
								
							
								<div class="row">
										<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: black; font-size: 15px;" >Longitude :</label>
											<input type="text" placeholder=" longitude...." name="longitude" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
										</div>
									    
									</div>
										<div class="col-md-4">
										<div class="form-group">
										
											<label style="color: black; font-size: 15px;" >Zip :</label>
											<input type="text" name="zip" class="form-control" placeholder="zip...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									</div>
								
									<div class="col-md-4">
									    <div class="form-group">
										
											<label style="color: black; font-size: 15px;" >Crimecount :</label>
											<input type="text" name="crime_count" class="form-control" placeholder="crimecount...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									</div>
								</div>
								<div class="row">
										<div class="col-md-4">
									    	<div class="form-group">
											<label style="color: black; font-size: 15px;" >Incident Type :</label>
											<input type="text" placeholder=" Incident...." name="incident_type" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
										</div>
									    
									</div>
										<div class="col-md-4">
										<div class="form-group">
										
											<label style="color: black; font-size: 15px;" >R_type :</label>
											<input type="text" name="r_type" class="form-control" placeholder="rtype...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									</div>
								
									<div class="col-md-4">
									    <div class="form-group">
										
											<label style="color: black; font-size: 15px;" >Crieated_type :</label>
											<input type="text" name="created_at" class="form-control" placeholder="crieated_type...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									</div>
								</div>
								<div class="row">
								    <div class="col-md-4">
									    <div class="form-group">
										
											<label style="color: black; font-size: 15px;" >Updated_at :</label>
											<input type="text" name="updated_at" class="form-control" placeholder="updated_at...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									</div>
								</div>
                             </div>
                             
								<div class="row">
								   <div class="col-md-3">
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
			






