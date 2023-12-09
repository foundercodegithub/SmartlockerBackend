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
	array("y" => 90, "label" => "Gorakh pur" ),
	array("y" => 50, "label" => "Kanpur" ),
	array("y" => 20, "label" => "Lakhimpur Khiri" ),
	array("y" => 40, "label" => "sitapur" ),
	array("y" => 80, "label" => "Gonda" ),
	array("y" => 60, "label" => "Bahraich" ),
	array("y" => 90, "label" => "Lucknow" ),
	array("y" => 40, "label" => "Bareli" ),
	array("y" => 30, "label" => "Rai Bareli" ),
	array("y" => 95, "label" => "Allahabad" ),
	
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
		text: "Districtwise Crime Analytics"
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
<div id="chartContainer" style="height: 370px; width: 90%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   
</div></br></br>

                       
                       

                    

            <!-- End of Main Content -->

           <?php  include'footer.php';?>