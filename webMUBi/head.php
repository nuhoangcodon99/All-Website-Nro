<?php
include __DIR__ .'/api/sql.php';
$domain = "8";
$head = '<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="theme-color" content="#000000">
    <meta name="title" content="Web đăng kí tải game">
    <meta name="description" content="Web đăng kí tải game">
    <meta name="keywords" content="Nro Mubi, Nro, Nro Lậu, Ngọc Rồng, Ngọc Rồng Online, Chú Bé Rồng, Free Thỏi Vàng">
    <meta name="author" content="Web đăng kí tải game">
    <meta property="og:type" content="website">
    <meta property="og:url" content="index">
    <meta property="og:title" content="Trang Chủ Game">
    <meta property="og:description" content="Web đăng kí tải game">
    <meta property="og:image" content="'.until::domain("Assets/Images/mubiicon").'">
    <meta property="og:image:alt" content="THAM GIA NGAY">
    <link rel="apple-touch-icon" href="'.until::domain("Assets/Images/mubiicon.html").'">
    <link rel="icon" href="'.until::domain("Assets/Images/mubiicon.html").'">
    <link rel="shortcut icon" href="../">
    <title>Nro Mubi - Trang Chủ</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="'.until::domain("script18/cute-alert.js").'"></script>
    <script src="'.until::domain("script18/network.js").'"></script>
    <script src="'.until::domain("script18/index.js").'"></script>
    <script src="'.until::domain("script18/until.js").'"></script>
    <script src="'.until::domain("Assets/Css/bootstrap.min.js").'"></script>
    <script src="'.until::domain("Assets/Css/sweetalert2@11.js").'"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

    <link href="'.until::domain("Assets/Css/bootstrap.min.css").'" rel="stylesheet">
    <link href="'.until::domain("script18/style/style.css").'" rel="stylesheet">
    <link rel="stylesheet" href="'.until::domain("Assets/Css/sweetalert2.min.css").'">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="page-layout-color">
    <div id="root">
        <div class="container">
            <div class="main">
                <div class="text-center h-auto">
                    <img src="'.until::domain("Assets/Images/EYTEQYQEWY.png").'" class="header-logo" alt="Banner" id="banner">
                </div>
                <div id="customToast" class="custom-toast"></div>
                <div class="ant-col ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                    <div class="ant-row ant-row-middle header-menu">
                        <div class="ant-col ant-col-24">
                            <div class="ant-space ant-space-align-center space-header-menu">
                                <a href="'.until::domain("tai-game").'" class="ant-space-item image-button">
                                    <img src="'.until::domain("Assets/Images/taigamengay.png").'" alt="Button Image" style="width: 165px;">
                                </a>
                              
                             <a href="'.until::domain("Users/Payment.html").'" class="ant-space-item image-button">
                                    <img src="'.until::domain("Assets/Images/napthengay.png").'" alt="Button Image" style="width: 165px;">
                                </a>
                        </div>
                    </div>
                </div>

                <div class="row text-center justify-content-center row-cols-2 row-cols-lg-6 g-2 g-lg-2 my-1 mb-2">
                    <div class="col">
                        <div class="px-2">
                            <a href="'.until::domain("trang-chu").'">
                                <img src="'.until::domain("Assets/Images/trangchu.png").'" alt="Button Image" style="width: 130px;">
                            </a>
                        </div>
                    </div>
                  
                    <div class="col">
                        <div class="px-2">
                            <a href="index.html#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <img src="'.until::domain("Assets/Images/boxzalo.png").'" alt="Box Zalo" style="width: 130px;">
                            </a>
                        </div>
                    </div>
                   
                </div>';
if(isset($_SESSION['username'])){
   $head .= '<div class="row text-center justify-content-center row-cols-2 row-cols-lg-6 g-2 g-lg-2 my-1 mb-2">
                                            <div class="col">
                            <div class="px-2">
                                <a class="btn btn-menu btn-danger w-100 fw-semibold false" href="/Profile"
                                    style="white-space: nowrap;">
                                    '.$_SESSION['username'].'                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="px-2">
                                <a class="btn btn-menu btn-danger w-100 fw-semibold false" href="'.until::domain("Logout").'">Đăng
                                    Xuất</a>
                            </div>
                        </div>
                                                            </div>
                                    <div class="alert alert-info">
                        <p style="color: white;">
                            <span class="rainbow-text">Kích hoạt ngay để có thể mở khóa các tính năng</span>
                        </p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#activeModal"
                            class="btn btn-danger rainbow-border">Kích hoạt tài khoản</a>
                    </div>';    
                       
               if(sql::isAdmin()){
                   $head .= '<div class="alert alert-info">
                        <a href="ADMIN"
                            class="btn btn-danger rainbow-border">admin</a>
                    </div> ';
               }     
                    
          $head .='<div class="modal fade" id="activeModal" tabindex="-1" aria-labelledby="activeModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" style="transform: translateY(-150px);">

        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="my-2 text-center">
                    <div><img alt="Logo" src="../Assets/Images/mubi6.gif" class="logo" style="max-width: 200px;"></div>
                    <div class="mt-2">
                        <h3 style="font-size: 1.27em;">Xác nhận kích hoạt tài khoản</h3>
                        <h4 style="font-size: 1.1em;">Sau khi kích hoạt, bạn sẽ mở khóa các tính năng giao dịch</h4>
                        <b style="color: green;">Phí kích hoạt: 10,000 Coin</b>
                        <div class="mt-2">
                            <img src="/Assets/Images/active.png" alt="Kích Hoạt" style="width: 130px; cursor: pointer;"
                                onclick="active(\''.$_SESSION['secret_key'].'\')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
 } else {
   $head .= '<div class="row text-center justify-content-center row-cols-2 row-cols-lg-6 g-2 g-lg-2 my-1 mb-2">
                                            <div class="col">
                            <div class="px-2">
                                <a class="btn btn-menu btn-danger w-100 fw-semibold false" href="'.until::domain("Login").'">Đăng nhập</a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="px-2">
                                <a class="btn btn-menu btn-danger w-100 fw-semibold false" href="'.until::domain("Register").'">Đăng
                                    kí</a>
                            </div>
                        </div>
                </div>';
     }
     $head .= '<style>
        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3498db;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            margin: auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>';
?>