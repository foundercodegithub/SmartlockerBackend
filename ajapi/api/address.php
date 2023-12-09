<?php
$latitude = '40.6781784';
$longitude = '-73.9441579';
$result = getAddress($latitude, $longitude);
echo 'Address: ' . $result;

function getAddress($latitude, $longitude)
{
        //google map api url
        $url = "http://maps.google.com/maps/api/geocode/json?latlng=$latitude,$longitude&key=AIzaSyBt0XXMqrIAoo-tec72ZeRgnpQF4bkm4Tw";

        // send http request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $address = $json->results[0]->formatted_address;
        return $address;
}

?>