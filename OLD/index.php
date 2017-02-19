
<?php
/*session_start();


if(isset($_SESSION['member_info'])!="")         // if tf_member in a session 
{
	header("Location: member_info.php");                
}

if(isset($_SESSION['volunteer_info'])!="")         // if tf_volunteer in a session 
{
	header("Location: volunteer_info.php");                
}

if(isset($_SESSION['super_admin'])!="")         // if super_admin in a session 
{
	header("Location: super_admin.php");                
}


*/





     //.....connection
session_start();
include_once 'dbconnect.php';
	   
	   
	   
	   
	   
	   
	    if(isset($_POST['sub']))
	   {
	       
		   $name=$_POST["name"];
		   $email=$_POST["email"];
		   $fback=$_POST["fback"];
		   
		  
		   if(empty($name) || empty($email) || empty($fback) )
		   {
		     $message = "one or more field/s is empty!";
              echo "<script type='text/javascript'>alert('$message');</script>";
		   }
		   
		   
		    else
		   {
		   $re=mysql_query("insert into fback(name,email,fback) values('".$name."','".$email."','".$fback."')")  or die(mysql_error());
		   
		   }
		   
		   
		   }
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   //registration code
	   
	   
       if(isset($_POST["reg"]))
	   {
	       
		   $name=$_POST["name"];
		   $course=$_POST["course"];
		   $branch=$_POST["branch"];
		   $year=$_POST["year"];
		   $email=$_POST["email"];
		   $mob=$_POST["mob"];
		   $erp_id=$_POST["erp_id"];
		   $password=$_POST["password"];
		   $category=$_POST["category"];
		   $gender=$_POST["gender"];
		   
		   
		  // echo  $name;exit;
		   
		   
		   
		   
		   if(empty($name) || empty($course) || empty($branch) || empty($year) || empty($email) || empty($mob) || empty($erp_id) || empty($password))
		   {
		     $message = "one or more field/s is empty..";
              echo "<script type='text/javascript'>alert('$message');</script>";
		   }
		   else
		   {
		   
		   
		   //email exist or not
		   
		   
if($category == "Member")
		   
		   {
		   
		$query = "SELECT email FROM m_info WHERE email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
	//	if(mysql_query("insert into m_info(name,course,branch,year,email,mob,erp_id,password,gender) //values('".$name."','".$course."','".$branch."','".$year."','".$email."','".$mob."','".$erp_id."','".$password."','".$gender."')")  or //die(mysql_error())     ) 
		if(mysql_query("insert into m_info(name,course,branch,year,email,mob,erp_id,password,gender) values('$name','$course','$branch','$year','$email','$mob','$erp_id','$password','$gender')")  or die(mysql_error())     ) 
			
		{
			?>
		  			<script>alert('you have been sucessfully registerd! please Login in now...');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken! :(  try another...');</script>
			<?php
	}	  

	
	} //for member
	
	
	
	
	
	
	
	
	
	
	
	
	
	if($category == "Volunteer")
		   
		   {
		   
		$query = "SELECT email FROM v_info WHERE email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("insert into v_info(name,course,branch,year,email,mob,erp_id,password,gender) values('".$name."','".$course."','".$branch."','".$year."','".$email."','".$mob."','".$erp_id."','".$password."','".$gender."')"))
		{
			?>
		
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken! :(  try another...');</script>
			<?php
	}	  

	
	} //for volunteer
	
	
	
	
	
	
	
	
	
	
	
	
	
	

		   }

	   }


 
	 //login code  
	   
	   
	   	if(isset($_POST["log"])!=null)
		{
		                                                  
		     $email=$_POST["email"];
			 $password=$_POST["password"];

			                                                    //member-techfusion
			 
			 $a2=mysql_query("select m_info_id, email, password from m_info where email='".$email."' and password='".$password."'", $con);
			 $row2=mysql_fetch_array($a2);
			 $c2=mysql_num_rows($a2);
			 
			 
			                                                    //volunteer-techfusion
			 
			 
			 $a3=mysql_query("select v_info_id, email, password from v_info where email='".$email."' and password='".$password."'", $con);
			 $row3=mysql_fetch_array($a3);
			 $c3=mysql_num_rows($a3);
			 
			                                                      //super_admin-techfusion
			 
			 
			 $a4=mysql_query("select super_id, email, password from super_admin where email='".$email."' and password='".$password."'", $con);
			 $row4=mysql_fetch_array($a4);
			 $c4=mysql_num_rows($a4);
			 

			 if($c2>0)
		      {
		$_SESSION['member_info'] = $row2['m_info_id'];
		header("Location: member_info.php");
	          }


	else if($c3>0)
		      {
		$_SESSION['volunteer_info'] = $row3['v_info_id'];
		header("Location: volunteer_info.php");
	          }
			  
		else if($c4>0)
		      {
		$_SESSION['super_admin'] = $row4['super_id'];
		header("Location: super_admin.php");
	          }	  
		  
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong :( try again... !');</script>
        <?php
	}
	
	

		}
	   
	   
	   
	   
	   
	   
	   
	   
	  

?>


























<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TechFusion</title>
		<link rel="shortcut icon" href="./images/tft.ico" />
        <meta name="keywords" content="" />
		<meta name="description" content="" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>
		
		
		
		  <!-- CSS for slidesjs.com example -->
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- End CSS for slidesjs.com example -->
		

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		
		
			<!-- -------------------------blast from the past------------------------- -->

		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
    <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
    <script src="js/modernizr.custom.17475.js"></script>

        <!-- ----------------------blast from the past---------------------------------- -->
		
		
		<!------------------preloader---------------->
		
		<link rel="stylesheet" type="text/css" href="css/effect1.css" />
    <script src="js/modernizr.custom1.js"></script>
		
		
		
		
		

		<link rel="stylesheet" type="text/css" href="css/index1.css" />

<style>

::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    #000000;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:    #000000;
   opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:    #000000;
   opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:    #000000;
}
:placeholder-shown { /* Standard (https://drafts.csswg.org/selectors-4/#placeholder) */
  color:    #000000;
}





input::-webkit-input-placeholder{
    color:black;
}
input:-moz-placeholder {
    color:black;
}



.grow { transition: all .2s ease-in-out; }
.grow:hover { transform: scale(1.1); }

    #slides {
      display: none
    }

    #slides .slidesjs-navigation {
      margin-top:5px;
    }

    a.slidesjs-next,
    a.slidesjs-previous,
    a.slidesjs-play,
    a.slidesjs-stop {
      background-image: url(./images/img/btns-next-prev.png);
      background-repeat: no-repeat;
      display:block;
      width:12px;
      height:18px;
      overflow: hidden;
      text-indent: -9999px;
      float: left;
      margin-right:5px;
    }

    a.slidesjs-next {
      margin-right:10px;
      background-position: -12px 0;
    }

    a:hover.slidesjs-next {
      background-position: -12px -18px;
    }

    a.slidesjs-previous {
      background-position: 0 0;
    }

    a:hover.slidesjs-previous {
      background-position: 0 -18px;
    }

    a.slidesjs-play {
      width:15px;
      background-position: -25px 0;
    }

    a:hover.slidesjs-play {
      background-position: -25px -18px;
    }

    a.slidesjs-stop {
      width:18px;
      background-position: -41px 0;
    }

    a:hover.slidesjs-stop {
      background-position: -41px -18px;
    }

    .slidesjs-pagination {
      margin: 7px 0 0;
      float: right;
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(./images/img/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
  </style>
  <!-- End SlidesJS Optional-->

  <!-- SlidesJS Required: These styles are required if you'd like a responsive slideshow -->
  <style>
    #slides {
      display: none
    }

    .container {
      margin: 0 auto
    }

    /* For tablets & smart phones */
    @media (max-width: 767px) {
      body {
        padding-left: 20px;
        padding-right: 20px;
      }
      .container {
        width: auto
      }
    }

    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }

    /* For smaller displays like laptops */
    @media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 724px
      }
    }

    /* For larger displays */
    @media (min-width: 1200px) {
      .container {
        width: 1170px
      }
    }
  </style>
	<link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="js/modernizr.custom.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="http://thecodeplayer.com/u/js/jquery.easing.min.js" type="text/javascript"></script>
