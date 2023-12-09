<?php include'sidebar.php';?>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
         <?php include'topbar.php';?>

 <div class="container-fluid">
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
	array("y" => 24, "label" => "226016" ),
	array("y" => 19, "label" => "226022" ),
	array("y" => 22, "label" => "226201" ),
	array("y" => 18, "label" => "226010" ),
	array("y" => 14, "label" => "226006" ),
	array("y" => 6, "label" => "226401" ),
	array("y" => 20, "label" => "226003" ),
	array("y" => 15, "label" => "226301" ),
	array("y" => 19, "label" => "226018" ),
	array("y" => 16, "label" => "206020" ),
	
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
		text: "Zipwise Age Crime Analytics"
	},axisY: {
		 title: "Age Group......"
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
<div id="chartContainer" style="height: 370px; width: 90%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   
</div></br></br>

                       
                       

                    

            <!-- End of Main Content -->

           <?php  include'footer.php';?>