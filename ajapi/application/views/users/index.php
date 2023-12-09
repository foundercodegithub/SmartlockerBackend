<?php include('header.php'); ?>

	

<?php include('sidebar.php'); ?>

	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container" style="background:#F38CAC;">
		
			<div class="row">
			    <div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1" style="background-color:white;color:black; height:150px;">
						<div class="d-flex flex-wrap align-items-center">
							<div class="icon">
							    <div class="h4 mb-0"  >App User					    </div><br>
							    
							<i class="fa fa-user" style="font-size: 60px;color:#ec1f60;"></i>
						</div>
							<a href="<?php echo base_url();?>/users/all_user">
							<div class="widget-data mx-3">
								
								
                            <div class="weight-600 font-14" style="color:black;font-size: 40px; margin-left:-50px; margin-top:40px;">
								    <?php foreach($est as $row):
							        ?><?php echo $row->num_row; ?> 
							        <?php
							        endforeach;
							    ?>
							</div>
							</div>
							</a>
						</div>
			
					</div>
				</div>
				
				
				
				<div class="col-xl-3 mb-30" >
					<div class="card-box height-100-p widget-style1" style="background-color:white;color:black;height:150px;">
						<div class="d-flex flex-wrap align-items-left">
						<div class="icon">
						    	<div class="h4 mb-0">Crime report By Map
							   
							    </div></br>
							<i class="fa fa-map" style="font-size: 40px; color:#ec1f60;"></i>
					
							<a href="<?php echo base_url();?>/users/crime_by_maps">
						
							    <div class="weight-600 font-14" style=" color:black;font-size: 40px; margin-left: 60px; margin-top:-50px;">
							         <?php foreach($artic as $row):
							        echo $row->num_of_time;
							        endforeach;
							    ?>
							    
							        </div>
							        
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1" style="background-color:white;color:black;height:150px;">
						<div class="d-flex flex-wrap align-items-left">
							<div class="icon">
							    <div class="h4 mb-0" style="color:black;">Crime report by Manual</div></br>
							<i class="fa fa-map" style="font-size:45px; color:#ec1f60;"></i>
						</div>
							<a href="<?php echo base_url();?>/users/crime_views">
							<div class="widget-data mx-3">
								
								<div class="weight-600 font-14" style="color:black;font-size: 40px; margin-left: 50px;margin-top:-50px">
								    <?php foreach($rest as $row):
							        echo $row->num_id;
							        endforeach;
							    ?>
								</div>

							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1" style="backgroun;height:150px;">
						<div class="d-flex flex-wrap align-items-center">
							<div class="icon">
							    <div class="h6 mb-0" style="color:black"><b>Shaking Emergancy Email</b></div></br>
							<i class="fa fa-ambulance" style="font-size: 40px; color:#ec1f60;"></i>
						</div>
							<a href="<?php echo base_url();?>/users/shakink_mail">
							<div class="widget-data mx-3">
								
								<div class="weight-600 font-14" style="color:black;font-size: 40px; margin-left: 50px; margin-top:-50px">
								    <?php foreach($st as $row):
							        echo $row->num_id;
							        endforeach;
							    ?>
								</div>

							</div>
							</a>
						</div>
					</div>
				</div>
				
				
				
			</div>
			
<!--			     <div class="row">-->
            
<!--				php-->
 
<!--$dataPoints = array( -->
<!--	array("y" => 10, "label" => "class1" ),-->
<!--	array("y" => 50, "label" => "class2" ),-->
<!--	array("y" => 20, "label" => "class3" ),-->
<!--	array("y" => 40, "label" => "class4" ),-->
<!--	array("y" => 30, "label" => "class6" ),-->
<!--	array("y" => 30, "label" => "class7" ),-->
<!--	array("y" => 30, "label" => "class8" ),-->
<!--	array("y" => 30, "label" => "class9" ),-->
<!--	array("y" => 30, "label" => "class10" ),-->
	
<!--);-->

 
<!--?>-->
<!--<!DOCTYPE HTML>-->
<!--<html>-->
<!--<head>-->
<!--<script>-->
<!--window.onload = function() {-->
 
<!--var chart = new CanvasJS.Chart("chartContainer", {-->
<!--	animationEnabled: true,-->
<!--	theme: "light2",-->
<!--	title:{-->
<!--		text: "Top 10 Crime District"-->
<!--	},-->
	
<!--	data: [{-->
<!--		type: "column",-->
<!--		yValueFormatString: "#,##0.## ",-->
<!--		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>-->
<!--	}]-->
<!--});-->
<!--chart.render();-->
 
<!--}-->
<!--</script>-->
<!--</head>-->
<!--<body>-->
<!--<div id="chartContainer" style="height: 370px; width: 70%;"></div>-->
<!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
<!--</body>-->
<!--</html> -->
			
<!--          </div>-->



         
         <!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <!--<div style="width:60%;hieght:20%;text-align:center">-->
        <!--    <h2 class="page-header" >Product Sales Reports </h2>-->
        <!--    <p style="align:center;"><canvas  id="chartjs_bar"></canvas></p>-->
        <!--</div>    -->
    </body>
  <script src="js/jquery.js"></script>
  <script src="js/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969aa",
                                "#ff407b",
                                "#331523",
                                "#ffc750"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>
          
        </div>
        
			</br></br>
<?php include('footer.php'); ?>