</head>
    
<body id="page-top" style="overflow-x: hidden;">
        
        
		
		<!-- ---------Preloader-------------------------------------------------------------------------------- -->
        

    <div id="ip-container" class="ip-container">


      <!-- initial header -->
      <header class="ip-header">
        
        
        <div class="ip-loader" style="height: 100%; width:100%;">
		<div style="top:55%; left: 43%; height:60%; width:50%; position: absolute;">
		  
          <img src="images/preloader.gif" style="height:50%; width:25%;"></img>
          <p style="color: lightgrey; font-family:Open Sans; font-size: x-large;margin-left:6.5%"></br>Loading</p>
        </div>
          <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 0 0">
            <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
			
            <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
          </svg>
        </div>
      </header>

      <div class="ip-main">
		
		
		
		
		
		
		
		
		
          <!--HTML Codes Of PopUp-->

  <!--HTML Codes For Log-in PopUp-->
<div class="popup">
	 <h3>Log-In</h3>
	 <form method="post" action="#" class="flp">
	 	   <input class="input" type="text" name="email" id="contact-name" placeholder="Email Id" title="User ID" required="flag" /><br />
		   <input class="input" type="password" name="password" id="contact-email" placeholder="Password" title="Password" required="flag" /><br />
		   <input type="submit" name="log" class="style1" value="Log-in" /> 
 	 	   <button onClick="location.href='#login_form1'" id="login_pop1" class="button-reg style3 big register-btn">Registration</button>
	 </form>

    <a class="close"></a>
</div>
  <!--Code Ends-->

  <!--HTML Codes For Registration PopUp-->								
