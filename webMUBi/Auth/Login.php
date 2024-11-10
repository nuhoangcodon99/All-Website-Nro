<?php
include "../head.php";
$_SESSION['secret_key'] = md5(rand(1 , 999999) . time());
if(isset($_SESSION['username'])){
   include '../404.html';
   die();
} else {
   echo $head;
}
?>
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="my-2">
                                    <a href="https://zalo.me/g/kgckwc140" class="btn btn-menu btn-danger w-100 fw-semibold my-1">Box
                                        Zalo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    #myModal .modal-content {
                        background-color: #FCE3C6 !important;
                    }

                    #myModal a.btn.btn-menu.btn-danger.w-100.fw-semibold.my-1 {
                        border-radius: 10px;
                        background-color: #8f34f5 !important;
                        color: #ffffff !important;
                        box-shadow: none !important;
                    }

                    /* Hiệu ứng nhấp nháy 7 màu cho chữ */
                    @keyframes rainbow {

                        14% {
                            color: orange;
                        }

                        28% {
                            color: yellow;
                        }

                        48% {
                            color: pink;
                        }

                        84% {
                            color: violet;
                        }

                    }

                    .rainbow-text {
                        animation: rainbow 3s infinite;
                    }

                    /* Hiệu ứng border 7 màu chạy xung quanh nút */
                    @keyframes rainbow-border {
                        0% {
                            border-color: red;
                        }

                        14% {
                            border-color: orange;
                        }

                        28% {
                            border-color: yellow;
                        }

                        42% {
                            border-color: green;
                        }

                        56% {
                            border-color: blue;
                        }

                        70% {
                            border-color: indigo;
                        }

                        84% {
                            border-color: violet;
                        }

                        100% {
                            border-color: red;
                        }
                    }

                    .rainbow-border {
                        animation: rainbow-border 1s infinite;
                    }
                </style>
                <style>
                    .ant-list-item-meta {
                        display: flex;
                        flex: 1 1;
                        align-items: flex-start;
                        max-width: 100%;
                    }

                    .ant-list-item-meta-content {
                        flex: 1 0;
                        width: 0;
                        color: rgba(0, 0, 0, .85);
                    }

                    .ant-list-item-meta-title {
                        margin-bottom: 4px;
                        color: rgba(0, 0, 0, .85);
                        font-size: 14px;
                        line-height: 1.5715;
                    }

                    .ant-list-item-meta-description {
                        color: rgba(0, 0, 0, .45);
                        font-size: 14px;
                        line-height: 1.5715;
                    }
                </style><div class="container pb-5">
    <form class="form-signin" method="post">
        <div class="card">
            <div class="card-body">
                                <h1 class="h3 mb-3 font-weight-normal text-center">Đăng nhập</h1>
                <div id="thongbao"></div>
                <div class="form-group mb-2">
                    <label class="sr-only">Tài khoản</label>
                    <input type="text" class="form-control" placeholder="Tài khoản" required="" id="username">
                </div>
                <div class="form-group mb-2">
                    <label class="sr-only">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" required="" id="password">
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" class="form-checkbox" name="remember" value="forever"> Nhớ đăng nhập
                    </label>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-info btn-block text-white" onclick="login('<?php echo$_SESSION['secret_key'];?>')" type="button" id="Login">Đăng nhập</button>
                </div>
                <div class="text-center pt-2">
                    Bạn chưa có tài khoản <a href="Register.html">Đăng ký ngay</a>
                </div>
                

            </div>
        </div>
    </form>
    <style>
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px 0;
            margin: 0 auto;
        }
    </style>
