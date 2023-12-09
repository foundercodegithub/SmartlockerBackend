<?php

$conn=mysqli_connect('localhost','founderc_smart_locker','founderc_smart_locker','founderc_smart_locker'); // include database connection file


$query=mysqli_query($conn,"SELECT * FROM `newdata` ORDER BY `newdata`.`datetim` DESC");

while($row=mysqli_fetch_assoc($query))
{
	$snoo=$row['sno'];
	$newdevid=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `newdata` where `sno`='$snoo' ORDER BY `newdata`.`datetim` DESC LIMIT 1"));
$newseialid=$newdevid['deviceid'];
	$enrollmentTime=$newdevid['datetim'];
	
	$quelf=mysqli_query($conn,"UPDATE `ime` SET  `deviceTime`='$enrollmentTime', deviceID='$newseialid',`enroll_status`='1' WHERE enroll_status='1' && `deviceSno`='$snoo'");
	
}


// further processing ....

?>