<div class="popup1">
	 <h3 style="margin-bottom:5px;margin-top:0px;">Registration</h3>
	 <form method="post" action="#" class="flp">
	 	   <input class="input" style="display:inline; width:40%; color:black;" type="text" name="name" id="contact-name" placeholder="Full Name" title="Full Name" required="flag" />
		   
		   
		   <select style="display:inline; width:35%;" class="input" name="gender" required="flag">
                <option class="select" value="" disabled selected>Gender</option>
                <option class="select" value="M">Male</option>
                <option class="select" value="F">Female</option>
	            
            </select>
			<select class="input" style="display:inline; width:28%;" name="course" required="flag">
           <option class="select" value="" disabled selected>Course</option>
                <option class="select" value="B.Tech">B.Tech</option>
                <option class="select" value="M.Tech">M.Tech</option>
                <option class="select" value="M.C.A">M.C.A</option>
                <option class="select" value="B.C.A">B.C.A</option>
	            <option class="select" value="B.J.M.C">B.J.M.C</option>
                <option class="select" value="L.L.B.">L.L.B.</option>
	            <option class="select" value="Other">Other</option>
            </select>
		    <select class="input" style="display:inline; width:28%;" name="branch" required="flag">
                <option value="" disabled selected>Branch</option>
                <option class="select" value="C.S.">C.S.</option>
                <option class="select" value="E.E.">E.E.</option>
                <option class="select" value="E.C.">E.C.</option>
	            <option class="select" value="B.T.">B.T.</option>
                <option class="select" value="C.A.">Computer Application</option>
                <option class="select" value="Civil">C.E.</option>
	            <option class="select" value="Mechanical">M.E</option>
	            <option class="select" value="None">NONE</option>
	            <option class="select" value="Other">Other</option>
            </select>
		    <select class="input" style="display:inline; width:28%;" name="year" required="flag">
                <option class="select" value="" disabled selected>Year</option>
                <option class="select" value="I year">I year</option>
                <option class="select" value="II year">II year</option>
	            <option class="select" value="III year">III year</option>
                <option class="select" value="IV year">IV year</option>
                <option class="select" value="Other">Other</option>
	
           </select>
		   <input  style="font-color:black;" class="input" type="text" name="erp_id" id="contact-email" placeholder="Roll No." title="Your Roll No." required="flag" />
		   <input style="color:black;" class="input" style="display:inline; width:49%;" type="text" name="email" id="contact-email" placeholder="E-mail ID" title="Your E-Mail ID" required="flag" />
		   <input style="color:black;" class="input" style="display:inline; width:49%;" type="text" name="mob" id="contact-email" placeholder="Mobile Number" title="Your Mobile Number" required="flag" />
		   <input style="color:black;" class="input" style="display:inline; width:49%;" type="password" name="password" id="contact-email" placeholder="Account Password" title="Your New Account Password" required="flag" />
           <select class="input" style="display:inline; width:49%;" name="category" required="flag">
                <option class="select" value="" disabled selected>Register As</option>
                <option class="select" value="Member">Member</option>
                <option class="select" value="Volunteer">Volunteer</option>
           </select>
		   <div class="btn-container">
			<input style="width:49%; display:inline;" type="submit" class="style1" name="reg" value="Register Now" />
			<button style="width:49%; display:inline;" onClick="location.href='#login_form'" id="login_pop" class="button-login style3 big popuplink">Log-In</button>
		   </div>
	 </form>
    
	 <a class="close"></a>
