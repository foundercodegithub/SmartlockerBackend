
		<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="msapplication-TileColor" content="#ff685c">
		<meta name="theme-color" content="#32cafe">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

		<!-- Title -->
		<title>Smart locker Admin Login</title>
		<link rel="stylesheet" href="https://smartlockerindia.com/assets/logincss/font-awesome.min.css">

		<!-- Font Family -->
		<link rel="stylesheet" href="https://smartlockerindia.com/assets/logincss/font-awesome.min.css">

		<!-- Font Family-->
		<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="https://smartlockerindia.com/assets/logincss/dashboard.css" rel="stylesheet" />

		<!-- c3.js Charts Plugin -->
		<link href="https://smartlockerindia.com/assets/css/c3-chart.css" rel="stylesheet" />

		<!-- Morris.js Charts Plugin -->
		<link href="https://smartlockerindia.com/assets/css/morris.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="https://smartlockerindia.com/assets/logincss/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="https://smartlockerindia.com/assets/logincss/sidemenu.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="https://smartlockerindia.com/assets/logincss/plugin.css" rel="stylesheet" />

  </head>


   
                   

<body class="login-img">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col mx-auto">
              <div class="text-center mb-6">
                <img src="https://smartlockerindia.com/assets/logobg.png" class="" alt="" width="15%">

              </div>
              <div class="row justify-content-center">
                <div class="col-md-5">
                  <div class="card-group mb-0">
                    <div class="card p-4">
                      <form method="post" role="form" action="https://mcops.in/index.php/customer/processLogin">
                                                                          <div class="card-body">
                          <h1>Login</h1>
                          <p class="text-muted">Sign In to your account</p>
                          <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="email" name="username" class="form-control"  id='registered_email' placeholder="Enter registered email id" >
                          </div>
                        <!--   <div class="input-group mb-3 device_div" style="display: none;">-->
                        <!--    <span class="input-group-addon"><i class="fa fa-user"></i></span>-->
                            
                        <!--    <select class="form-control" name='phone_model' id='phone_model'>-->
                          
                        <!--</select>-->
                        <!--  </div>-->
                          
                          <div class="input-group mb-4 password_div" style=''>
                            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                          </div>
                          <div class="row">
                            <div class="col-12" > 
                              <button type="button" class="btn btn-gradient-primary btn-block" id='email_enter'>Submit</button>
                      <button type='submit' class="btn btn-gradient-primary btn-block" id='main_submit'  style="display: none;">Submit</button>
                              <!-- <button type="submit" class="btn btn-gradient-primary btn-block">Login</button> -->
                            </div>
                            <div class="col-12" >
                              <a href="https://mcops.in/index.php/customer/forgot_password_view" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
                            </div>
                            
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- <div class="card text-white bg-primary py-5 d-md-down-none login-transparent">
                      <div class="card-body text-center justify-content-center ">
                        <h2>Sign up</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.ed ut perspiciatis unde omnis iste natus error sit voluptatem  </p>
                        <a href="register.html" class="btn btn-gradient-success active mt-3">Register Now!</a>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


	

   <script src="https://smartlockerindia.com/assets/jquery/jquery.min.js"></script>
  <script src="https://smartlockerindia.com/assets/jquery/bootstrap.bundle.min.js"></script>
  <script src="https://smartlockerindia.com/assets/jquery/jquery.easing.min.js"></script>
  <script src="https://smartlockerindia.com/assets/jquery/validate.js"></script>
  <script src="https://smartlockerindia.com/assets/jquery/jquery.sticky.js"></script>
  <script src="https://smartlockerindia.com/assets/jquery/isotope.pkgd.min.js"></script>
  <script src="https://smartlockerindia.com/assets/jquery/venobox.min.js"></script>
  <script src="https://smartlockerindia.com/assets/jquery/jquery.waypoints.min.js"></script>
  <script src="https://smartlockerindia.com/assets/jquery/owl.carousel.min.js"></script>
  <script src="https://smartlockerindia.com/assets/aos/aos.js"></script>
  <!-- Template Main JS File -->


		<script>
			



			 // $.growl({
    //   title: "Hii",
    //   message: "Welcome to Dashboard ",
    //   type:"success"
    // });
			

			

			
		</script>
		
		
		
		
		

		<!-- popover js -->
		

	</body>
</html>
		<!-- Custom Js-->
	<script type="text/javascript">
    $(document).ready(function(){
        
        //get device name in dropdown
        $('#email_enter').click(function()
        {
            var email = $('#registered_email').val();
            if(email == '')
            {
                alert("Please enter email");
                $('#registered_email').focus();
                return false;
            }
            else
            {
                $.ajax({
                    type:'post',
                    data:{'email':email},
                    url :'https://mcops.in/index.php/customer/checkEmailExist',
                    success:function(res)
                    {
                      // alert(res);
                      if(res == 'false')
                      {
                        alert('Email id does not exists');
                        return false;
                      }
                      else
                      {
                        var res_data = JSON.parse(res);
                        console.log(res_data);
                        var dropdown = '';
                        dropdown += "<option value=''>select</option>";
        
                        for(var i=0;i<res_data.length;i++)
                        {
                          // console.log(res_data[i].code_id);  
                          dropdown +="<option value='"+res_data[i].code_id+"'>"+res_data[i].phone_model+"</option>"; 
                        }
        
                        $('#email_enter').css('display','none');
                        $('.device_div').css('display','');
                        $('.password_div').css('display','');
                        $('#main_submit').css('display','block');
                        $('#phone_model').html(dropdown);
        
                      }
                    }
                });
            }
        });

      
        // alert('dfs');
        $('#frgt_pwd_form').validate({
            rules: {
              email:{
                  required:true
              },
              phone_model:{
                required:true
              },
              password:{
                required:true
              }
            },
            messages:{
              email :{
                  required: "Please enter email id"
              },
              phone_model:{
                required : 'Please select device'
              },              
              password:{
                required : 'Please enter password'
              }
            }
        });                    
    });
</script>
