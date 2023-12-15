<?php 
require_once('host/a.php');

if(isset($_SESSION["login"])){go(ADMIN_URL);die();}
?>
<!DOCTYPE html>
<html>
<head>

	<title> Kullanıcı Girişi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" type="image/png" href="<?php echo ADMIN_URL;?>login/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>login/vendor/animate/animate.css">
	<!--===============================================================================================-->  
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>login/css/main.css">

	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>login/css/sb-admin-2.css">

	<script type="text/javascript" src="assets/js/login_main.js"></script>

	<style type="text/css">
		.alert_error{
			color: red!important;
			    font-size: 14px!important;
		}
		.alert_success{
			color: green!important;
			    font-size: 14px!important;
		}
	</style>
</head>
<body>




  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?php echo ADMIN_URL;?>login/images/img-01.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" action="ajax.php?p=login" id="LoginForm" method="post" onsubmit="return false;">
          <span class="login100-form-title">
            Panel Girişi
          </span>
     	<div id="login_status"></div>

          <div class="wrap-input100 validate-input" data-validate = "Lütfen Kullanıcı Adınızı Doğru Girin...">
            <input class="input100" type="text" name="username" placeholder="Kullanıcı Adı">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Lütfen Parolanızı Doğru Girin...">
            <input class="input100" type="password" name="password" placeholder="Şifre">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn" onclick="AjaxFormS('LoginForm','login_status');">
          GİRİŞ
            </button>
          </div>

          <div class="text-center p-t-136">

         </div>
       </form>
     </div>
   </div>
 </div>


	<!--===============================================================================================-->  
	<script src="<?php echo ADMIN_URL;?>login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_URL;?>login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo ADMIN_URL;?>login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_URL;?>login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_URL;?>login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_URL;?>login/js/main.js"></script>

</body>
</html>