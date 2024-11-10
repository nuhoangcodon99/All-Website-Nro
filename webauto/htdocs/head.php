<?php
   ob_start();
   
   ini_set('display_errors', '1');
   ini_set('display_startup_errors', '1');
   error_reporting(E_ALL);
   
   include_once 'cauhinh.php';
   include_once 'config.php';
   include_once 'set.php';
   ?>
<!doctype html>
<html lang="en">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
	  <link rel="shortcut icon" type="img/nro.png" href="./img/nro.png"/>
      <meta name="author" content="">
      <title>ᑎGọᑕ ᖇồᑎG YEᗯᖇ</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/all.min.css" />
<link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <style>
         html {
         font-size: 14px;
         }
         @media (min-width: 768px) {
         html {
         font-size: 16px;
         }
         }
         .container {
         max-width: 960px;
         }
         .pricing-header {
         max-width: 700px;
         }
         .card-deck .card {
         min-width: 220px;
         }
         .border-top {
         border-top: 1px solid #e5e5e5;
         }
         .border-bottom {
         border-bottom: 1px solid #e5e5e5;
         }
         .box-
		 
		 
		 shadow {
         box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
         }
        .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #f44336;
    }
		 .nav-link {
        color: #f44336;
    }

    .nav-link:focus,
    .nav-link:hover {
        color: #cd3a2f;
    }
      </style>
   </head>
   <body>
   
      <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
         <div class="d-flex flex-column flex-md-row align-items-center container">            
           <a href="index.php"class="d-flex align-items-center text-dark text-decoration-none">
              <img class="img-fluid" src="images/nro1.png" alt="" width="999" height="999"> 
            </a>
            
<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto" style="font-weight: 50">
<a class="me-3 py-2 text-dark text-decoration-none" href="index.php.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="" alt="" width="60"> 
<a class="me-3 py-2 text-dark text-decoration-none" href="index.php.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="images/trangchu.gif" alt="" width="60"> </a>
<a class="me-3 py-2 text-dark text-decoration-none" href="tai-ve.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="images/taigame.gif" alt="" width="60" height="50"> </a>
<a class="me-3 py-2 text-dark text-decoration-none" href="nap-tien.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="images/naptien.gif" alt="" width="60" height="50"> </a>
<a class="me-3 py-2 text-dark text-decoration-none" target="_blank" href="https://zalo.me/g/bcfenb155"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="images/boxzalo.gif" alt="" width="60" height="50"> </a>

</nav>
            <?php if($_login == null) { ?>
            <nav class="my-2 my-md-0 mr-md-3">
			               <nav class="my-2 my-md-0 mr-md-3">
<a class="me-3 py-2 text-dark text-decoration-none" href="/login.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="images/dangnhap.gif" alt="" width="60"> </a>
     <a class="me-3 py-2 text-dark text-decoration-none" href="danh-sach-top.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="images/xembxh.gif" alt="" width="60"> </a>
<a class="me-3 py-2 text-dark text-decoration-none" href="/dang-ky.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="images/dangky.gif" alt="" width="60"> </a>
			   
               <?php } else { ?>
<title>Ngọc Rồng </title>
			   
 <a class="" href="profile.php" style=": 0">  <img class="img-fluid" src="img/coin.png" alt="" width="19" height="999"> </a>
			   
               <a><?php echo ($_username); ?> : <?php echo number_format($_coin); ?> VND </a>
			      </div>
      
			   <a class="me-3 py-2 text-dark text-decoration-none" href="gt.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="img/gioith.gif" alt="" width="60"> </a>
               </a>	
               <?php } ?>
            </nav>
         </div>
      </div>
   </body>
