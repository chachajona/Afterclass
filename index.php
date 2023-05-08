<?php
session_start();
  //Student status
  if(isset($_SESSION['username']) && (!isset($_SESSION['accessToken']))) {
    //Link to student dashboard
    header('location:studentDashboard.php?q=1');
  }

  //Admin status
  else if(isset($_SESSION['username']) && isset($_SESSION['accessToken']) && 
    $_SESSION['accessToken'] == '751cb3f4aa17c36186f4856c8982bf27') {
    //Link to admin dashboard  
    header('location:adminDashboard.php?q=0');
  }
else{}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="./image/favicon.ico" type="image/icon" sizes="16x16">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> After Class  </title>
  <!---------CUSTOM CSS ----------->
  <link rel="stylesheet" href="css/main.css">
  <link  rel="stylesheet" href="css/font.css">

  <!---------BOOTSTRAP CSS-------->
  <link  rel="stylesheet" href="css/bootstrap.min.css"/>
  <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
  
  <!---------JQUERY & BOOTSTRAP JS-------->
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>

  <!--------GOOGLE FONT-----------> 
  <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@300;400;500;600;700&display=swap" rel="stylesheet" type='text/css'> 

    <?php
    //Send warning messages
      if (@$_GET['w']) {
        echo '<script>alert("'. @$_GET['w'].'");</script>';
      }
    ?>

  <script>
    //Handle error message
    function validateForm() {
      //Name
      var name = document.forms["form"]["name"].value; 
      if (name == null || name == "") {
        document.getElementById("errormsg").innerHTML="Name must be filled out.";
        return false;
      }

      //Student ID
      var studentId = document.forms["form"]["studentId"].value;
      if(studentId == null || studentId == "") {
        document.getElementById("errormsg").innerHTML="Student ID must be filled out.";
        return false;
      }

      //Class
      var subject = document.forms["form"]["className"].value;
      if (subject == "") {
        document.getElementById("errormsg").innerHTML="Please select your class";
        return false;
      }

      //Gender
      var gender = document.forms["form"]["gender"].value;
      if (gender =="") {
        document.getElementById("errormsg").innerHTML="Please select your gender";
        return false;
      }

      //Username
      var x = document.forms["form"]["username"].value;
        if (x.length == 0) {
          document.getElementById("errormsg").innerHTML="Please enter a valid username";
          return false;
        }
        if (x.length < 4) {
          document.getElementById("errormsg").innerHTML="Username must be at least 4 characters long";
          return false;
        }

      //Phone number
      var m = document.forms["form"]["phno"].value;
        if (m.length != 10) {
          document.getElementById("errormsg").innerHTML="Phone number must be 10 digits long";
          return false;
        }

      //Password
      var pw = document.forms["form"]["password"].value;
      if(pw == null || pw == ""){
        document.getElementById("errormsg").innerHTML="Password must be filled out";
        return false;
      }
      if(pw.length<6 || a.length>15){
        document.getElementById("errormsg").innerHTML="Passwords must be 6 to 15 characters long.";
        return false;
      }
      if(!pw.match()) {

      }
    }

  </script>
</head>

<body>
<!------HEADER----->
<div class="header">
  <!-----TOP NAVBAR------->
  <div class="row">
    <!--------LOGO-------->
    <div class="col-lg-6">
      <img src="./image/favicon.ico" alt="">
      <span class="logo" style="font-size: 40px;">After Class</span>
    </div>

    <!---------LOGIN BUTTON------->
    <div class="col-md-2 col-md-offset-4">
      <a href="#" class="btn btn-primary logb" data-toggle="modal" data-target="#userLogin"> 
        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;
        <span class="title1"><b> Login </b> </span>
      </a>
    </div>
    
    <!-----------LOGIN FORM------------>
    <div class="modal fade" id="userLogin">
      <div class="modal-dialog">
        <div class="modal-content title1">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title title1"><span style="color:darkblue;font-size:12px;font-weight: bold">Login as Student</span></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="login.php?q=index.php" method="POST">
            <fieldset>
            <div class="form-group">
                <label class="col-md-3 control-label" for="username"></label>  
                <div class="col-md-6">
                  <input id="username" name="username" placeholder="Username" class="form-control input-md" type="username">
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="password"></label>
              <div class="col-md-6">
                <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Log in</button>
          </fieldset>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------BACKGROUND------------>