</div>
  <!--Code Ends-->

  <!--Code Ends-->
        
        
        

        <div style="font-family: FontAwesome; position: fixed; top: 0px; background: rgba(15, 15, 15, 0.8);box-shadow: 0 3px 6px black;" class="templatemo-top-menu">
            <div class="container">
                <!-- Static navbar -->
				
                <div style="background:rgba(15,15,15,0);" class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a href="#" style="margin-top: 5px;" class="navbar-brand"><img src="images/logo_png_fireworks.png"  /></a>
                        </div>
                        <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 22px;">
                                <li class="active"><a href="#page-top">HOME</a></li>
                                <li><a href="#templatemo-about">ABOUT</a></li>
                                <li><a href="#templatemo-team">TEAM</a></li>
                                <li><a href="#templatemo-gallery">GALLERY</a></li>
                                <li><a href="#templatemo-news">NEWS</a></li>
                                <li><a href="" class="popuplink" id="login_pop">LOGIN</a></li>
                                <li><a href="#templatemo-contact">CONTACT</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>
        
        <div>
            <!-- Carousel -->
			
			
			
			
			
			
			
  <!-- SlidesJS Required: Start Slides -->
  <!-- The container is used to define the width of the slideshow -->
  <div class="container " style="width:100%; padding-left:0px;padding-right:0px;">
    <div id="slides" >
	<img src="./images/img/0.jpg" style="max-width:100%; max-height:100%;" >
      <img src="./images/img/1.jpg" style="max-width:100%; max-height:100%;" >
      <img src="./images/img/2.jpg" style="max-width:100%; max-height:100%;">
      <img src="./images/img/3.jpg" style="max-width:100%; max-height:100%;">
      <img src="./images/img/4.jpg" style="max-width:100%; max-height:100%;">
	  <img src="./images/img/5.jpg" style="max-width:100%; max-height:100%;">

    </div>
  </div>
  <!-- End SlidesJS Required: Start Slides -->

  <!-- SlidesJS Required: Link to jQuery -->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <!-- End SlidesJS Required -->
            
            <script type="text/javascript">
                jQuery( function(){
                    jQuery( '.popuplink' ).click(function(){
                        jQuery( '.popup' ).slideDown();
                        jQuery( '.popup1' ).hide();
                    });       
                    jQuery( '.popup .close, .popup1 .close' ).click(function(){
                         jQuery(this).parent().slideUp();
                    });
                    jQuery( '.register-btn' ).click( function(){ jQuery( '.popup' ).hide(); jQuery( '.popup1' ).slideDown(); } );
                } ); 
            </script>

  <!-- SlidesJS Required: Link to jquery.slides.js -->
  <script src="js/jquery.slides.min.js"></script>
  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->

  
    <script>
       jQuery(function ($){
      $('#slides').slidesjs({
        width: 1030,
        height: 450,
        play: {
		pauseOnHover: false,
          active: true,
          auto: true,
          interval: 5000,
          swap: true
        }
      });
    });
  </script>
  <!-- End SlidesJS Required -->
			
			
			
			
			
			

        </div>

        <div class="templatemo-welcome" id="templatemo-about">
            <div class="container">
                <div class="templatemo-slogan text-center">
                    <span class="txt_darkgrey">Welcome to </span><span class="txt_orange" >TechFusion</span>
                    <p class="txt_slogan"><i>We are a team of enthusiasts dedicated towards finding, creating and encouraging technical skills in the students.</i></p>
                </div>	
            </div>
        </div>
        
        <div class="templatemo-service">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="templatemo-service-item">
                            <div>
                                <img src="images/leaf.png" alt="icon" class="grow"/>
                                <span class="templatemo-service-item-header">INSPIRE</span>
                            </div>
                            <p>Based on our technology, TECHFUSION CLUB inspires and combine the custom hardware and software with proven technologies to create a versatile and powerful yet incredibly easy to use meeting environment that inspires creativity and collaboration of the work.</p>
                           
                            <br class="clearfix"/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="templatemo-service-item" >
                            <div>
                                <img src="images/mobile.png" alt="icon" class="grow"/>
                                <span class="templatemo-service-item-header">INNOVATE</span>
                            </div>
							<p>We Demonstrate how innovation is used to create wealth, productivity growth, and improved quality of life among the corresponding members of the group,
look at the process of innovation, and the eventual outcomes, examines how the process is being stimulated by new technologies such as the internet.</p>
                           <!-- <div class="text-center">
                                <a href="#" 
                                	class="templatemo-btn-read-more btn btn-orange">READ MORE</a>
                            </div> -->
                            <br class="clearfix"/>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                        <div class="templatemo-service-item">
                            <div>
                                <img src="images/battery.png" alt="icon" class="grow"/>
                                <span class="templatemo-service-item-header" >INVENT</span>
                            </div>
                            <p>We basically deal with all the latest news regarding the technologies invention and it focuses on the topic - "what new can be done in order to benifit the people by inventing new ideas and thoughts related with the technical ideas".</p>
                            <!--<div class="text-center">
                                <a href="#" 
                                	class="templatemo-btn-read-more btn btn-orange">READ MORE</a>
                            </div> -->
                            <br class="clearfix"/>
                        </div>
                        <br class="clearfix"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="templatemo-team" id="templatemo-team">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left"/><span class="grow">MEET OUR TEAM</span>
                            <hr class="team_hr team_hr_right" />
                        </div>
                    </div>
                </div>
				<section class="slider">
