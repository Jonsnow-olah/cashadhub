<?php
include_once 'config/config.php';
?>
<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.12.3, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/cashfo-239x274.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Advert | Cashad-Hub</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" type="text/css" href="lib/font-awesome/font-awesome.min.css"> 
  <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,500;0,600;1,600;1,700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
  <script src="font.js"></script>
  <link rel="stylesheet" href="assets/reset/CSS reset/login.css">
  <link rel="stylesheet" type="text/css" href="css/advert.css">
  


</head>
<body>
  <section class="menu cid-s0Gi82Vw4K" once="menu" id="menu1-25">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                         <img src="assets/images/cashfo-239x274.png" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <p class="navbar-caption-wrap">CashadHub</p>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                <li class="nav-item"><a class="nav-link link text-white display-4" href="index.php"><i class="fad fa-home-lg"></i>Home</a></li>
                <li class="nav-item"><a class="nav-link link text-white display-4" href="stat.php"><i class="fal fa-bullseye-arrow"></i>Statistics</a></li>
                <li class="nav-item"><a class="nav-link link text-white display-4" href="policy.php"><i class="fad fa-clipboard-list"></i></i>Our Policy</a></li>
                <li class="nav-item"><a class="nav-link link text-white display-4" href="contact.php"><i class="fas fa-user-headset"></i>Contact Us</a></li>
                <li class="nav-item"><a class="nav-link link text-white display-4" href="advert.php"><i class="fad fa-ad"></i>Advert</a></li>
                <li class="nav-item"><a class="nav-link link text-white display-4" href="signup.php"><i class="fad fa-users"></i>Sign up</a></li>
                <li class="nav-item"><a class="nav-link link text-white display-4" href="login.php"><i class="fal fa-sign-in-alt"></i>login</a></li>
            </ul>
            
        </div>
    </nav>
</section>
<?php
if (isset($_POST["signup"])) {
  $name = mysqli_real_escape_string($conn,$_POST["name"]);
  $phone = mysqli_real_escape_string($conn,$_POST["phone"]);
  $email = mysqli_real_escape_string($conn,$_POST["email"]);
  $username = mysqli_real_escape_string($conn,$_POST["username"]);
  $password = sha1(mysqli_real_escape_string($conn,$_POST["password"]));
  $userid = rand(9,9999);

  $insert = "INSERT into cashad_hub_advert_user (userid,name,phone,email,username,password) values ('$userid','$name','$phone','$email','$username','$password')";
  $result = $conn->query($insert)or
  die(mysqli_error($conn));

  if ($result === TRUE) {
    echo "<script>alert('Registration successfull');</script>";
    set_signup("Registration successfull","success");
  }else{
    echo "<script>alert('There was error registration');</script>";
    set_signup("There was error registration","danger");
    
  }
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = sha1($_POST["password"]);

  $select = "SELECT * from cashad_hub_advert_user where username = '$username' and password = '$password' ";
  $result = $conn->query($select)or
  die(mysql_error($conn));

  if($result->num_rows > 0){
    $_SESSION["advert_user"] = $username;
    header("location: advert/home.php");
  }else{
    echo "<script>alert('Invalid username and password');</script>";
    set_logins("Inverlid username and password","danger");
  }
}
?>
<section class="ads">
  <div class="container adverts">
    <h1 style="color: #fff;">CASHADHUB ADVERT</h1>
    <h2>Advertise and Promote your brand with us for as low as 500 Naira</h2>
    <div class="row">
      <div class="col-lg-6">
        <form name="login" class="login" method="post">
          <div class="form-container">
            <div class="form-header">
              <h2>Login</h2>
            </div>
            <span><?php echo logins(); ?></span>
            <div class="form-group">
              <label>Username:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                <input class="form-control" name="username" type="text" id="username" placeholder="Jonsnow88">
              </div>
            </div>
            <div class="form-group">
              <label>Password:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control" name="password" type="password" id="" size="50" placeholder="Jonsnow88">
              </div>
            </div>
            <div class="form-group">
              <div class="button-group w-100">
                <div class="button-group">
                  <button id="submitbutton" name="login" class="w-100 btn btn-lg" style="width: 100%" type="submit">Login</button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <p>Don't have account yet, sign up here <i class="fa fa-hand-right"></i></p>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6 bg-gradient">
        <form name="uploadads" method="post" action="">
          <div class="form-container">
            <div class="form-header">
              <h2>Sign Up</h2>
            </div>
            <span><?php echo signup(); ?></span>
            <div class="form-group">
              <label>Full Name:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control" name="name" type="text" id="brandtitle" size="50" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label>Phone:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input class="form-control" name="phone" type="text" id="couponcode" size="50">
              </div>
            </div>
            <div class="form-group">
              <label>Email:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" name="email" class="form-control" id="details" name="details">
              </div>
            </div>
            <div class="form-group">
              <label>Username:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                <input class="form-control" name="username" type="text" id="username" placeholder="Jonsnow88">
              </div>
            </div>
            <div class="form-group">
              <label>Password:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control" name="password" type="password" id="" placeholder="************">
              </div>
            </div>
            <div class="form-group">
              <label>Confirm Password:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control" name="cpassword" type="password" id="" placeholder="***********">
              </div>
            </div>
            <div class="form-group">
              <div class="button-group w-100">
                <div class="button-group">
                  <button id="submitbutton" name="signup" class="w-100 btn btn-lg" style="width: 100%" type="submit">Sign Up</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section once="footers" class="cid-s0GWNknv7A" id="footer7-2n">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="about.php">About us</a>
                    </li>   
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="contact.php">Get In Touch</a>
                    </li>
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#">Privacy Policy</a>
                    </li></ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                    
                    
                    
                    
                    
                    
                    <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/c/mobirise" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://instagram.com/mobirise" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.behance.net/Mobirise" target="_blank">
                            <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2020 - All Rights Reserved by CashFlow
                </p>
            </div>
        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/web/assets/cookies-alert-plugin/cookies-alert-core.js"></script>
  <script src="assets/web/assets/cookies-alert-plugin/cookies-alert-script.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>

  
  
<input name="cookieData" type="hidden" data-cookie-customDialogSelector='null' data-cookie-colorText='#424a4d' data-cookie-colorBg='rgba(234, 239, 241, 0.99)' data-cookie-textButton='Agree' data-cookie-colorButton='' data-cookie-colorLink='#424a4d' data-cookie-underlineLink='true' data-cookie-text="We use cookies to give you the best experience. Read our <a href='privacy.php'>cookie policy</a>.">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>