<div class="bg1">

  <!-------REGISTRATION FORM---------->
  <div class="row">
    <div class="col-md-7"></div>
      <div class="col-md-4 panel"> 
      <form class="form-horizontal" name="form" action="register.php?q=studentDashboard.php" onSubmit="return validateForm()" method="POST">
      <fieldset>
      <div class="form-group">
        <label class="col-md-12 control-label" for="name"></label>  
        <div class="col-md-12">
          <h3 align="center">Create your Account</h3>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-12 control-label" for="name"></label>  
        <div class="col-md-12">
          <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red">
          <?php
            if (@$_GET['q7']) {
                echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
            }
          ?>
          </div>
        </div>
      </div>
      
      <!----------NAME INPUT-------->
      <div class="form-group">
        <label class="col-md-12 control-label" for="fullname"></label>  
        <div class="col-md-12">
          <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text" value="
          <?php
            if (isset($_GET['name']))
            {
            echo $_GET['name'];
            }?>">
          </div>
      </div>

      <!---------STUDENT ID INPUT---------->
      <div class="form-group">
        <label class="col-md-12 control-label" for="studentId"></label>  
        <div class="col-md-12">
          <input id="studentId" name="studentId" placeholder="Enter your Student ID" class="form-control input-md" type="text" value="<?php
          if (isset($_GET['studentId']))
          {
          echo $_GET['studentId'];
          }?>">
        </div>
      </div>

      <!--------GENDER INPUT--------->
      <div class="form-group">
        <label class="col-md-12 control-label" for="gender"></label>
        <div class="col-md-12">
          <select id="gender" name="gender" placeholder="Select your gender" class="form-control input-md" >
          <option value="" 
          <?php
            if (!isset($_GET['gender']))
                echo "selected";
            ?>>
          Select your gender</option>

          <option value="M" 
          <?php
            if (isset($_GET['gender']))
            {
              if ($_GET['gender'] == "M")
              echo "selected";
            }
          ?>>
          Male</option>

          <option value="F" 
          <?php
            if (isset($_GET['gender']))
            {
              if ($_GET['gender'] == "F")
                echo "selected";
            }
          ?>>
          Female</option> 
          </select>
        </div>
      </div>

      <!--------CLASS INPUT-------->
      <div class="form-group">
        <label class="col-md-12 control-label" for="className"></label>
        <div class="col-md-12">
          <select id="className" name="className" placeholder="Select your class" class="form-control input-md" >
          <option value="" 
          <?php
            if (!isset($_GET['className']))
                echo "selected";
          ?>>
          Select your class</option>

          <option value="FORM1" 
          <?php
            if (isset($_GET['className']))
            {
              if ($_GET['className'] == "FORM1")
              echo "selected";
            }
          ?>>
          Form 1</option>

          <option value="FORM2" 
          <?php
            if (isset($_GET['className']))
            {
              if ($_GET['className'] == "FORM2")
              echo "selected";
            }
          ?>>
          Form 2</option>
          </select>
        </div>
      </div>

      <!----------USERNAME INPUT------------>      
      <div class="form-group">
        <label class="col-md-12 control-label title1" for="username"></label>
        <div class="col-md-12">
          <input id="username" name="username" placeholder="Create your username" class="form-control input-md" type="username" value="
          <?php
            if (isset($_GET['username']))
            {
              echo $_GET['username'];
            };
            ?>" style="
              <?php
              if (isset($_GET['q7']))
                  echo "border-color:red";
              ?>
          ">
        </div>
      </div>

      <!---------PHONE NUMBER INPUT---------->
      <div class="form-group">
        <label class="col-md-12 control-label" for="phno"></label>  
        <div class="col-md-12">
          <input id="phno" name="phno" placeholder="Enter your mobile number" class="form-control input-md" type="number" value="
          <?php
            if (isset($_GET['phno']))
            {
              echo $_GET['phno'];
            }
          ?>
          ">
        </div>
      </div>

      <!----------PASSWORD INPUT--------->
      <div class="form-group">
        <label class="col-md-12 control-label" for="password"></label>
        <div class="col-md-12">
          <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">
        </div>
      </div>

      <!-----------REGISTER BUTTON---------->
      <div class="form-group">
        <label class="col-md-12 control-label" for=""></label>
        <div class="col-md-12" style="text-align: center"> 
          <input  type="submit" value=" Register Now " class="btn btn-primary" style="text-align:center" />
        </div>
      </div>

      </fieldset>
      </form>
    </div>
  </div>
</div>

<!-----FOOTER------->
<div class="row footer">
  <div class="col-md-3 box">
    <a href="#" data-toggle="modal" data-target="#adminLogin" style="color:lightyellow">Admin Login</a></div>
    <div class="col-md-3 box">
      <span href="#" data-target="#login" style="color:lightyellow">Established by Dang Quang Dung 2022<br><br></span>
    </div>
    <!-- <div class="col-md-2 box">
      <a href="feedback.php" style="color:lightyellow;" onmouseover="this.style('color:yellow')" target="new">Feedback</a></div> -->

      <!--------ADMIN LOGIN------------>
      <div class="modal fade" id="adminLogin">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title"><span style="color:darkblue;font-size:12px;font-weight: bold">Login to Server</span></h4>
            </div>
            <div class="modal-body title1">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form role="form" method="post" action="admin.php?q=index.php">
                  <div class="form-group">
                    <input type="text" name="uname" maxlength="20"  placeholder="Username" class="form-control"/> 
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" maxlength="30" placeholder="Password" class="form-control"/>
                  </div>
                  <div class="form-group" align="center">
                    <input type="submit" name="login" value="Login" class="btn btn-primary" />
                  </div>
                  </form>
                </div>
                <div class="col-md-3"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
