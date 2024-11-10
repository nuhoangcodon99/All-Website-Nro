<?php
include "sql.php";
header("Content-Type: application/json; charset=UTF-8");
$input = file_get_contents('php://input');
$data = json_decode($input, true);
if(!isset($data['secret_key']) || !isset($_SESSION['secret_key']) || $_SESSION['secret_key'] != $data['secret_key']){
    echo json_encode(["error_code" => 99, "error" => "secret_key không chính xác"] , JSON_PRETTY_PRINT);
    return;
} 
function action($number) {
    if ($number >= 1000000000) {
        return number_format($number / 1000000000, 3, ',', '.') . ' tỷ';
    } elseif ($number >= 1000000) {
        return number_format($number / 1000000, 3, ',', '.') . ' triệu';
    } elseif ($number >= 1000) {
        return number_format($number / 1000, 3, ',', '.') . 'k';
    }
    return number_format($number, 0, ',', '.') . 'đ';
}
if(!isset($data['type'])){
    echo json_encode(["error_code" => 99 ,"error" => "không thể thực hiện "] , JSON_PRETTY_PRINT);
    return;
}
$type = $data['type'];
if ($type == "login"){
    if(empty($data['username']) || empty($data['password'])){
        echo json_encode(["error_code" => 99 ,"error" => "username hoạc password không được bỏ trống"] , JSON_PRETTY_PRINT);
        return;
    }
    $username = $data['username'];
    $password = $data['password'];
    $discount = sql::Select1("account", ["username" => $username , "password" => $password]);
    if($discount){
        echo json_encode(["error_code" => 0 ,"error" => "login thành công"] , JSON_PRETTY_PRINT);
        $_SESSION['secret_key'] = md5(rand(1 , 99999999) . time());
        $_SESSION['username'] = $username;
        return;
    } else {
        echo json_encode(["error_code" => 99 ,"error" => "username hoạc password không chính xác"] , JSON_PRETTY_PRINT);
        return;
    }
} else if($type == "regis"){
    if(empty($data['username']) || empty($data['password']) || empty($data['RePasswordword'])){
        echo json_encode(["error_code" => 99 ,"error" => "Vui lòng nhập đầy đủ vào ô trống"] , JSON_PRETTY_PRINT);
        return;
    }
    $username = $data['username'];
    $password = $data['password'];
    $RePasswordword = $data['RePasswordword'];
    $account = sql::Select("account" , "username" , $username);
    if (sql::kyTuDacBiet($username) || sql::kyTuDacBiet($password) || sql::kyTuDacBiet($RePasswordword)){
        echo json_encode(["error_code" => 99 ,"error" => "Tài khoản mật khẩu không được chứa ký tự đặc biệt"] , JSON_PRETTY_PRINT);
        return;
    }
    
    if ($account){
        echo json_encode(["error_code" => 99 ,"error" => "Tài khoản đã được sử dụng"] , JSON_PRETTY_PRINT);
        return;
    }
    if ($password != $RePasswordword){
         echo json_encode(["error_code" => 99 ,"error" => "2 mật khẩu không giống nhau"] , JSON_PRETTY_PRINT);
         return;
    }
        sql::insert("account", "username, password", "'$username', '$password'");
        $_SESSION['secret_key'] = md5(rand(1 , 99999999) . time());
        $_SESSION['username'] = $username;
        echo json_encode(["error_code" => 0 ,"error" => "Đăng ký thành công"] , JSON_PRETTY_PRINT);
        return;
} else if($type == "Change"){
    if(empty($data['current_password']) || empty($data['newpassword']) || empty($data['newpassword_confirm'])){
        echo json_encode(["error_code" => 99 ,"error" => "Vui lòng nhập đầy đủ vào ô trống"] , JSON_PRETTY_PRINT);
        return;
    }
    $current_password = $data['current_password'];
    $newpassword = $data['newpassword'];
    $newpassword_confirm = $data['newpassword_confirm'];
    if (sql::kyTuDacBiet($current_password) || sql::kyTuDacBiet($newpassword) || sql::kyTuDacBiet($newpassword_confirm)){
        echo json_encode(["error_code" => 99 ,"error" => "mật khẩu không được chứa ký tự đặc biệt"] , JSON_PRETTY_PRINT);
        return;
    }
    $account = sql::Select1("account", ["username" => $_SESSION['username'] , "password" => $current_password]);
    if (!$account){
        echo json_encode(["error_code" => 99 ,"error" => "mật khẩu cũ không chính xác"] , JSON_PRETTY_PRINT);
        return;
    }
    if ($newpassword != $newpassword_confirm){
        echo json_encode(["error_code" => 99 ,"error" => "2 mật khẩu không giống nhau"] , JSON_PRETTY_PRINT);
        return;
    }
        sql::update("account" , "password" , $newpassword , "username" , $_SESSION['username']);
        echo json_encode(["error_code" => 0 ,"error" => "đổi mật khẩu mới thành công"] , JSON_PRETTY_PRINT);
        return;
} else if($type == "info"){
   if (!isset($_SESSION['username'])){
      echo json_encode(["error_code" => 99 ,"error" => "Không thể thực hiện"] , JSON_PRETTY_PRINT);
      return;
   }
   $info = sql::Select("account" , "username" , $_SESSION['username']);
   if ($info['active'] == 1){
       $active = "Đã là thành viên";
       $cool = "00FF00";
   } else {
       $active = "Chưa kích hoạt";
       $cool = "FF0000";
   }
   echo json_encode(["error_code" => 0 ,"id" => $info['id'] , "username" => $info['username'] , "vnd" => action($info['vnd']) , "tongnap" => action($info['tongnap']) , "active" => $active , "cool" => $cool] , JSON_PRETTY_PRINT);
   
} else if($type == "active"){
    if (!isset($_SESSION['username'])){
      echo json_encode(["error_code" => 99 ,"error" => "Không thể thực hiện"] , JSON_PRETTY_PRINT);
      return;
   }
   $account = sql::Select("account" , "username" , $_SESSION['username']);
   if (!$account){
      echo json_encode(["error_code" => 99 ,"error" => "Không thể thực hiện"] , JSON_PRETTY_PRINT);
      return;
   }
   if ($account['active'] == 1){
       echo json_encode(["error_code" => 99 ,"error" => "bạn đã mở thành viên rồi"] , JSON_PRETTY_PRINT);
      return;
   }
   
   if ($account['vnd'] >= 10000){
      sql::update("account" , "vnd" , $account['vnd'] - 10000 , "username" , $_SESSION['username']);
      sql::update("account" , "active" , 1 , "username" , $_SESSION['username']);
      echo json_encode(["error_code" => 0 ,"error" => "mở thành viên thành công"] , JSON_PRETTY_PRINT);
      return;
   } else {
      echo json_encode(["error_code" => 99 ,"error" => "số dư không đủ"] , JSON_PRETTY_PRINT);
      return;
   }
} else if($type == "transaction"){
   if (!isset($_SESSION['username'])){
      echo json_encode(["error_code" => 99 ,"error" => "Không thể thực hiện"] , JSON_PRETTY_PRINT);
      return;
   }
   $account = sql::Select("account" , "username" , $_SESSION['username']);
   if (!$account){
      echo json_encode(["error_code" => 99 ,"error" => "Không thể thực hiện"] , JSON_PRETTY_PRINT);
      return;
   }
   
   $player = sql::Select("player" , "account_id" , $account['id']);
   if (!$player){
      echo json_encode(["error_code" => 10 ,"error" => "chưa tạo nhân vật"] , JSON_PRETTY_PRINT);
      return;
   }
$transaction = [];
$uid = $player['id'];
$sql = "SELECT * FROM history_transaction 
        WHERE player_1 LIKE '%($uid)' OR player_2 LIKE '%($uid)' 
        ORDER BY time_tran DESC 
        LIMIT 50";
$result_transaction = $conn->query($sql);
if ($result_transaction->num_rows > 0) {
    while ($row = $result_transaction->fetch_assoc()) {
        $name1 = $row['player_1'];
        $name2 = $row['player_2']; 
        $matches1 = [];
        $matches2 = [];
        preg_match('/\((\d+)\)/', $name1, $matches1);
        preg_match('/\((\d+)\)/', $name2, $matches2);

        $playerId = ($matches1[1] != $uid) ? $matches1[1] : $matches2[1];
        $player2 = sql::Select("player", "id", $playerId);
        $name = $player2 ? $player2['name'] : preg_replace('/\s*\(\d+\)/', '', ($matches1[1] != $uid) ? $name1 : $name2);

         $transaction[] = ["player1" => $player['name'] , "player2" => $name , "item_player_1" => $row['item_player_1'] , "item_player_2" => $row['item_player_2'] , "time_tran" => $row['time_tran']];
    }
   } else {
        echo json_encode(["error_code" => 10 ,"error" => "không có lịch sử"] , JSON_PRETTY_PRINT);
      return;
   }
   echo json_encode(["error_code" => 0 , "data" => $transaction] , JSON_PRETTY_PRINT);
}
?>