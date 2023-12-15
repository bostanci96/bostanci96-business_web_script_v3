<?php 
require_once('host/a.php');
if(empty($_SESSION["login"])){go(ADMIN_URL."login.php");die();}
define("ADMIN",true);
?>

<!DOCTYPE html>
<html>
<head>
	<?php require_once('inc/head.php');?>
</head>
<body class="fixed-left">
	<?php require_once('inc/logOut.php');?>       
	<div id="wrapper">
		<?php require_once('inc/topBar.php');?>
		<?php require_once('inc/solMenu.php');?>
		<div class="content-page">
			<div class="content">
				<?php
				
				if(isset($_GET["form"])){
					$form = $_GET["form"];
					$file = "formlar/".$form.".php";
					if(file_exists($file)){
						require_once($file);
					}else{
						require_once("sayfa/sayfalar.php");
					}
				} 
				elseif(isset($_GET["sayfa"])){
					$sayfa = $_GET["sayfa"];
					$file = "sayfa/".$sayfa.".php";
					
					if(file_exists($file)){
						require_once($file);
					}else{
						
						require_once("sayfa/sayfalar.php");
					}
				}else{
					
					require_once("sayfa/sayfalar.php");
				}

				?>
				<?php require_once('inc/footer.php');?>
			</div>
		</div>
	</div>
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<?php require_once('inc/scripts.php');?>
</body>
</html>