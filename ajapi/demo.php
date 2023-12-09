<?php
header("Content-Type:application/json");
if (isset($_GET['lat']) && isset($_GET['long']) ){
    
    
	 $servername = "localhost";
    $username = "founderc_ladli";
    $password = "founderc_ladli";
    $dbname = "founderc_ladli";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Bucaramanga Coordinates
    $lat = $_GET['lat'];
    $lon = $_GET['long'];
    $distance = 150;
 

  $lat = mysqli_real_escape_string($conn, $lat);
    $lon = mysqli_real_escape_string($conn, $lon);
    $distance = mysqli_real_escape_string($conn, $distance);
 $query = <<<EOF
   
SELECT * FROM ( SELECT *, ( ( ( acos( sin(( $lat * pi() / 180)) * sin(( `latitude` * pi() / 180)) + cos(( $lat * pi() /180 )) * cos(( `latitude` * pi() / 180)) * cos((( $lon - `longitude`) * pi()/180))) ) * 180/pi() ) * 60 * 1.1515 * 1.609344 ) as distance FROM `double` ) double WHERE `status`="1"&&distance <= 150 ORDER BY `double`.`distance` ASC LIMIT 15;

EOF;
    $result = $conn->query($query);
if($conn){
    	if($result->num_rows > 0){
	while($row2[] = $result->fetch_assoc()) {
        
    $response['data'] = $row2;


        }
    $response['response_code'] = '200';
	$response['response_desc'] = 'Driver Near You';
	
	$json_response = json_encode($response);
	echo $json_response;      	

	}else{
	$response['response_code'] = '400';
	$response['response_desc'] = 'Driver Not Found';
	
	$json_response = json_encode($response);
	echo $json_response;
		}
		}else{
	$response['response_code'] = '400';
	$response['response_desc'] = 'Not Found';
	
	$json_response = json_encode($response);
	echo $json_response;
		}
}

?>