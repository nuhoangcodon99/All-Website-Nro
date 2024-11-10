<?php
   include ('../head.php');
   echo $head;
   $items_web = "";
   $result = $conn->query("SELECT * FROM items_web");
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
          $items = sql::Select("item_template", "id", $row['items']);
          $option = json_decode($row['options'] , true);
          $opName = "";
          foreach ($option as $data) {
            $opName .= "CHỈ SỐ => " .str_replace("#" , $data[1] ,sql::Select("item_option_template" , "id" , $data[0])['NAME']) . "</br>";
          }
              $items_web .= '<div class="mt-4">
    <div class="post-item d-flex align-items-center my-2 justify-content-between">
        <div class="post-image">
            <img src="'.until::domain("Assets/Icon/".$items['icon_id'].".png").'" alt="hd">
        </div>
        <div class="ant-list-item-meta">
            <div class="text-container">
                <a onclick="onSwick(\'showINFO' . $row['id'] . '\')" style="color: #0d6efd; font-weight: 700 !important;">'.$items['NAME'].' Click Vào Để Xem Cho Tiết</a>
                
            </div>
        </div>
        <div>
            <img width="30px" src="/Assets/Images/tick.png" alt="tick">
        </div>
    </div>
    <div style="display: none;" id="showINFO'.$row['id'].'">
    <div style="display: none;" class="post-item d-flex align-items-center my-2 justify-content-between">
        VND => '.number_format($row["vnd"], 0, '.', ',').' VND<br>
        SỐ LƯỢNG => '.$row["slot"].'<br>
        NAME => '.$items['NAME'].'<br>
        '.$opName.'<br>
        <a onclick="shop('.$row['id'].' , \''.until::domain("Assets/Icon/".$items['icon_id'].".png").'\' , \''.$items['NAME'].'\' , \''.number_format($row["vnd"], 0, '.', ',').'\')" class="btn btn-primary">
            Mua ngay
        </a>
    </div>
  </div>
';

           }
      } else {
          $items_web = "không có item nào";
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
<div class="card">
    <div class="card-body">
        
            <div class="card-title h5">Trang chủ</div>
         <div id="shopITemS">
         <div class="mt-4">
         <div class="mt-4">
    <div class="table-responsive">
        <hr>
        <br>
</div>
</div>
</div>
</div>
<div class="modal fade" id="serverModal" tabindex="-1" aria-labelledby="serverModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="my-2">
                    <div class="text-center"><img alt="Logo" src="Assets/Images/mubi6.gif" class="logo"
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

<div class="modal fade" id="codeModal" tabindex="-1" aria-labelledby="codeModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" style="transform: translateY(-150px);">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="my-2 text-center">
                    <div><img alt="Logo" src="Assets/Images/logo.png.html" class="logo" style="max-width: 200px;"></div>
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

    async function shop(id, avatar, name, vnd) {
    try {
        const result = await Swal.fire({
            title: `Mua ${name}`,
            text: `Bạn chắc chắn muốn mua ${name} với giá ${vnd}VND`,
            icon: 'question',
            imageUrl: avatar,
            imageAlt: 'Custom image',
            showCancelButton: true,
            confirmButtonText: 'Xác Nhận',
            cancelButtonText: 'Hủy',
            customClass: {
                popup: 'custom-popup'
            }
        });

        if (result.isConfirmed) {
            let status = JSON.parse(await _post('<?php echo until::domain("Api/ITEMS");?>', {"uid": id, "type": "byitems"}));
            console.log(status);
            if (status.error == 0){
               if (status.data.error_code == 0){
                  Swal.fire('Continued!', 'You have chosen to continue.', 'success');
                  setTimeout(function() {
                     window.location.href = "../TRANS_ITEMS";
                  }, 2000);
               } else {
                   Swal.fire('Lỗi', status.data.error, 'error');
               }
            } else {
                Swal.fire('Lỗi', 'Gặp lỗi phía api', 'error');
            }
        } else if (result.isDismissed) {
            Swal.fire('Hủy', 'Bạn muốn hủy mua à', 'error');
        }
    } catch (error) {
        console.error('Error occurred:', error);
    }
}


    var stick1 = "null";
       function onSwick(stick){
           if (stick1 != "null"){
               document.getElementById(stick1).style.display = "none";
          }
          stick1 = stick;
          document.getElementById(stick).style.display = "block";
       }
       document.getElementById("shopITemS").innerHTML = "<div class='spinner'></div>";
   setTimeout(function() {
        document.getElementById("shopITemS").innerHTML = `<?php echo$items_web;?>`;
   } , 2000);
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
        background: #b3afaf url("Assets/Images/c6b177d5b33f4f60badf36458a784fca.jpeg");
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

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<!--<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>-->
</body>

</html>