<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
      $conn=mysqli_connect('localhost','founderc_ladli','founderc_ladli','founderc_ladli');
      $name=$_GET['name'];
      $lat=$_GET['lat'];
      $long=$_GET['long'];
      $user_id=$_GET['user_id'];
      $crimetype=$_GET['crimetype'];
      date_default_timezone_set('Asia/Kolkata');
      $datetime=date("d/m/Y H:i:s");
      $sub="CRIME REPORTED";
      $query="SELECT * FROM `user_contact` WHERE `user_id`='$user_id'";
         $res=mysqli_query($conn,$query);
         foreach($res as $re)
         {
             $mob=$re['phone'];
      $msg="<body style='margin: 0; background-color: #e9205f; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
      <table class='nl-container' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color:#e9205f;'>
        <tbody>
			<tr>
				<td>
					<table class='row row-1' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color:#e9205f; color: #000000; width: 680px;' width='680'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='icons_block block-1' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='vertical-align: middle; color: #000000; text-align: center; font-family: inherit; font-size: 14px;'>
																
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-2' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-size: auto;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-size: auto; background-color: #ffffff; color: #000000; border-top: 0 solid #FFFFFF; border-right: 0px solid #FFFFFF; border-left: 0 solid #FFFFFF; border-bottom: 0 solid #FFFFFF; border-radius: 30px 30px 0 0; width: 680px;' width='680'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='heading_block block-2' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='width:100%;text-align:center;padding-top:70px;padding-right:60px;padding-bottom:30px;padding-left:60px;'>
																<h1 style='margin: 0; color: #020b22; font-size: 40px; font-family: Poppins, Arial, Helvetica, sans-serif; line-height: 150%; text-align: center; direction: ltr; font-weight: 700; letter-spacing: normal; margin-top: 0; margin-bottom: 0;'><span class='tinyMce-placeholder'>Pink Power </span></h1>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-3' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;' width='680'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='image_block block-1' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='width:100%;padding-right:0px;padding-left:0px;'>
																<div class='alignment' align='center' style='line-height:10px'><img class='fullMobileWidth' src='https://ladli.foundercodes.com/api/image/logo.jpeg' style='display: block; height: auto; border: 0; width: 442px; max-width: 100%;' width='442' alt='Social profile' title='Social profile'></div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-4' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;' width='680'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 60px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='paragraph_block block-1' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td class='pad' style='padding-top:5px;padding-right:60px;padding-bottom:5px;padding-left:60px;'>
																<div style='color:#878787;font-size:16px;font-family:Poppins, Arial, Helvetica, sans-serif;font-weight:400;line-height:120%;text-align:center;direction:ltr;letter-spacing:0px;mso-line-height-alt:19.2px;'>
																	<p style='margin: 0;'><p>You have received this e-mail from 'Pink Power App' as $name has shared $crimetype crime at location.  https://maps.google.com/?q=$lat,$long . +91$mob. The Time of incident is: $datetime. Get Direction</p> 

We recommend you to contact $name for her well-being.<br> We wish you all the safety and security.
<br>
'Pink Power Team'
<br>
Safety | Awareness | Empowerment</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-5' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;' width='680'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 50px; padding-right: 50px; vertical-align: top; padding-top: 0px; padding-bottom: 40px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='heading_block block-1' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='width:100%;text-align:center;padding-top:5px;padding-bottom:5px;'>
																<h3 style='margin: 0; color: #1a30eb; font-size: 30px; font-family: Poppins, Arial, Helvetica, sans-serif; line-height: 120%; text-align: center; direction: ltr; font-weight: 400; letter-spacing: normal; margin-top: 0; margin-bottom: 0;'><span class='tinyMce-placeholder'>Connect with us</span></h3>
															</td>
														</tr>
													</table>
													<table class='heading_block block-2' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='width:100%;text-align:center;padding-top:5px;padding-bottom:10px;'>
																
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
										<table class='row row-9' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f2f5ff; color: #000000; border-radius: 0 0 30px 30px; width: 680px;' width='680'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 15px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='heading_block block-1' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='width:100%;text-align:center;padding-top:20px;padding-bottom:20px;'>
																	<p style='margin: 0; font-size: 50px; text-align: center; font-family: inherit; mso-line-height-alt: 15px;'><span style='font-size:15px;'><span style>© 2023 inaequalis.org.&nbsp;</span></span><span style='font-size:15px;'><span style> All Rights Reserved.</span></span></p>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-11' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;' width='680'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='icons_block block-1' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;'>
																<table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
																	<tr>
																		<td class='alignment' style='vertical-align: middle; text-align: center;'>
																			<!--[if vml]><table align='left' cellpadding='0' cellspacing='0' role='presentation' style='display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;'><![endif]-->
																			<!--[if !vml]><!-->
																			<table class='icons-inner' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;' cellpadding='0' cellspacing='0' role='presentation'>
																				<!--<![endif]-->
																				<tr>
																					<td style='vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 6px;'><a href='' target='_blank' style='text-decoration: none;'><img class='icon' alt='Designed by Inaequalis' src='https://ladli.foundercodes.com/api/image/inaequalis.jpeg' height='32' width='34' align='center' style='display: block; height: auto;background-color:white; margin: 0 auto; border: 0;'></a></td>
																					<td style='font-family: Poppins, Arial, Helvetica, sans-serif; font-size: 15px; color: #9d9d9d; vertical-align: middle; letter-spacing: undefined; text-align: center;'><a href='https://www.inaequalis.org/' target='_blank' style='color: #9d9d9d; text-decoration: none;'>Designed by Inaequalis</a></td>
																				</tr>
																			</table>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>							</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
      </table>
      </body>";
      $headline="";
         
         $subject = $sub;
         
         $message = "<b>$headline</b>";
         $message .= "<h1>$msg</h1>";
             $email=$re['email'];
            //echo $email;
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