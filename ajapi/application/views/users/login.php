<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAADLI login page </title>
    <link rel="stylesheet" href="css/hover-min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
.lb{
  width: 100px;
  height: 40px;
  background-color: white;
  color: turquoise;
  cursor: pointer;
  
}
.lb:hover{
  color: whitesmoke;
  background:blue;
  font-size: 20px;
  box-shadow: 2px 3px 5px black;
}
</style>
</head>
<body style="background:gray;">
    <div class="container-fluid">
        <div class="row" style="min-height:100px">
            
        </div>
        <div class="row">
            <div class="col-md-4">
              
            </div>
            <div class="col-md-4" style="min-height: 400px; background-image: linear-gradient(to right,#ec1f60,#a03597); " >
                <h2 style="text-align: center; padding-top:15px;color:whitesmoke;background-image: linear-gradient(to right,#ec1f60,#9c369a) ;height: 70px; border-radius:5px;">
                    <!--<img src="<?php echo base_url() ?>assets/vendors/images/ladli.jpeg" alt="" class="light-logo" style="height: 50px; border-radius: 10px;">&nbsp;&nbsp;-->
                <img src="<?php echo base_url() ?>assets/vendors/images/ladli.jpeg" alt="" class="light-logo" style="height: 50px; border-radius: 10px;">
                </h2><hr>
                <div style="text-align: center; font-size: 20px;">
                  <form action="Admin_login" method="post">
                    <center>
                      <input type="text" name="email" placeholder="Enter Email here !" class="form-control" width="50%">
                      <br><br>
                    <input type="password" name="password" placeholder="password" class="form-control" width="50%">
                    <br><br>
                   
                    <input type="submit"  class="btn btn-danger" value="Login">
                 
                    </center>
                </form>
               </div>
              </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>