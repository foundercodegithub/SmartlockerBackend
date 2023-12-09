<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


            <style>
      .modal {
        display: none;
        position: fixed;
        z-index: 8;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
      }
      .modal-content {
        margin: 50px auto;
        border: 1px solid #999;
        width: 60%;
      }
      
      
      
      
      input,
      textarea {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        
        outline: none;
      }
      .contact-form button {
        width: 90%;
        padding: 10px;
        border: none;
        background: #cd1300;
        font-size: 20px;
        font-weight: 800;
        color: #fff;
      }
      
      
       
      
      
      

    </style>
    </head>
    <body style="
    background-color: #F5F9FC;
">
        <?php
      if (isset($_POST['save']))
      {
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$cname=$_POST['cname'];
$path='https://apponrents.com/app/image';

$filename = $_FILES["image"]["name"];
                    $tempname = $_FILES["image"]["tmp_name"];
                    $folder = "./image/" . $filename;
                    
                    $folderPath = "./image/";
                    $countFile = 0;
                    $totalFiles = glob($folderPath . "*");
                    if ($totalFiles){
                     $countFile = count($totalFiles);
                    }
                    print_r($countFile);
                    echo($countFile);

                        if (move_uploaded_file($tempname, $folder)) {
                            '<script>alert("Success")</script>';
                            $db = mysqli_connect("localhost", "founderc_apponrents", "founderc_apponrents", "founderc_apponrents");
                 
                    // Get all the submitted data from the form
                    
                  $sql = "INSERT INTO `demo_register_1`(`name`, `company_name`, `phone`, `email`, `image`) VALUES ('$name','$cname','$phone','$email','$countFile')";
                        } else {
                            echo "<h3>  Failed to upload image!</h3>";
                        }
                    
                  echo $sql;
                    // Execute query
                    $res=mysqli_query($db, $sql);
                    if($res)
                    {
                    
                    header("Location: https://apponrents.com/app");
                    }
}
      ?>
      <center>
        <div class="container" style="
    padding-top: 40px;
">
        <div class="contact-form">
          
          <form action="" method="post" enctype="multipart/form-data" style="padding: 18px;
        /* margin: 180px; */
        width: 301px;
        box-shadow: 27 9px 25px #f5f5f5;
        background: #eee;"
        >
            <h2>Company Details</h2>
            <div>
              <input class="fname" type="text" name="name" placeholder="Name" required="name" />
              <div><?php 'form_error'; ?></div>
              <input class="fname" type="text" name="cname" placeholder="Company Name" required="cname" />
              <input type="email" name="email" placeholder="Email" required="email" />
              <input type="text" name="phone" placeholder="Phone number" required="phone" />
              <input type="file" name="image" placeholder="Image" id="profile-img" required="" />
            </div>
            <img src="image/logo.png" id="profile-img-tag" width="100px" />
            <br>
            <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                
                                                reader.onload = function (e) {
                                                    $('#profile-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#profile-img").change(function(){
                                            readURL(this);
                                        });
                                 </script>
                                 <br>
            
            <button type="submit" value="submit" href="" name="save">Submit</button>
          </form>
        </div>
        </div>
        </center>
    </body>
</html>