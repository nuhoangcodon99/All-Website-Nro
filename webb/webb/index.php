<?php
include ('head.php');
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Ngọc Rồng </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="assets/images/icon/icon.ico">


  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- mycss -->
  <link rel="stylesheet" href="/css/main.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- myjs -->
  <!--<script src="js/tet.js"></script>-->

  <!-- bootstrap -->
  <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
  <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</head>
<script>
  function confirmLogout() {
    Swal.fire({
      title: 'Bạn có chắc chắn muốn đăng xuất?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý',
      cancelButtonText: 'Đóng'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: 'Thành công',
          text: '',
          icon: 'success',
          timer: 1000,
          showConfirmButton: false
        }
        ).then(() => {
          window.location = 'out.php'
        });
      }
    })
  }
</script>
<div class="alert alert-warning" style="background-color: #FFCCCC;">
  <!--màu chi tiết sv-->
  <div class="topic_name">
    <div class="text-center mb-1">
      <small style="color: #661A24; font-size: 1.5em;"><b>Thông Báo Mới</b></small>
      <br><br>
    </div>
    <div class="notification-item" onclick="window.location.href='/update.php'">
      <div class="avatar-container">
        <img class="avatar" src="/image/20970.png">
      </div>
      <div class="content">
        <div class="alert-frame">
          <a class="alert-link link" href="/update.php" title="">
            Chi Tiết ngày 12 tháng 12
            <img class="gif-icon" src="/image/new.gif" style="vertical-align: middle;">
          </a>
          <div class="author" style="color: blue;"> bởi admin <b class="author" style="color: red;"> <b>Ngọc Rồng♥
                ♥ ♥</b>
          </div>
        </div>
      </div>
    </div>
    <div class="notification-item" onclick="window.location.href='/cochegame.php'">
      <div class="avatar-container">
        <img class="avatar" src="/image/20970.png">
      </div>
      <div class="content">
        <div class="alert-frame">
          <a class="alert-link link" href="/cochegame.php" title="">
            Cơ Chế Game Ngọc Rồng 
            <img class="gif-icon" src="/image/new.gif" style="vertical-align: middle;">
          </a>
          <div class="author" style="color: blue;"> bởi admin <b class="author" style="color: red;"> <b>Ngọc Rồng♥
                ♥ ♥</b>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>


  <div class="content-banner-slide">
    <div class="slider">
      <div class="row position-relative">
        <div class="col-12 slider_in">
          <div class="swiper-container mySwiper slider_detail swiper-container-horizontal">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <a href="javascript:void(0)">
                  <img src="/image/traidatne.png" alt="" class="img-fluid swiper-lazy w-100 loading_lazy"
                    data-ignore="true">
                </a>
              </div>
              <div class="swiper-slide">
                <a href="javascript:void(0)">
                  <img src="/image/namecne.png" alt="" class="img-fluid swiper-lazy w-100 loading_lazy"
                    data-ignore="true">
                </a>
              </div>
              <div class="swiper-slide">
                <a href="javascript:void(0)">
                  <img src="/image/saiyanne.png" alt="" class="img-fluid swiper-lazy w-100 loading_lazy"
                    data-ignore="true">
                </a>
              </div>
            </div>
            <img class="swiper-button-prev" src="/image/mui_ten_2.png">
            <img class="swiper-button-next" src="/image/mui_ten_1.png">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Swiper JS -->
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var mySwiper = new Swiper('.mySwiper', {
        loop: true,
        centeredSlides: true, // Centered slide mode
        slidesPerView: 1, // Number of slides per view
        spaceBetween: 10, // Space between slides
        autoplay: {
          delay: 2000, // Auto play interval in milliseconds
          disableOnInteraction: false, // Enable/disable interaction to stop autoplay
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          768: {
            slidesPerView: 1, // Number of slides per view for larger screens
          },
        },
      });
    });
  </script>



  <div class="col">
    <div class="text text-dark text-left mt-2">
      <h4 class="ml-2 text-left">GIỚI THIỆU NGỌC RỒNG</h4>
      <!--</div>-->
      <!--<hr>-->
    </div>
    <div class="text text-dark p-2">
      <p style="">
      </p>
      <div class="">


        </b>
        <br>
        <h5><strong>Sơ lược về game</strong></h5>
        <hr>
        <p>Ngọc Rồng &ndash; game nhập vai trực tuyến với cốt truyện v&agrave; nh&acirc;n vật dựa tr&ecirc;n bộ
          truyện tranh nổi tiếng Nhật Bản Dragon Ball đ&atilde; từng l&agrave;m say l&ograve;ng bao nhi&ecirc;u
          thế hệ độc giả Việt Nam. Bạn sẽ chọn tiếp nhận h&agrave;nh tinh n&agrave;o, Tr&aacute;i Đất, Namếc hay
          Xayda? Cuộc h&agrave;nh tr&igrave;nh t&igrave;m kiếm ngọc rồng v&agrave; chống lại thế lực hung
          &aacute;c sẽ do bạn quyết định, vận mệnh lu&ocirc;n nằm trong tay người được chọn.</p>
        <p>C&ugrave;ng với sự hướng dẫn của c&aacute;c bậc tiền bối v&agrave; sự nỗ lực của bản th&acirc;n, bạn
          c&oacute; thể đạt đến sức mạnh vượt trội trở th&agrave;nh những chiến binh si&ecirc;u hạng. Ngo&agrave;i
          ra, bạn sẽ kh&ocirc;ng phải chiến đấu đơn độc khi xung quanh bạn l&agrave; bạn b&egrave; v&agrave; những
          chiến binh c&ugrave;ng ch&iacute; hướng, c&ugrave;ng hỗ trợ lẫn nhau đối đầu với c&aacute;c thế lực hắc
          &aacute;m.</p>
        <p>Ngọc Rồng l&agrave; tr&ograve; chơi trực tuyến đa nền tảng. Bạn c&oacute; thể chơi được tr&ecirc;n
          mọi nền tảng từ m&aacute;y t&iacute;nh PC Windows, iPhone, c&aacute;c d&ograve;ng m&aacute;y chạy hệ
          điều h&agrave;nh Android, Windows Phone đến c&aacute;c cả bản Java chạy tr&ecirc;n S40, S60 cũ của
          Nokia. Với chất lượng cao v&agrave; tốc độ mượt m&agrave; tr&ecirc;n c&aacute;c loại đường truyền mạng
          ADSL, 3G, GPRS.</p>
        <p>Tr&ograve; chơi th&iacute;ch hợp với mọi lứa tuổi. Điều khiển trực tiếp nh&acirc;n vật rất dễ
          d&agrave;ng tr&ecirc;n m&agrave;n h&igrave;nh cảm ứng. Khi chơi tr&ecirc;n PC bạn chỉ cần d&ugrave;ng
          chuột, hoặc linh hoạt điều khiển nh&acirc;n vật với b&agrave;n ph&iacute;m cứng điện thoại Nokia S40,
          S60.</p>
        <br>
       
        <h6><strong> Cập nhật khác...</strong></h6>
        <p>.....</p>

        <div class="text text-dark text-left mt-2">
          <h4 class="ml-2 text-left">Đặc điểm nổi bật</h4>
          <p><img src=../image/logo.gif style="max-width:100%"></p>
        </div>
        <div class="text text-dark text-left" style="padding: 20px">

          <p></p>
        </div>
        <div class="modal right fade" id="Noti_Home" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
          <div class="modal-dialog modal-side modal-bottom-right">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #FFCCCC; color: #FFF; text-align: center;">
                <img src="../image/logo.gif"
                  style="display: block; margin-left: auto; margin-right: auto; max-width: 250px;">
              </div>
              <div class="modal-body">
                <p style="padding: 10px">
                  <b style="color: red; text-align: center;">THÔNG BÁO: </b><br />
                  <b style="color: blue;">- Phiên bản IOS hiện tại đã có mặt trên nền tảng
                    TestFlight !!!!</b><br />
                  <b style="color: blue;">- Chính thức khai mở sever Ngọc Rồng..... !!!!</b><br />
                  <b style="color: blue;">- Hàng Tuần Update sự kiện Tại Npc Ở Nhà, các
                    sự kiện quanh đảo đảo kame và các làng !!!!</b><br />
                  <b style="color: blue;">- Cơ chế SKH nâng từng bậc </b><br />
                  <small>
                    <center>
                      <b>Chi tiết xem tại thêm bên dưới.</b><br />
                    </center>
                  </small>
                </p>

               <div
                    style="display: flex; justify-content: center; align-items: center; gap: 25px; margin-bottom: 10;">
                    <a href="https://drive.google.com/file/d/1eQp3dtHSG4tGzdyERc7RDua6x77BNYH-/view?usp=drive_link" style="border-radius: 20px; width: 100px; text-decoration: none;">
                      <img src="../image/apk.png" style="max-width: 120px; display: block; margin: auto;">
                    </a>

                    <a href="https://drive.google.com/file/d/1PKLtozn0Fv8MuwomyUl892vtk03kiLv1/view?usp=drive_link" style="border-radius: 20px; width: 100px; text-decoration: none;">
                      <img src="../image/pc.png" style="max-width: 120px; display: block; margin: auto;">
                    </a>

                    <a href="https://drive.google.com/file/d/1GWRNh2spifpkgtiVxPBAjfa21kqDOgE5/view?usp=drive_link"
                      
                      style="border-radius: 20px; width: 100px; text-decoration: none;">
                      <img src="../image/ios.png" style="max-width: 120px; display: block; margin: auto;">
                    </a>
                  </div>

                <div style="display: flex; justify-content: center; align-items: center; gap: 0px; margin-bottom: 0px;">
                  <a href="https://zalo.me/g/vrjvff914"
                    style="border-radius: 120px; width: 120px; text-decoration: none;">
                    <img src="../image/zalo.png" style="max-width: 120px; display: block; margin: auto;">
                  </a>

                  <a href="https://zalo.me/g/vrjvff914"
                    style="border-radius: 20px; width: 125px; text-decoration: none;">
                    <img src="../image/face.png" style="max-width: 120px; display: block; margin: auto;">
                  </a>

                  <a href="../bxh.php" style="border-radius: 20px; width: 125px; text-decoration: none;">
                    <img src="../image/bxh.png" style="max-width: 120px; display: block; margin: auto;">
                  </a>
                </div>

                <div class="modal-footer">
                  <b>Thân ái,
                    <span style="color: purple;">Admin !</span>
                    <!--<img src="../an_remake/images/icon/admin.png" width="35" height="35" />-->
                    <span style="color: red;"><i class="fa fa-heart" aria-hidden="true"></i></span>
                  </b>
                </div>
              </div>
            </div>
          </div>
        </div>


        <script type="text/javascript">
          $(document).ready(function () {
            $('#Noti_Home').modal('show');
          })
        </script>
        <!-- footer -->
        <footer class="mt-1">
          <br>
          <div class="text-center text-black">
            <script>
              function getYear() {
                var date = new Date();
                var year = date.getFullYear();
                document.getElementById("currentYear").innerHTML = year;
              }
            </script>

            <body onload="getYear()">
              <small>
                <b>NGỌC RỒNG </b>
              </small>
              <br>
              <small>
                <span id="currentYear"></span> © Được Vận Hành Bởi <b>
                  <u>NRO</u>
                </b>
              </small>
            </body>
          </div>
        </footer>
      </div>
      </body>

</html>