<div class="slide slide--current" data-content="content-1">
        <div class="slide__mover">
          <div class="zoomer flex-center">

            <div class="slide-title" style="margin-bottom:30px">
            <h4>FACULTY CO-ORDINATORS</h4>
            </div>  

			
            <div class="slider-row slider-faculty" >
            <div class="member-thumb">
                  <div class="member-thumb-wrap">
                    <img class="zoomer__image img-responsive" src="images/members/1b.jpg" alt="Dr. R S Bajpai" />
                    <div class="thumb-overlay">
                        <a  class="member-name">Prof.(Dr.) R S Bajpai</br> Dean Of Electrical Engg.</br>SRMU, Lucknow</a>
                    </div>
                  </div>
                </div>
                <div class="member-thumb " >
                  <div class="member-thumb-wrap">
                    <img class="zoomer__image img-responsive" src="images/members/sir.jpg" alt="Er. Abhishek Bajpai"  />
                    <div class="thumb-overlay">
                        <a  class="member-name">Er. Abhishek Bajpai</br> Asst. Professor CSE</br>SRMU Lucknow</a>
                    </div>
                  </div>
                </div>
                <div class="member-thumb">
                  <div class="member-thumb-wrap">
                    <img class="zoomer__image img-responsive" src="images/members/MKB_Photo.jpg" alt="Dr. Mahesh Kumar Basantani" />
                    <div class="thumb-overlay">
                        <a class="member-name">Dr. Mahesh Kumar Basantani</br> Professor, IBST</br>SRMU, Lucknow</a>
                    </div>
                  </div>
                </div>
                <div class="member-thumb">
                  <div class="member-thumb-wrap">
                    <img class="zoomer__image img-responsive" src="images/members/1a.jpg" alt="Mr. Alkesh Agarwal" />
                    <div class="thumb-overlay">
                        <a  class="member-name">Mr. Alkesh Agarwal</br> Asso. Professor ECE</br>SRMU, Lucknow</a>
                    </div>
                  </div>
                </div>

                <div class="clear"></div>
            </div>
			
			
			
			
			<div class="slider-row slider-faculty" >
            <div  class="member-thumb">
                  <div class="member-thumb-wrap">
                    <img class="zoomer__image img-responsive" src="images/members/1c.JPG" alt="Yashwant Kr Singh" />
                    <div class="thumb-overlay">
                        <a  class="member-name">Er. Yashwant Kr Singh</br> Asst. Professor EE</br>SRMU, Lucknow</a>
                    </div>
                  </div>
                </div>
				
				 <div  class="member-thumb">
                  <div class="member-thumb-wrap">
                    <img class="zoomer__image img-responsive" src="images/members/1d.JPG" alt="Yashwant Kr Singh" />
                    <div class="thumb-overlay">
                        <a  class="member-name">Er. Neeraj kr Gupta</br> Asst. Professor ME</br>SRMU, Lucknow</a>
                    </div>
                  </div>
                </div>
                

                <div class="clear"></div>
            </div>
			
			
			
			
			
			
			
			
			

          </div>
        </div>
       
      </div>

      <div class="slide" data-content="content-2">
        <div class="slide__mover">
          <div class="zoomer flex-center">

            <div class="slide-title" style="margin-bottom:30px";>
            <h4>WEB/TECH TEAM</h4>
            </div> 

            <div class="slider-row">
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive"  src="images/members/1.jpg" alt="Kartik Mishra" />
                                    <div class="thumb-overlay">
                                        <a class="member-name">Kartik Mishra </br> B.Tech IV Year-CSE</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/5.jpg" alt="Ashish Upadhyay" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Ashish Upadhyay </br> B.Tech III Year-CSE</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/6.jpg" alt="Harshita Rastogi" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Harshita Rastogi </br> B.Tech III Year-CSE</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/8.jpg" alt="Mohd. Adnan" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Mohd. Adnan </br> B.Tech III Year-EE</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/2.jpg" alt="Aviral Bajpai" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Aviral Bajpai </br> B.Tech IV Year-CSE</a>
                                    </div>
                                </div></div>
                <div class="clear"></div>
            </div>
            <div class="slider-row" style="padding-left:16%;">
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/23.jpg" alt="Shreyansh Mehta" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Shreyansh Mehta</br>B.Tech I Year-CSE</a>
                                    </div>
                                </div></div>
                                              
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/26.jpg" alt="Abhishek Chaudhary" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Abhishek Chaudhary</br>B.Tech I Year-CSE</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/4.JPG" alt="Shreshtha Saxena" />
                                    <div class="thumb-overlay">
                                        <a class="member-name">Shreshtha Saxena</br>MCA I Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/11.jpg" alt="Brij Kishor Sharma" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Brij Kishor Sharma</br>B.Tech III Year-EE</a>
                                    </div>
                                </div></div>

                <div class="clear"></div>
            </div>

          </div>
        </div>
       
      </div>
      <div class="slide" data-content="content-3">
        <div class="slide__mover">
          <div class="zoomer flex-center">

			<div class="slide-title" style="margin-bottom:30px";>
				<h4>MANAGEMENT/PROMOTION TEAM</h4>
            </div> 
            
               <div class="slider-row">

                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/ayush.jpg" alt="Ayush Gupta" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Ayush Gupta</br>B.Tech IV Year-CSE</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/9.jpg" alt="Abhijit Srivastava" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Abhijit Srivastava </br>B.Tech III Year-BT</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/vishwas.jpg" alt="Vishwas Mohan" />
                                    <div class="thumb-overlay">
                                        <a class="member-name">Vishwas Mohan</br>B.Tech III Year-CSE</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/3.jpg" alt="Mohd. Zahid" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Mohd. Zahid</br>BCA III Year-CSE</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/12.jpg" alt="Mohd. Shawez" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Mohd. Shawez</br>BCA III Year</a>
                                    </div>
                                </div></div>
                <div class="clear"></div>
            </div>
            <div class="slider-row">
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/aastha.jpg" alt="Aastha Singhal" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Aastha Singhal</br>B.Tech CSE II Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/jagrit.JPG" alt="Jagrit Vishwakarma" />
                                    <div class="thumb-overlay">
                                        <a class="member-name">Jagrit Vishwakarma</br>B.Tech CSE II Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/arushi.jpg" alt="Arushi Tiwari" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Arushi Tiwari</br>B.Tech CSE II Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/uzma.jpg" alt="Uzma Tufail" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Uzma Tufail</br>B.Tech CSE II Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/7.jpg" alt="Sagar Rastogi" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Sagar Rastogi</br>B.Tech CSE III Year</a>
                                    </div>
                                </div></div>

                <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
	   <div class="slide" data-content="content-4">
        <div class="slide__mover">
          <div class="zoomer flex-center">

			<div class="slide-title" style="margin-bottom:30px";>
				<h4>MANAGEMENT/PROMOTION TEAM </h4>
            </div> 
            
               <div class="slider-row">

                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/pooja.jpg" alt="Pooja Agrawal" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Pooja Agrawal </br>B.Tech CSE II Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/priyanka.jpg" alt="Priyanka Babar" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Priyanka Babar </br>B.tech BT I Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/sparsh.jpg" alt="Sparsh Srivastava" />
                                    <div class="thumb-overlay">
                                        <a  class="member-name">Sparsh Srivastava</br>B.Tech CSE I Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/shim.jpg" alt="Shimona Agarwal" />
                                    <div class="thumb-overlay">
                                        <a class="member-name">Shimona Agarwal</br>B.Tech CSE II Year</a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/25.jpg" alt="Utkarsh Dubey" />
                                    <div class="thumb-overlay">
                                        <a href="#" class="member-name">Utkarsh Dubey</br>B.Tech CSE II Year</a>
                                    </div>
                                </div></div>
                <div class="clear"></div>
            </div>
            <div class="slider-row">
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/50.jpg" alt="Manpreet Singh" />
                                    <div class="thumb-overlay">
                                        <a href="#" class="member-name">Manpreet Singh</br>Diploma CS I Year</a>
                                    </div>
                                </div></div>
								
								 <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/208.jpg" alt="Ashutosh Nath Tiwai" />
                                    <div class="thumb-overlay">
                                        <a href="#" class="member-name">Ashutosh Nath Tiwai</br>B.Tech CSE III Year</a>
                                    </div>
                                </div></div>
								 <!--
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/ni.png" alt="" />
                                    <div class="thumb-overlay">
                                        <a href="#" class="member-name"></a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/ni.png" alt="" />
                                    <div class="thumb-overlay">
                                        <a href="#" class="member-name"></a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/ni.png" alt="" />
                                    <div class="thumb-overlay">
                                        <a href="#" class="member-name"></a>
                                    </div>
                                </div></div>
                                              <div class="member-thumb"><div class="member-thumb-wrap">
                                    <img class="zoomer__image img-responsive" src="images/members/ni.png" alt="" />
                                    <div class="thumb-overlay">
                                        <a href="#" class="member-name"></a>
                                    </div>
                                </div></div>
