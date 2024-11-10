<?php
   include_once 'set.php';
   include_once 'head.php';
   ?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ngọc Rồng yewr</title>
<link rel="icon" href="/img/nro.png" type="img/png">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/all.min.css" />
<link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<!--  -->
</head>

<style>
    .btn-primary {
        border-color: #f44336 !important;
        color: #fff !important;
    }

    .border-primary {
        border-color: #f44336 !important;
    }

    .bg-primary,
    .btn-primary {
        background-color: #f44336 !important;
    }

    .btn-outline-primary:hover {
        background-color: #f44336;
        border-color: #f44336;
    }

    .btn-outline-primary {
        color: #f44336;
        border-color: #f44336;
    }

    .feature-box {
        padding: 38px 30px;
        position: relative;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 0 29px 0 rgb(18 66 101 / 8%);
        transition: all 0.3s ease-in-out;
        border-radius: 8px;
        z-index: 1;
        width: 100%;
    }

    .feature-icon {
        font-size: 1.8em;
        margin-bottom: 1rem;
    }

    .feature-title {
        font-size: 1.2em;
        font-weight: 500;
        padding-bottom: 0.25rem;
        text-decoration: none;
        color: #212529;
    }

    .list-group-item.active {
        background-color: #f44336;
        border-color: #f44336;
    }

    a {
        text-decoration: none;
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
    .copy-text{
        cursor: pointer;
    }
    
</style>
</style>
<div class="container py-3">
<main>
<section class="text-center container">
<div class="row py-md-3">
<div class="col-lg-6 col-md-8 mx-auto">
<h2 class="fw-light"></h2>
 <?php if($_login == null) { ?>
  <p class="lead text-muted">

</p>
            <nav class="my-2 my-md-0 mr-md-3">
               <a class="btn btn-outline-primary" href="" style="font-weight: 500"></a>
              <a class="btn btn-outline-primary" href="" style="font-weight: 500"></a>
               <?php } else { ?>
              <?php
                             if($_status == "0") {
   echo '<div "</div>';
   }
   elseif($_status == "1") {
   echo '<div "lead text-muted">Tài khoản Đã mtv <td><div>Nhận VNĐ <a href="/add_balance.php">nhận quà</a></div></td>  </tr>';
   }
   elseif($_status == "-1") {
      echo '<div "lead text-muted">Bạn Đã Xem Lần Đầu Rồi Hihi :3</div>';
      }
                             ?>
               <?php } ?>
</div>
</div>
<div class="center">
    <div class="title-behavior">
        <marquee behavior="scroll" direction="left">Chào mừng bạn đến với máy chủ Ngọc Rồng yewr, Đội ngũ Admin chúc các bạn có những trải nghiệm tuyệt vời khi tham gia vào máy chủ của yewr</marquee>
    </div>
</div>
<style>
    .center {
    display: flex;
    justify-content: center;
    align-items: center;
}

.title-behavior {
    width: 50%;
}
</style>
<tr>
                 
</section>
 
 
 <div class="col d-flex align-items-stretch">
<div class="feature-box">
<div class="text-dark">
 <a class="me-3 py-2 text-dark text-decoration-none" href="index.php.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="img/hongngoc.gif" alt="" width="40"> 
     </div>
    <div>
      <a href="top-ngoc.php" class="feature-title">TOP HỒNG NGỌC</a>
      <p>Kiểm Tra đua top Hồng Ngọc</p>
      <a href="top-ngoc.php" class="text-dark">
        Xem ngay
</a>
</div>
</div>
</div>
	
<div class="col d-flex align-items-stretch">
<div class="feature-box">
<div class="text-dark">	
<a class="me-3 py-2 text-dark text-decoration-none" href="index.php.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="img/topnap.png" alt="" width="40"> 
    </div>
    <div>
      <a href="top-nap.php" class="feature-title">TOP NẠP</a>
      <p>Kiểm Tra đua top Xem</p>
      <a href="top-nap.php" class="text-dark">
        Xem ngay
</a>
</div>
</div>
</div>


<div class="col d-flex align-items-stretch">
<div class="feature-box">
<div class="text-dark">	
<a class="me-3 py-2 text-dark text-decoration-none" href="index.php.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="img/topgt.png" alt="" width="40"> 
    </div>
    <div>
      <a href="top-gioi-thieu.php" class="feature-title">TOP GIỚI THIỆU</a>
      <p>Kiểm Tra đua top Xem</p>
      <a href="top-gioi-thieu.php" class="text-dark">
        Xem ngay
</a>
</div>
</div>
</div>



<div class="col d-flex align-items-stretch">
<div class="feature-box">
<div class="text-dark">
<a class="me-3 py-2 text-dark text-decoration-none" href="top-suc-manh.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="img/topsm.png" alt="" width="40">
</div>
<div>
<a href="top-suc-manh.php" class="feature-title">TOP SỨC MẠNH</a>
<p>Kiểm tra đua top sức mạnh.</p>
<a href="top-suc-manh.php"class="text-dark">Xem Ngay</a>
</a>
</div>
</div>
</div>


<?php
      include_once 'end.php';
      ?>
</div>