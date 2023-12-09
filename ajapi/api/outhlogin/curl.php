<?php


$url = "https://oauth2.googleapis.com/token";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "client_id=982111630622-1jbthhcj67hl3eapjvq1rg2snu5fcafb.apps.googleusercontent.com&client_secret=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&grant_type=refresh_token&refresh_token=1//0g9atuRRCj3hvCgYIARAAGBASNwF-L9Iro49JY2Rjr8Ow26u3wTvDrX83UP6R_SxfUGyYI7j1uEG8-_6Fl7VqHR_9UnZ1TRWmsJI");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

echo $server_output;
// further processing ....

?>