-->
                <div class="clear"></div> 
            </div>
          </div>
        </div>
      </div>
	   <div class="slide" data-content="content-5">
        <div class="slide__mover">
          <div class="zoomer flex-center">

			<div class="slide-title" style="margin-bottom:30px";>
				<h4>VOLUNTEETRS</h4>
            </div> 
            
               <div class="slider-row">
               <table style="border: 2px solid white;width:100%;  border-radius: 10px; box-shadow: 0 0 10px #05b0f3; " >
			   
			   <tr >
			   <td style="border: 1px solid white; width:33%;" class="grow">
                <h4>Harshit Agarwal  </h4>
                <h4>Tej Pratap Singh  </h4>         
				<h4>Kartike Tripathi  </h4>
			    <h4>Ahmed Aksari  </h4>
				<h4>Arpit Agarwal  </h4>
				                


			   </td>
			   <td style="border: 1px solid white;width:33%" class="grow">
               
			    <h4>Hemant Gupta  </h4>
                <h4>Shivam pandey  </h4>         
				<h4>Satya Singh  </h4>
			    <h4>Awantika Sharma  </h4>
				<h4>Shivendra Agarwal  </h4>



			   </td>
			   <td style="border: 1px solid white;width:33%" class="grow">

                 <h4>Mansi Saxena  </h4>
                <h4>Vidushi Pandey  </h4>         
				<h4>Leena latwal  </h4>
			    <h4>Divyanshu Singh  </h4>
				<h4>Puneet Yadav  </h4>






			   </td>
			   </tr>
			   
			   </table>
             
            </div>
            <div class="slider-row">
                      
            </div>
          </div>
        </div>
      </div>

      <nav class="slider__nav">
        <button class="button button--nav-prev"><i class="fa fa-arrow-left"></i><span class="text-hidden">Previous product</span></button>
        <button class="button button--nav-next"><i class="fa fa-arrow-right"></i><span class="text-hidden">Next product</span></button>
      </nav>
</section>

            </div>
        </div><!-- /.templatemo-team -->
		
		
		
		
		
		
<!-- ----------------------------blast from the past------------------------- -->
        <div id="templatemo-gallery" style="height:600px; margin-bottom:30px; z-index:-10000;  background:transparent url(images/pattern.png) repeat top left;" >
            <div class="container">
               <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 20px; margin-bottom:50px" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey grow"><strong>BLAST FROM THE PAST</strong></span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <!-- <br class="clearfix"/> -->
                </div>


                    <div class="container demo-1" style="border-radius: 10px/90px;">
      

            <div class="main" style="height: 100%; width: 820px; margin-top:-80px;background-color: #333333;border-color: black; border-width: 5px; box-shadow: 0 0 50px #61ABEA; 
