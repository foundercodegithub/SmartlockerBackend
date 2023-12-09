<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
      $conn=mysqli_connect('localhost','founderc_ladli','founderc_ladli','founderc_ladli');
      $sub="Emergancy Emergancy Emergancy";
      $msg=$_GET['msg'];
      $user_id=$_GET['user_id'];
      $headline="";
         
         $subject = $sub;
         
         $message = "<b>$headline</b>";
         $message .= "<h1>$msg</h1>";
         $query="SELECT * FROM `user_contact` WHERE `user_id`='$user_id'";
         $res=mysqli_query($conn,$query);
         foreach($res as $re)
         {
             $email=$re['email'];
         $to = "$email";
         $header = "From:laadliapptech@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }  
         }
         
      ?>
      
   </body>
</html>