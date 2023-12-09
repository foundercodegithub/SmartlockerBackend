<?php
$folderPath = "image/";
$countFile = 0;
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
 $countFile = count($totalFiles);
}
print_r($countFile);
echo($countFile);


?>