">


        
        <ul id="carousel" class="elastislide-list" style=" height:450px; width:825px;">
         <li style="height: 100%; min-width: 100%;"><img src="images/gallery/1.jpg" alt="" style="height:100%; width: 100%;"/></li>
         
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/2.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/3.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/4.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/5.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/6.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/7.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/8.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/9.jpg" alt="image01" style="height:100%; width: 100%"/></li>

          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/10.jpg" alt="image01" style="height:100%; width: 100%;"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/11.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/12.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/13.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/14.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/15.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/16.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/17.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/18.jpg" alt="image01" style="height:100%; width: 100%"/></li>

          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/19.jpg" alt="image01" style="height:100%; width: 100%;"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/20.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/21.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/22.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/23.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/24.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/25.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/26.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/27.jpg" alt="image01" style="height:100%; width: 100%"/></li>

          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/28.jpg" alt="image01" style="height:100%; width: 100%;"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/29.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/30.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/31.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/32.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/33.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/34.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/35.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/36.jpg" alt="image01" style="height:100%; width: 100%"/></li>

          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/37.jpg" alt="image01" style="height:100%; width: 100%;"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/38.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/39.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/40.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/41.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/42.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/43.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/44.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/45.jpg" alt="image01" style="height:100%; width: 100%"/></li>

          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/46.jpg" alt="image01" style="height:100%; width: 100%;"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/47.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/48.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/49.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/50.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/51.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/52.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/53.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/54.jpg" alt="image01" style="height:100%; width: 100%"/></li>

          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/55.jpg" alt="image01" style="height:100%; width: 100%;"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/56.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/57.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/58.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/59.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/60.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/61.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/62.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/63.jpg" alt="image01" style="height:100%; width: 100%"/></li>

          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/64.jpg" alt="image01" style="height:100%; width: 100%;"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/65.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/66.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/67.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/68.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/69.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/70.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/71.jpg" alt="image01" style="height:100%; width: 100%"/></li>
          <li style="height: 100%; min-width: 100%;"><img src="./images/gallery/72.jpg" alt="image01" style="height:100%; width: 100%"/></li>  
        </ul>


        
        
        
      </div>


    </div>
    

    





                  
            </div><!-- /.container -->
        </div> <!-- /.templatemo-portfolio -->

<!-- -------------------------blast from the past------------------------------------ -->
		
		
		
		
		
        <div id="templatemo-news">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 0px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey grow">TIMELINE</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <br class="clearfix"/>
                </div>
                
                <div class="blog_box">
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                               
                                    <img class="img-responsive grow" src="images/blog-image-1.jpg" alt="gallery 1" />
                               
                            </li>
                            <li  class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header" style="font-size:14px;">WEB DESIGNING-DEVELOPMENT</span><br/>
                                    <span>Presented by: <a class="link_orange" href="#"><span class="txt_orange" style="font-size:11px;"><p>Kartik Mishra & Ashish Upadhyay</p></span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">26 Aug 2015</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                     The different areas of web design include web graphic design; interface design; authoring, including standardized code and proprietary software; user experience design; and search engine optimization.Web development encompasses many different skills and disciplines in the dynamic maintenance of websites.
                                </p>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 1 -->
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                                <img class="img-responsive grow" src="images/blog-image-2.jpg" alt="gallery 2" />
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header" style="font-size:14px;">E- HEALTH </span><br/>
                                    <span>Presented by : <a class="link_orange" href="#"><span class="txt_orange" style="font-size:11px;"><p>Abhijeet srivastavab & Priyanka babbar</p></span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">23 Sep 2015</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                        E health is seen by some as possibly the most important revolution in healthcare since the advent of modern medicine.  E health makes use of developments in computer technology and telecommunications to deliver health information and services more effectively and efficiently.
                                </p>
                            </li>
                        </ul>	
                    </div><!-- /.blog_post 2 -->
                    
                    <div class="templatemo_clear"></div>
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                                <img class="img-responsive grow" src="images/blog-image-3.jpg" alt="gallery 3" />
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header" style="font-size:14px;">BLUE JACKING</span><br/>
                                    <span>Presented by : <a class="link_orange" href="#"><span class="txt_orange" style="font-size:11px;">Shreshta Saxena
