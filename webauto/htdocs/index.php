<?php
   include_once 'set.php';
   include_once 'head.php';
   ?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ngọc Rồng </title>
<link rel="icon" href="/img/nro.png" type="img/png">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/all.min.css" />
<link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
<script src="https://kit.fontawesome.com/c79383dd6c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-baUM7KUwZ0zgwyrYbMvPzuz9X2Qn1GK68WvZQT19xJpBbbwTHe8A7WgjvJPmjG9LbRrLR8dO+ZjhgzIhFq3tHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    .fa {
    font-size: 1.5em; /* Thay đổi giá trị này để điều chỉnh kích thước của icon */
}

    
</style>
<!-- Modal -->
<div class="modal fade" id="thongbao" tabindex="-1" role="dialog" aria-labelledby="thongbaolable" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="thongbaolable">Thông báo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
  <img class="img-fluid" src="images/thongbao.gif" alt="" width="999" height="999"> 
              <a class="" href="https://zalo.me/quannotj4" style="font-weight: 0">  <img class="img-fluid" src="img/quan.png" alt="" width="999" height="999"> </a>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
    // Hiển thị thông báo
    $("#thongbao").modal('show');

   //  Đóng modal popup khi nút 'Đóng' được nhấn
    $("#thongbao .close, #thongbao button[data-dismiss='modal']").click(function(){
        $("#thongbao").modal('hide');
    });

   //  Đóng modal popup sau 2 giờ
    setTimeout(function(){
        $("#thongbao").modal('hide');
    }, 1000 * 60 * 120); // 1000ms * 60s * 120ph = 7200000ms
});



</script>

</style>
 
<div class="container py-3">
<main>
<section class="text-center container">
<div class="row py-md-3">
<div class="col-lg-6 col-md-8 mx-auto">
 <img class="img-fluid" src="images/logo.gif" alt="" width="999" height="999"> 
 <?php if($_login == null) { ?>
  <p class="lead text-muted">
  
</p>
            <nav class="my-2 my-md-0 mr-md-3">
               <a class="" href="/login.php" style="t: 1000"></a>
              <a class="" href="/register.php" style=": 1000"></a>
               <?php } else { ?>
              <?php
                             if($_status == "0") {
   echo '.</div>';
   }
   elseif($_status == "1") {
   echo '';
   }
   elseif($_status == "-1") {
      echo '<div "lead text-muted">Bạn Đã Nạp Lần Đầu Rồi Hihi :3</div>';
      }
                             ?>
               <?php } ?>
</div>
</div>
<div class="center">
    <div class="title-behavior">
        <marquee behavior="scroll" direction="left">Chào mừng bạn đến với máy chủ Ngọc Rồng , Đội ngũ Admin chúc các bạn có những trải nghiệm tuyệt vời khi tham gia vào máy chủ NRO</marquee>
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
                    <td><div><a href="/add_balance.php"></a></div></td>
                    </tr>

<a class="me-3 py-2 text-dark text-decoration-none" href="index.php.php"<div class="box_name_eman"><b><b><font style="color:brown"><img class="img-fluid" src="images/cup.gif" alt="" width="60"> 
      <a href="danh-sach-top.php" class="feature-title">TOP Máy Chủ</a>
      <p></p>
      <a href="danh-sach-top.php" class="btn btn-primary">
        Xem ngay
      </a>
    </div>
  </div>
</div>


<?php
      include_once 'end.php';
      ?>
</div>