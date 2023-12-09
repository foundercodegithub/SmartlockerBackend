<?php include'sidebar.php';?>

        <div id="content-wrapper" class="d-flex flex-column" style="background:#e1e1e2;" >

            <!-- Main Content -->
            <div id="content">
         <?php include'topbar.php';?>
         	<div class="container-fluid" style="background:#e1e1e2;">
		<div class="row" style="min-height:20px;"></div>
			<div class="row">
			 <!--       	<div class="col-md-3"  style="border-radius:2px;">-->
				<!--	<div class="card-box height-100-p widget-style1" style="background-color:white; ">-->
				<!--		<div class="background:white;" style="border:2px solid white; box-shadow:2px 2px 5px black;">-->
							<!-- <div class="progress-data">
				<!--				<div id="chart"></div>-->
				<!--			</div> -->
				<!--			<div class="widget-data">-->
				<!--			    <div class="h4 mb-0" style="color:black; text-align:center; font-size:15px;"><i class='far fa-user' style='font-size:30px; padding:33px; color:red;'></i>All users-->
							   
				<!--			    </div>-->
				<!--			    <div class="weight-600 font-14" style=" color:black;font-size: 40px; margin-left: 20px;  text-align:right; margin-right:30px;">-->
				<!--			          
				<!--			    ?>-->
				<!--			        </div>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
			
			<div class="col-md-3" id="rest" style="background:white; height:100px; width:0%; box-shadow:2px 2px 5px black; ">
			  
			    <div class="row" >
			        <div class="col-md-3"><i class='far fa-user' style='font-size:30px; padding:33px; color:red;'></i> </div>
			             <a href="<?php echo base_url();?>/Project/index2">
			        <div class="col-md-9" style="padding-top:6px; text-align:center;" >All User<br>
			  <p style="font-size:30px; color:black;"><?php foreach($best as $row):
						        echo $row->num_id_row;
						        endforeach; ?></p>  
						       
			    </div>
			     </a>
			    </div>
			      
			    
			</div>
			
			<div class="col-md-1"></div>
				<div class="col-md-3" id="rest" style="background:white; height:100px; box-shadow:2px 2px 5px black;">
				    <a href="<?php echo base_url();?>/Project/crime_by_map">
			    <div class="row" >
			        <div class="col-md-3"><i class="fas fa-map-marker-alt" style="font-size:30px; padding:33px; color:red;padding-top:25px"></i> </div>
			        <div class="col-md-8" style="marg-top:20px; text-align:center;padding-top:12px">By Map<br>
			<p style="font-size:30px; color:black;"><?php foreach($artic as $row):
						        echo $row->num_of_time;
						        endforeach; ?></p>
			    </div>
			    <div class="col-md-1"></div>
			    </div>
			    </a>
			</div>
			
					<div class="col-md-1"></div>
		  	          <div class="col-md-3" id="rest" style="background:white; height:100px; box-shadow:2px 2px 5px black;">
		  	              <a href="<?php echo base_url();?>/Project/crime_views">
			    <div class="row">
			        <div class="col-md-3"><i class='fas fa-chart-bar' style='font-size:30px; padding:33px; color:red;'></i> </div>
			        <div class="col-md-8" style="padding-top:10px; text-align:center;">Report Crime<br>
			<p style="font-size:30px; color:black;"><?php foreach($rest as $row):
						        echo $row->num_id;
						        endforeach; ?></p>
			    </div>
			    <div class="col-md-1"></div>
			    </div>
			    </a>
			</div>
			
			<!--nikita-->
			 <!--<div class="col-md-4"></div>-->
			 <!--  	<div class="col-md-3" id="rest" style="background:white; height:100px; width:0%; box-shadow:2px 2px 10px black; ">-->
							<div class="col-md-3" id="rest" style="background:white; height:100px; width:0%; box-shadow:2px 2px 10px black; ">
							    <a href="<?php echo base_url();?>/Project/crime_view">
					  <div class="row" style="padding-top:15px">
			        <div class="col-md-3"><i class='fa fa-ambulance' style='font-size:30px; padding:33px; color:red;'></i> </div>
			        <div class="col-md-9" style="padding-top:20px; text-align:center;">Emergency Shaking<br>
			<p style="font-size:30px; color:black;">
			    </div>
			    </div>
			    </a>
			<!--nikita-->
			</div>
			
		
		
		
</div>			
<div class="container-fluid">
    	<div class="row" style="min-height:50px; background:#e1e1e2;"></div>
</div>
 <div class="container-fluid" style="background:#e1e1e2;">
     <!--<div class="row">-->
     <!--   &nbsp; &nbsp;-->
     <!--        <a href="topcity"><button class="btn btn-primary">Top 10 Crime citie</button></a>-->
     <!--        &nbsp; &nbsp;-->
     <!--        <a herf="#">-->
     <!--    <button type="button" class="btn btn-primary">City With Crime analitics</button></a>&nbsp; &nbsp;-->
     <!--    <a herf="">-->
     <!--     <button type="button" class="btn btn-primary">City With Age analitics</button></a> &nbsp; &nbsp; -->
     <!--     <a herf="#">-->
     <!--    <button type="button" class="btn btn-primary">Crime Type</button></a>&nbsp; &nbsp;-->
     <!--    <a herf="#">-->
     <!--      <button type="button" class="btn btn-primary">Crime With Zipcode analitics</button></a>&nbsp; &nbsp;-->
        
         
     <!--</div></br></br>-->

                   
<div class="row">
    
			<?php
 
$dataPoints = array( 
	array("y" => 90, "label" => "Violent Crime" ),
	array("y" => 50, "label" => "Posco" ),
	array("y" => 20, "label" => "Cyber crime" ),
	array("y" => 40, "label" => "Rape" ),
	array("y" => 80, "label" => "Attempt To Rape" ),

	
);

 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Top Crimes in U.P."
	},axisY: {
		 title: "No of Crimes......"
	},
	
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 60%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

</div></br></br>

           <?php  include'footer.php';?>