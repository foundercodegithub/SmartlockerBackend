
	
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
							
					     <h3 style=" margin-left:30px; color:white; ">Crime Reported</h3>
					 
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<button type="button" class="btn btn-primary">Bulk Import</button>

						</div>
					</div>
				</div> </br></br>

				<div class="pd-20 card-box mb-30">
					 <!--style="background-image: linear-gradient(to right,#7ba68d,#9fcea4); "-->
					 
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard vertical" action="reportinsert" method="post">
							
							<section>
								<div class="row">
								    
									<div class="col-md-4">
										<div class="form-group">
											<label style="color: black; font-size: 15px;" >Name :</label>
											<input type="text" name="name" class="form-control" placeholder=" Name..." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
										
									</div>
									<!--<div class="col-md-4">-->
									<!--    <div class="form-group">-->
									<!--		<label style="color: white; font-size: 15px;" >Enter Age :</label>-->
									<!--		<input type="text" placeholder=" Age...." name="age" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;"></br>-->
											
									<!--	</div>-->
								
									<!--</div>-->
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
											<label style="color: black; font-size: 15px;" >Enter Mobile Number</label>
											<input type="Number" placeholder=" Mobile Num...." name="number" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
											
										</div>
									    
									</div>
											
									
									<div class="col-md-4">
									    	<div class="form-group">
										
											<label style="color: black; font-size: 15px;" >Crime Location :</label>
											<input type="text" name="crime_location" class="form-control" placeholder="Crime location...." style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
										</div>
									  
									</div>
									<div class="col-md-4">
									    	
											<div class="form-group">
											<label style="color: black; font-size: 15px;" >Incident type :</label>
											<select class="form-control"  name="incident_type"  style="background:rgb(207, 230, 240);">
										 	    
                                            <option >Stamping</option>
                                            <option >Emergency</option>

                                            </select>
											
										</div>
										</div>
									    
										
									</div>
								</div>	
								
							
								<div class="row">
									
										<div class="col-md-4">
										<div class="form-group">
											<label style="color: black; font-size: 15px;" >Date</label>
											<input type="date" name="date" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label style="color: black; font-size: 15px;" >Time</label>
											<input type="time" value="00:00" name="time" class="form-control" style="border-radius: 13px; box-shadow: 3px 3px 3px;background:rgb(207, 230, 240);"></br>
											
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
			