</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">30 Sep 2015</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                       Bluejacking is the sending of unsolicited messages over Bluetooth to Bluetooth-enabled devices such as mobile phones, PDAs or laptop computers, sending a vCard which typically contains a message in the name field (i.e., for bluedating or bluechat) to another Bluetooth-enabled device via the OBEX protocol.
                                </p>
                            </li>
                        </ul>	
                    </div><!-- /.blog_post 3 -->
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                          
                                    <img class="img-responsive grow" src="images/blog-image-4.jpg"  alt="gallery 4" />
                               
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header" style="font-size:14px;">WIRELESS PENETRATION</span><br/>
                                    <span>Presented by : <a class="link_orange" href="#"><span class="txt_orange" style="font-size:11px;">Ved prakash & Md. Adnan</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">14 Oct 2015</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                    Wireless Attack and Penetration Assessments are strategic and isolated attacks against the client’s wireless systems. SecureState consultants will simulate a hacker and attempt to identify, exploit, and penetrate weaknesses within these systems.
                                </p>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 4 -->
                    
                </div>
            </div>
        </div>

        <div id="templatemo-contact">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header head_contact">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey grow">CONTACT US</span>
                            <hr class="team_hr team_hr_right hr_gray"/>
                        </div>
                    </div>

                    <div class="col-md-8">
						<div class="contact-us">
							<div class="contact-desc">For any query: </div>
							<div class="contact-name">
								<h3 class="contact-name-member"><strong>Abhishek Bajpai</strong></h3>
								<p><strong>Asst. Professor<br />Dept. Of CSE, SRMU, Lucknow</strong></p>
								<p><strong>Mob: +91 9454072736</strong></p>
							</div>
							<div class="contact-name">
								<h3 class="contact-name-member">Ashish Upadhyay</h3>
								<p>B.Tech 3rd Year<br />Dept. Of CSE, SRMU, Lucknow</p>
								<p>Mob: +91 7607318618</p>
							</div>
							
						</div>
                        <div class="templatemo-contact-map" id="map-canvas"> </div>  
                        <div class="clearfix"></div>
                        <i>You can find us on this map at <span class="txt_orange">Deva Road</span> in Lucknow.</i>
                    </div>
                    <div class="col-md-4 contact_right">
                        <p>Shri Ramswaroop Memorial University, <br />Village-Hadauri, Post-Tindola, <br />Lucknow-Deva Road, Barabanki, Lucknow<br />Uttar Pradesh, India- 225003.</p>
                        <p><img src="images/phone1.png" class="grow"  alt="icon 2" /> 05248 – 262640 (Fax) &nbsp&nbsp 05248 – 262639</p>
                        <p><img src="images/globe.png"  class="grow" alt="icon 3" /><a class="link_orange" href="#"><span class="txt_orange">www.techfusion.srmu.ac.in</span></a></p>
						
						
						
                        <form method="post" class="form-horizontal" action="#">
                            <div class="form-group">
								<input class="form-control" type="text" name="name"  placeholder="Name"  required="flag" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email..." maxlength="40" />
                            </div>
                            <div class="form-group">
                                <textarea  class="form-control" name="fback" style="height: 130px;" placeholder="Write down your feedback here..."></textarea>
                            </div>
                            <button type="submit" name="sub" class="btn btn-orange pull-right">SEND</button>
                        </form>
						
						
                        	
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /#templatemo-contact -->


        <div class="templatemo-tweets">
            <div class="container">
                <div class="row" style="margin-top:20px;">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-1">
                                <img src="images/quote.png" alt="icon" />
                        </div>
                        <div class="col-md-7 tweet_txt" >
                                <span>All of the biggest technological inventions created by man - the airplane, the automobile, the computer - says little about his intelligence, but speaks volumes about his laziness.</span>
                                <br/>
                                <span class="twitter_user">Mark kennedy</span>
                        </div>
                        <div class="col-md-2">
                        </div>
                 </div><!-- /.row -->
            </div><!-- /.container -->
        </div>

        <div class="templatemo-footer" >
            <div class="container">
                <div class="row">
                    <div class="text-center">

                        <div class="footer_container">
                            <ul class="list-inline">
                                <li>
                                    <a href="http://www.fb.com/techfusion.srmu/">
                                        <span class="social-icon-fb"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.instagram.com/techfusion_club/">
                                        <span class="social-icon-rss"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.twitter.com/techfusion_club/">
                                        <span class="social-icon-twitter"></span>
                                    </a>
                                </li>

                            </ul>
                            <div class="height30"></div>
                            <a class="btn btn-lg btn-orange" href="#page-top" role="button" id="btn-back-to-top">Back To Top</a>
                            <div class="height30"></div>
                        </div>
                        <div class="footer_bottom_content">
                   			Copyright © 2016 <a href="#">TechFusion</a> 
                            | Designed by Web Team, TechFusion
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

		
		</div>
    </div>
	<!-- ----------------------------------------------------preloader---------------------------------------------- -->
	<script src="js/classie1.js"></script>
    <script src="js/pathLoader.js"></script>
    <script src="js/main1.js"></script>
		
		    <!-- -------------------blast from the past---------------- -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="js/jquery.elastislide.js"></script>
    <script type="text/javascript">
      
      $( '#carousel' ).elastislide();
      
    </script>
<!-- ------------------------------------ -->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        <script src="js/classie.js"></script>
    <script src="js/dynamics.min.js"></script>
    <script src="js/main.js"></script>
        <script src="js/bootstrap.min.js"  type="text/javascript"></script>
        <script src="js/stickUp.min.js"  type="text/javascript"></script>
        <script src="js/colorbox/jquery.colorbox-min.js"  type="text/javascript"></script>
        <script src="js/templatemo_script.js"  type="text/javascript"></script>
		<!-- templatemo 395 urba5c -->
    </body>
</html>