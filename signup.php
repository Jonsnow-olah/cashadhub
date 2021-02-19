<?php
require_once 'config/config.php';
$results = "";
$passport = $name = $username = $password = $cpassword = $email = $phone = $gender = $state = $date = $accname = $accnumber = $bkname =  "";
$passportError = $nameError = $usernameError = $passwordError = $cpasswordError = $emailError = $phoneError =$genderError = $stateError = $dateError = $accnameError = $accnumberError = $bknameError = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Checl for passport
    if(empty($_FILES["passport"]["name"])){
        $passwordError = "Please, select a valid passport photo";
    }else{
        $passport = check_input($_FILES["passport"]["name"]);
        $target_file = "passports/".basename($_FILES["passport"]["name"]);
    //$uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["passport"]["tmp_name"]);
        if($check === false) {
                $passportError = "<span class='error'><i class='fa fa-fw fa-warning'></i> File is not an image.<span>";  
        }else if($_FILES["passport"]["size"] > 500000) {
             $passportError = "<span class='error'><i class='fa fa-fw fa-warning'></i> Sorry, your file is too large.<span>";
        }else if($imageFileType != "jpg" && $imageFileType != "jpeg") {
             $passportError = "<span class='error'><i class='fa fa-fw fa-warning'></i> Sorry, only JPG or JPEG file is allowed.<span>";
            
        }
    }
    if(empty($_POST["name"])){
        $nameError = "Please, fill out this field";
    }else{
        $name = check_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        $nameError = "Only letters and white space allowed";
      }
    }

    if(empty($_POST["username"])){
        $usernameError = "Username is required";
    }else{
        $username = check_input($_POST["username"]);
        if(preg_match("/^[a-zA-Z @ _ .]*$/", $username)){
            $usernameError = "Invalid username entry";
        }else{
            $sql = "SELECT * from cashad_hub_users where username = '$username' ";
            $result = $conn->query($sql)or
            die(mysqli_error($conn));
            if($result->num_rows > 0){
                $usernameError = "Username already exist, please use another username";
            }
        }
    }

    if(empty($_POST["email"])){
      $emailError = "Please, fill out this field";
    }else {
        $email = check_input($_POST["email"]);
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $emailError = "Invalid email format";
        }else{
            $sql = "SELECT * from cashad_hub_users where email = '$email' ";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $emailError = "Email Already exist, please use another email";
            }
        }
    }

    if(empty($_POST["phone"])){
        $phoneError = "Please, fill out this field";
    }else{
        $phone = check_input($_POST['phone']);
        $sql = "SELECT * from cashad_hub_users where phone = '$phone' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $phoneError = "Phone number already exist, please use another phone number";
            echo "<script>document.getElementById('phoneError').style.display = 'block' </script>";
        }
    }

    if(empty($_POST["state"])){
        $stateError = "Please, select a valid state from the list";
    }else{
        $state = $_POST["state"];
    }

    if(empty($_POST["gender"])){
        $genderError = "Please, select a vlaid gender from the list";
    }else{
        $gender = $_POST["gender"];
    }

    if(empty($_POST["password"])){
        $passwordError = "Please, fill out this filed";
    }else{
        $password = check_input($_POST["password"]);
    }

    if(empty($_POST["cpassword"])){
        $cpasswordError = "Please, fill out this field";
    }else{
        $cpassword = check_input($_POST["cpassword"]);
        $password = $_POST["password"];
        if($cpassword !== $password){
            $cpasswordError = "The password you entered do not match";
        }
    }

    if(empty($_POST["date"])){
        $dateError = "Please, input a valid date of birth";
    }else{
        $date = check_input($_POST["date"]);

    }
    if(empty($_POST["accname"])){
        $accnameError = "Please, fill out this field";
    }else{
        $accname = check_input($_POST["accname"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$accname)){
        $accnameError = "Only letters and white space allowed";
        }
    }

    if(empty($_POST["accnumber"])){
      $accnumber = "Please, fill out this field";
    }else {
        $accnumber = check_input($_POST["accnumber"]);
        if(!preg_match("/^[0-9]*$/", $accnumber)){
            $accnumberError = "Account number should digits only";
        }else if(strlen($accnumber) < 10 || strlen($accnumber) > 10){
            $accnumberError = "Account number must ten didgis";
        }else{
            $sql = "SELECT * from cashad_hub_user_bank where account_num = '$accnumber' ";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $accnumberError = "Account number Already exist, please use another account number";
            }
        }
    }


    if(empty($_POST["bkname"])){
        $bknameError = "Please, fill out this field";
    }else{
        $bkname = check_input($_POST["bkname"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$bknameError)){
        $bknameError = "Only letters and white space allowed";
        }
    }

    if(empty($_POST["terms"])){
        $termseError = "Accept the terms and conditions";
    }


    if(check_input($nameError) != null || check_input($nameError) != null || check_input($passportError) != null || check_input($nameError) != null || check_input($usernameError) != null || check_input($passwordError) != null || check_input($cpasswordError) != null || check_input($emailError) != null || check_input($phoneError) != null || check_input($genderError) != null || check_input($stateError) != null || check_input($dateError) != null || check_input($accnameError) != null || check_input($accnumberError) != null || check_input($bknameError) != null){
        echo "<script> alert('There was error is registration');</script>";
    }else{
        $name = htmlspecialchars($_POST["name"]);
        $passport = htmlspecialchars($_FILES["passport"]["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $dob = htmlspecialchars($_POST["date"]);
        $gender = htmlspecialchars($_POST["gender"]);
        $state = htmlspecialchars($_POST["state"]);
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars(sha1($_POST["password"]));

        //Bank details
        $accname = mysqli_real_escape_string($conn,$_POST["accname"]);
        $accnumber = mysqli_real_escape_string($conn,$_POST["accnumber"]);
        $bkname = mysqli_real_escape_string($conn,$_POST["bkname"]);


        $num = rand(9,99);
        $num2 = rand(9,99);
        $num3 = rand(9,99);
        $numbers = $num.$num2.$num3;
        $date = time();
        $status = "New";
        $ext = explode('.', $passport);
        $ext = end($ext);
        $newfilename = $numbers.".";
        $newfilename = $newfilename.$ext;

        $passport = htmlspecialchars($newfilename);
        $target = "passports/".$newfilename;

        $insert = "INSERT into cashad_hub_users (userid,name,email,phone,dob,gender,state,username,password,passport,reg_date,status,acstatus) values ('$numbers','$name','$email','$phone','$dob','$gender','$state','$username','$password','$passport','$date','$status','Not Activated')";
        $results = $conn->query($insert)or
        die(mysqli_error($conn));

        if(move_uploaded_file($_FILES['passport']['tmp_name'], $target)){
            $msg = "Image upload successfully";
        }else{
            $msg = "There was a problem uploading image";
        }

        if($results === TRUE){
            //Insert banks details
            $bank = "INSERT into cashad_hub_user_bank (userid,account_name,account_num,bank_name,phone) values ('$numbers','$accname','$accnumber','$bkname','$phone')";
            $bankres = $conn->query($bank)or
            die(mysqli_error($conn));
            if($bankres === TRUE){
                $money = "INSERT into cashad_hub_ledger (userid,withdraw,savings) values ('$numbers',0,0)";
                $wallet = $conn->query($money)or
                die(mysqli_error($conn));
                if($wallet === TRUE){
                    $code = rand(9,9999);
                    $code2 = rand(9,9999);
                    $codes = $code.$code2;
                    $activation = "INSERT into cashad_hub_activation (userid,activation) values ('$numbers','$codes')";
                    $activationRes = $conn->query($activation)or
                    die(mysqli_error($conn));
                    if($activationRes === TRUE){
                        echo "<script>alert('Congratulations!!! Registration successfull!!!');</script>";
                    }else{
                        echo "<script>alert('Hush!!! There was error submitting your details');</script>";
                    }
                }
            }
        }
        //Insert Dowmline if set
        if(isset($_SESSION["referral"])){
            $refId = $_SESSION["referral"];
            $inRef = "INSERT into cashad_hub_ref (refuserid,inviteduserid,status) values ('$refId','$numbers','Not Activated') ";
            $inRefRes = $conn->query($inRef)or
            die(mysqli_error($conn));
        }
    }
}

function check_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
?>
<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/cashfo-239x274.png" type="image/x-icon">
  <meta name="description" content="">
  
  
   <title>CashadHub | Register </title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
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
  <script type="text/javascript" src="assets/reset/JSreset/Dynamic_State_LGA.js"></script>
  <link rel="stylesheet" href="assets/reset/CSS-reset/homepage.css">
  <link rel="stylesheet" href="assets/reset/CSS-reset/signup.css">

<style>
    form span{
        color: orange;
    }
</style>
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

<section class="main">
    <div class="wrap">
        <h2>Sign up</h2>
        <form name="signup" method="post" enctype="multipart/form-data" action="<?php echo(htmlspecialchars($_SERVER["PHP_SELF"])); ?>">
            <div class="profile-pic">
                <div class="preview">
                    <img src="assets/reset/images/profile-pic.svg" alt="">
                </div>
                <div class="upload">
                    <input type="file" name="passport" required >
                    <span><?php echo "$passportError"; ?></span>
                </div>
            </div>
            <!-- full name section -->
            <div>
                <input type="text" name="name" placeholder="Full name e.g Emeka Ayodele Musa" required pattern="(.*)\s(.*)" value="<?php if(!$results){echo($name);} ?>">
                <span><?php echo "$nameError"; ?></span>
            </div>
            <!-- username section -->
            <div>
                <input type="text" name="username" placeholder="Username e.g John007" required maxlength="15" pattern="[a-zA-z 0-9 ]{5,}" value="<?php if(!$results){echo($username);} ?>">
                <span><?php echo "$usernameError"; ?></span>
            </div>
            <!-- password section -->
            <div>
                <input type="password" name="password" placeholder="Password e.g Candycrush7@" required pattern="[a-zA-z 0-9]{6,}" maxlength="15">
                <span><?php echo "$passwordError"; ?></span>
            </div>
            <!-- retype password section -->
            <div>
                <input type="password" name="cpassword" placeholder="Retype password e.g Candycrush7@" required maxlength="15">
                <span><?php echo "$cpasswordError"; ?></span>
            </div>
            <!-- email section -->
            <div>
                <input type="email" name="email" placeholder="Email e.g JohnSnow@example.com" value="<?php if(!$results){echo($email);} ?>" required>
                <span><?php echo "$emailError"; ?></span>
            </div>
            <!-- phone no section -->
            <div>
                <input type="tel" name="phone" placeholder="Phone e.g +2348101234567" value="<?php if(!$results){echo($phone);} ?>" required >
                <span><?php echo "$phoneError"; ?></span>
            </div>
            <!-- bank account name section -->
            <div>
                <input type="text" name="accname" placeholder="B.Account name e.g Emeka Ayodele Musa" required value="<?php if(!$results){echo($accname);} ?>">
                <span><?php echo "$accnameError"; ?></span>
            </div>
            <!-- bank account number section -->
            <div>
                <input type="text" name="accnumber" placeholder="B.Account no e.g 0294001368" required value="<?php if(!$results){echo($accnumber);} ?>">
                <span><?php echo "$accnumberError"; ?></span>
            </div>
            <!-- bank account name section -->
            <div>
                <input type="text" name="bkname" placeholder="Bank name e.g First Bank of Nigeria" required value="<?php if(!$results){echo($bkname);} ?>">
                <span><?php echo "$bknameError"; ?></span>
            </div>
            <!-- gender section -->
            <div class="gender">
                <label for="">Gender:</label>
                <select name="gender" id="" required="required">
                    <?php if(!$results){echo "<option>".$gender."</option>";}else{echo "<option selected='selected'></option>";} ?>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <span><?php echo "$genderError"; ?></span>
            </div>
            <!-- date of birth section -->
            <div class="dob">
                <label for="">DOB:</label>
                <input type="date" name="date" id="today" required value="<?php if(!$results){echo($date);} ?>">
                <span><?php echo "$dateError"; ?></span>
            </div>
            <!-- sate of origin section -->
            <div class="state">
                <label for="state">State:</label>
                <select name="state" id="state" required>
                    <?php if(!$results){echo "<option>".$state."</option>";}else{echo "<option selected='selected'></option>";} ?>
                    <option value='Abia'>Abia</option>
                    <option value='Adamawa'>Adamawa</option>
                    <option value='AkwaIbom'>AkwaIbom</option>
                    <option value='Anambra'>Anambra</option>
                    <option value='Bauchi'>Bauchi</option>
                    <option value='Bayelsa'>Bayelsa</option>
                    <option value='Benue'>Benue</option>
                    <option value='Borno'>Borno</option>
                    <option value='CrossRivers'>CrossRivers</option>
                    <option value='Delta'>Delta</option>
                    <option value='Ebonyi'>Ebonyi</option>
                    <option value='Edo'>Edo</option>
                    <option value='Ekiti'>Ekiti</option>
                    <option value='Enugu'>Enugu</option>
                    <option value='Gombe'>Gombe</option>
                    <option value='Imo'>Imo</option>
                    <option value='Jigawa'>Jigawa</option>
                    <option value='Kaduna'>Kaduna</option>
                    <option value='Kano'>Kano</option>
                    <option value='Katsina'>Katsina</option>
                    <option value='Kebbi'>Kebbi</option>
                    <option value='Kogi'>Kogi</option>
                    <option value='Kwara'>Kwara</option>
                    <option value='Lagos'>Lagos</option>
                    <option value='Nasarawa'>Nasarawa</option>
                    <option value='Niger'>Niger</option>
                    <option value='Ogun'>Ogun</option>
                    <option value='Ondo'>Ondo</option>
                    <option value='Osun'>Osun</option>
                    <option value='Oyo'>Oyo</option>
                    <option value='Plateau'>Plateau</option>
                    <option value='Rivers'>Rivers</option>
                    <option value='Sokoto'>Sokoto</option>
                    <option value='Taraba'>Taraba</option>
                    <option value='Yobe'>Yobe</option>
                    <option value='Zamfara'>Zamafara</option>
                  </select>     
            </div>
            <!-- terms and condition section -->
            <div class="terms">
                <input type="checkbox" name="" required>
                <p>
                   <small> Click the checkbox to accept <a href="/policy.html"><span>Terms and Condition</span></a></small>
                </p>
            </div>
            <div class="summit">
                <input type="submit" value="Register" class="btn" required>
            </div>
        </form>
    </div>
</section>

<section once="footers" class="cid-s0GWNknv7A" id="footer7-2n">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu"> 
                    <li class="foot-menu-item mbr-fonts-style display-7">
                            <a class="text-white mbr-bold" href="about.html">About us</a>
                        </li><li class="foot-menu-item mbr-fonts-style display-7">
                            <a class="text-white mbr-bold" href="policy.html">Our Policy</a>
                        </li><li class="foot-menu-item mbr-fonts-style display-7">
                            <a class="text-white mbr-bold" href="contact.html">Get In Touch</a>
                        </li><li class="foot-menu-item mbr-fonts-style display-7">
                    </li>
                </ul>
            </div>
            <div class="social-link">
                <nav>
                    <ul>
                        <li><a href="https://twitter.com/cashadHub?s=09" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/official_cashadHub?r=nametag" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://Facebook.com/officialcashadHub" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    </ul>
                </nav>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2020 CashadHub
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
  <script src="assets/reset/JSreset/signup.js"></script>


  
  <input name="cookieData" type="hidden" data-cookie-customDialogSelector='null' data-cookie-colorText='#424a4d' data-cookie-colorBg='rgba(234, 239, 241, 0.99)' data-cookie-textButton='Agree' data-cookie-colorButton='' data-cookie-colorLink='#424a4d' data-cookie-underlineLink='true' data-cookie-text="We use cookies to give you the best experience. Read our <a href='privacy.html'>cookie policy</a>.">
  <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a>
  </div>
   <input name="animation" type="hidden">
<script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
</script>  
</body>
</html>