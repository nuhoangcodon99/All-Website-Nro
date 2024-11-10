<?php
include_once 'set.php';
$_title = "NRO TEA - Đăng Ký";
include_once 'head.php';
include 'connect.php';
$_alert = '';
$recafcode = '';
$count = 0;

if (isset($_GET['ref']) && !empty($_GET['ref'])) {
    $recafcode = $_GET['ref'];
}

// 1 điện thoại chỉ đăng ký được 2 nick
$max_accounts_per_ip = 999;
$num_accounts = count_accounts_by_ip($_SERVER['REMOTE_ADDR']);
if ($num_accounts >= $max_accounts_per_ip) {
   $_alert = '<div class="alert alert-danger"> điện thoại chỉ đăng ký được 2 nick!</div>';
} else {
   if ($_login == null && isset($_POST['username']) && isset($_POST['password'])) {
      if (empty($_POST['username'])) {
         $_alert = '<div class="alert alert-danger">Vui lòng nhập tên tài khoản!</div>';
      } elseif (!preg_match('/^[a-zA-Z0-9-@_]+$/', $_POST['username'])) {
         $_alert = '<div class="alert alert-danger">Tên tài khoản không hợp lệ!</div>';
      }
      if (empty($_POST['password'])) {
         $_alert = '<div class="alert alert-danger">Vui lòng nhập mật khẩu!</div>';
      } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])) {
         $_alert = '<div class="alert alert-danger">Mật khẩu không hợp lệ!</div>';
      } elseif (strcmp($_POST['password'], $_POST['repassword']) != 0) {
         $_alert = '<div class="alert alert-danger">Hai mật khẩu không khớp nhau, vui lòng kiểm tra lại!</div>';
      } else {
         $username = mysqli_real_escape_string($conn, $_POST['username']);
         $password = mysqli_real_escape_string($conn, trim($_POST['password']));
         $repassword = mysqli_real_escape_string($conn, trim($_POST['repassword']));
		

         // Kiểm tra xem username này đã tồn tại hay chưa
         $read = _select("*", 'account', "username='$username'");
         $existing_account = _fetch($read);
         if (is_array($existing_account)) {
            $_alert = '<div class="alert alert-danger">Tài khoản này đã tồn tại, vui lòng chọn tài khoản khác!</div>';
         } else {
            // Thực hiện INSERT tài khoản vào CSDL
            $recaf = isset($_POST["recaf"]) && !empty($_POST["recaf"]) ? mysqli_real_escape_string($conn, trim($_POST['recaf'])) : null;
            if (!empty($recaf)) {
               // Kiểm tra xem mã giới thiệu đã nhập có tương ứng với tài khoản được tạo từ cùng một địa chỉ IP không
               $result = _select("COUNT(*) as count", "account", "id='$recaf' AND ip_address='{$_SERVER['REMOTE_ADDR']}'");
               $row = _fetch($result);
               if ($row['count'] > 0) {
                  $_alert = '<div class="alert alert-danger">Bạn không thể nhập mã giới thiệu của chính mình!</div>';
               } else {
                  // Kiểm tra số lần đã cộng
                  if ($count < 15) {
                     $sql = "UPDATE account SET gioithieu = gioithieu + 1 WHERE id = '$recaf'";
                     if ($conn->query($sql) === TRUE) {

                        // Tăng biến đếm khi cộng thành công
                        $count++;
                        $txt = _insert('account', 'username,password,ip_address,recaf', "'$username','$password','{$_SERVER['REMOTE_ADDR']}'," . ($recaf === null ? 'NULL' : "'$recaf'"));
                        $kiemtra = _query($txt);
                        if ($kiemtra) {
                           $_alert = '<div class="alert alert-success">Đăng kí thành công!!</div>';
                        }
                     }
                  } else {
                     $_alert = '<div class="alert alert-danger">Mã giới thiệu này đã đạt đủ số người nhập mã!</div>';
                  }
               }
            } else {
               // Trường hợp không có recaf
               $txt = _insert('account', 'username,password,ip_address,recaf', "'$username','$password','{$_SERVER['REMOTE_ADDR']}',NULL");
               $kiemtra = _query($txt);
               if ($kiemtra) {
                  $_alert = '<div class="alert alert-success">Đăng kí thành công!!</div>';
               }
            }
         }
      }
   }
}

function count_accounts_by_ip($ip_address)
{
   global $conn;
   $count = 0;
   $result = _select("COUNT(*) as count", "account", "ip_address='$ip_address'");
   if ($row = _fetch($result)) {
      $count = $row['count'];
   }
   return $count;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ngọc Rồng Yewr</title>
<link rel="icon" href="assets/images/nro.png" type="image/png">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/all.min.css" />
<link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../www.google.com/recaptcha/api.js" async defer></script>
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
</style><body>
<div class="container py-3">
<header>
</header><main>
<form class="form-signin" method="POST">
               <h1 class="h3 mb-3 font-weight-normal text-center">Nhập thông tin đăng ký</h1>
               <input type="hidden" name="_token" value="JEGpj39vMoqzUAPDoHWTY8Y4jJiy4t0mhPST9nds">
               <?php
               if (!empty($_alert)) {
                  echo $_alert;
               }
               ?>
               <div class="form-group">
                  <label>Tài khoản</label>
                  <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username" value="">
               </div>
               <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password"
                     autocomplete="password">
               </div>
               <div class="form-group">
                  <label>Nhập lại mật khẩu</label>
                  <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="repassword"
                     autocomplete="repassword">
               </div>
               <div class="form-group">
                  <label for="referral_code">Mã giới thiệu:</label>
                  <input type="text" class="form-control" id="recaf" name="recaf" value="<?php echo $recafcode; ?>"
                     placeholder="Nhập mã giới thiệu (nếu có)">
               </div>
               <br>
               <button class="btn btn-primary w-100" onclick="redirectToRegisterPage()">Đăng ký</button>
               <script>
                  function redirectToRegisterPage() {
                     <?php if (isset($_SESSION['id'])) { ?>
                        var url = "<?php echo $_domain ?>/dang-ky.php=<?php echo $_SESSION['id'] ?>";
                        window.location.href = url;
                     <?php } ?>
                  }
               </script>
               <div class="text-center">
                  Bạn đã có tài khoản? <a href="login">Đăng nhập ngay</a>
               </div>
               <div class="text-center">
                  <a href="change-password">Đổi Mật Khẩu</a>
               </div>
            </form>
<style>
        .form-signin {
                width: 100%;
                max-width: 400px;
                padding: 15px;
                margin: 0 auto;
            }

            .form-signin .checkbox {
                font-weight: 400;
            }
    </style>
</main>
<script src="assets/js/jquery.form.min.js"></script>
<script src="assets/js/clipboard.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/appa368.js?_=1668687096"></script>
		<?php
include_once 'end.php';
?>
</div>
