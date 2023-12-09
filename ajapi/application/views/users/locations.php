<html>
    <head>
        
    </head>
    <body>
        <?php foreach ($artic as $arti) {  ?>
       
            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBt0XXMqrIAoo-tec72ZeRgnpQF4bkm4Tw&q=<?php echo $arti['lat'] ?>,<?php echo $arti['long'] ?>" height="100%" width="100%"></iframe>
        <?php } ?>
    </body>
</html>