</div>
<div class="modal fade" id="serverModal" tabindex="-1" aria-labelledby="serverModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="my-2">
                    <div class="text-center"><img alt="Logo" src="../Assets/Images/mubi6.gif" class="logo"
                            style="max-width: 200px;"></div>
                </div>
                <div class="text-center fw-semibold">
                    <div class="mb-2" style="font-size: 14px;">THÔNG BÁO</div>
                    <div class="mb-2" style="font-size: 11px;">Chào mừng đến với máy chủ <strong>NRO MUBI</strong> hãy truy cập box zalo để cập nhật thêm tin tức nhé
                    </div>

                    <div class="mt-2">
                        <a href="https://zalo.me/g/kgckwc140" id="serverTeamButton" target="_blank"
                            class="btn-rounded btn btn-primary btn-sm" style="padding: 10px;">Box Zalo</a>
                        <a href= "https://www.facebook.com/profile.php?id=61561238576194"  id="serverTeamButton"
                            class="btn-rounded btn btn-primary btn-sm" style="margin-left: 20px; padding: 10px;">Fanpage
                            FB</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activeModal" tabindex="-1" aria-labelledby="activeModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" style="transform: translateY(-150px);">

        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="my-2 text-center">
                    <div><img alt="Logo" src="../Assets/Images/logo.png.html" class="logo" style="max-width: 200px;"></div>
                    <div class="mt-2">
                        <h3 style="font-size: 1.27em;">Xác nhận kích hoạt tài khoản</h3>
                        <h4 style="font-size: 1.1em;">Sau khi kích hoạt, bạn sẽ mở khóa các tính năng giao dịch</h4>
                        <b style="color: green;">Phí kích hoạt: 10,000 Coin</b>
                        <div class="mt-2">
                            <img src="https://nromubi.com/Auth/\Assets\Images\active.png" alt="Kích Hoạt" style="width: 130px; cursor: pointer;"
                                onclick="activateAccount()">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="codeModal" tabindex="-1" aria-labelledby="codeModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" style="transform: translateY(-150px);">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="my-2 text-center">
                    <div><img alt="Logo" src="../Assets/Images/logo.png.html" class="logo" style="max-width: 200px;"></div>
                    <div class="mt-2">
                        <h3 style="font-size: 1.27em;">Mã Gift Code Của Game</h3>

                        <div class="gift-codes" style="padding: 10px; background-color: #fdf8da;">
    <p style="border: 3px solid #bd9c09; background-color: #f8f8f8; font-family: Arial, sans-serif; color: #333;">tanthu</p>
    <p style="border: 3px solid #bd9c09; background-color: #f8f8f8; font-family: Arial, sans-serif; color: #333;">ngocrong</p>
    <p style="border: 3px solid #bd9c09; background-color: #f8f8f8; font-family: Arial, sans-serif; color: #333;">thoivang</p>
    <p style="border: 3px solid #bd9c09; background-color: #f8f8f8; font-family: Arial, sans-serif; color: #333;">nrokiwi</p>
    <p style="border: 3px solid #bd9c09; background-color: #f8f8f8; font-family: Arial, sans-serif; color: #333;">he2024</p>
    <!-- Thêm mã gift code khác nếu cần -->
</div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function showCustomToast(message, type) {
        var toast = document.getElementById('customToast');
        toast.innerText = message;
        toast.style.display = 'block';
        toast.classList.remove('alert', 'alert-success', 'alert-danger'); // Xóa các lớp hiện có trước khi thêm lớp mới
        if (type === 'success') {
            toast.classList.add('alert', 'alert-success');
        } else {
            toast.classList.add('alert', 'alert-danger');
        }

        // Tự đóng thông báo sau 3 giây
        setTimeout(function () {
            toast.style.display = 'none';
        }, 3000);
    }
</script>




<style>
    .custom-toast {
        position: fixed;
        padding: 15px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 5px;
        color: white;
        display: none;
        z-index: 9999;
    }

    .alert-success {
        background-color: #28a745;
    }

    .alert-danger {
        background-color: #dc3545;
    }

    .nsotien_logo {
        height: 120px;
        width: auto;
    }

    @media only screen and (max-width: 768px) {
        .nsotien_logo {
            height: 70px;
        }
    }

    .mt-3 a:hover {
        color: white;
        background-color: red;
        border-color: red;
    }

    .header-logo {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-radius: 10px;
        max-height: 100%;
        max-width: 100%;
    }

    .custom-success-alert {
        background-color: #4CAF50 !important;
        color: white !important;
        padding: 10px !important;
        text-align: center !important;
        border-radius: 5px;
    }

    .alert.alert-danger.alert-block {
        background: none;
        border-color: transparent;
        text-align: center;
    }

    /*a {*/
    /*    margin: 5px;*/
    /*}*/

    svg {
        width: 30px;
        height: 30px;
    }

    .age-rule a {
        background-color: #B4E3FF;
        color: #F4FFFF !important;
        border-radius: 10px !important;
        text-align: center;
        max-width: 10%;
        margin: 5px auto;
        padding: 5px 10px;
    }

    .age-rule a:hover {
        background-color: #ffcc99;
        color: #F4FFFF !important;
    }

    .page-layout-color {
        background: #b3afaf url("../Assets/Images/c6b177d5b33f4f60badf36458a784fca.jpeg");
        background-size: cover;
        background-attachment: fixed;
        height: auto;
    }

    #serverModal a#serverTeamButton {
        width: 100% !important;

        margin-bottom: 10px !important;

        align-items: flex-start !important;
        background-color: #8f34f5 !important;
        border-color: #8f34f5 !important;
        border-radius: 10px !important;
        color: #ffffff !important;
        display: inline-block !important;
        font-family: system-ui !important;
        font-size: 14px !important;
        line-height: 21px !important;
        margin: 10px 0px 0px !important;
        text-align: center !important;
    }

    #serverModal a#serverTeamButton:hover {
        background-color: #FF418C !important;
        border-color: #FF418C !important;
    }

    #serverModal .mt-2 {
        color: #212529 !important;
        font-weight: 600 !important;
        line-height: 24px !important;
        margin: 8px 0px 0px !important;
        text-align: center !important;
    }

    #serverModal .mb-2 {
        color: #212529 !important;
        font-weight: 600 !important;
        line-height: 30px !important;
        margin: 0px 0px 8px !important;
        text-align: center !important;
    }

    #serverModal .text-center {
        color: #212529 !important;
        font-weight: 300 !important;
        line-height: 24px !important;
        text-align: center !important;
    }

    #serverModal img.logo {
        color: #212529 !important;
        display: inline !important;
        font-weight: 300 !important;
        line-height: 24px !important;
        text-align: center !important;
    }

    #serverModal .modal-body {

        outline: 2px solid #000;
        border-radius: 10px;

        background-color: #FCE3C6 !important;
        color: #212529 !important;
        font-weight: 300 !important;
        line-height: 24px !important;

    }

    #serverModal .modal-content {
        margin: 2px 127px;

    }

    #serverModal .modal-content p {
        margin: 9px 30px;
        line-height: 1.5;
    }

    #serverModal .modal-content h2 {
        margin: 9px 30px;
        line-height: 1.5;
    }


    #serverModal .modal-content font[color="#FF0000"] {
        color: #FF0000;
        font-weight: bold;

    }

    @media (min-width: 768px) and (max-width: 1024px) {

        #serverModal html,
        body {
            overflow: visible;
        }
    }

    @media (max-width: 767px) {

        #serverModal html,
        body {
            overflow: visible;
        }

        #serverModal .modal-body {
            margin: 0 -36px;

            text-align: center;
        }

        #serverModal .modal-content {
            margin: 4px 55px
        }

        #serverModal .modal-content p {
            margin: 32px 30px;
            line-height: 1.5;
        }

    }
</style>
<footer class="pt-4 pt-md-5 border-top">
    <div class="text-center">

        <p class="fw-bold">Chơi quá 180 phút mỗi ngày sẽ có hại cho sức khỏe</p>

    </div>
</footer>
</div>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<!--<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>-->
</body>

</html>