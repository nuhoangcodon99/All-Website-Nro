<?php
include "sql.php";
header("Content-Type: application/json; charset=UTF-8");
$input = file_get_contents('php://input');
$data = json_decode($input, true);
if (!isset($data['type'])){
    echo json_encode(["error_code" => 99, "error" => "không thể thực hiện"] , JSON_PRETTY_PRINT);
    return;
}
$type = $data['type'];
  if ($type == "itemInfo"){
      if (!isset($data['uid'])){
        echo json_encode(["error_code" => 99, "error" => "không tìm thấy uid"] , JSON_PRETTY_PRINT);
        return;
    }
    $uid = $data['uid'];
    $items = sql::Select("item_template", "id", $uid);
    if ($items) {
       echo json_encode(["error_code" => 0, "items" => json_encode($items, true)] , JSON_PRETTY_PRINT);
    } else {
       echo json_encode(["error_code" => 99, "error" => "không tìm items"] , JSON_PRETTY_PRINT);
    }
  } else if ($type == "optiInfo"){
     if (!isset($data['uid'])){
        echo json_encode(["error_code" => 99, "error" => "không tìm thấy uid"] , JSON_PRETTY_PRINT);
        return;
    }
    $uid = $data['uid'];
    $option = sql::Select("item_option_template", "id", $uid);
    if ($option){
        echo json_encode(["error_code" => 0, "items" => json_encode($option, true)] , JSON_PRETTY_PRINT);
    } else {
        echo json_encode(["error_code" => 99, "error" => "không tìm items"] , JSON_PRETTY_PRINT);
    }
    
     
  } else if($type == "byitems"){
     if (!isset($data['uid'])){
        echo json_encode(["error_code" => 99, "error" => "không tìm thấy uid"] , JSON_PRETTY_PRINT);
        return;
    }
     $uid = $data['uid'];
     $items_web = sql::Select("items_web", "id", $uid);
     if (!$items_web){
        echo json_encode(["error_code" => 99, "error" => "không tìm thấy uid"] , JSON_PRETTY_PRINT);
        return;
     }
     if (!isset($_SESSION['username'])){
         echo json_encode(["error_code" => 99, "error" => "bạn chưa đang nhập"] , JSON_PRETTY_PRINT);
         return;
     }
     $player = until::isPl();
     if (!$player){
         echo json_encode(["error_code" => 99, "error" => "bạn chưa tạo nhân vật"] , JSON_PRETTY_PRINT);
         return;
     }
     $account = sql::Select("account", "username", $_SESSION['username']);
     if (!$account){
         echo json_encode(["error_code" => 99, "error" => "không thể thực hiện"] , JSON_PRETTY_PRINT);
         return;
     }
     if ($account['vnd'] >= $items_web['vnd']) {
          sql::update("account" , "vnd" , $account['vnd'] - $items_web['vnd'] , "id" , $account['id']);
          sql::insert("shops_web", "uid, items", "'".$player['id']."', '".$items_web['id']."'");
          echo json_encode(["error_code" => 0] , JSON_PRETTY_PRINT);
          return;
     } else {
          echo json_encode(["error_code" => 99, "error" => "bạn không đủ số dư"] , JSON_PRETTY_PRINT);
          return;
     }
  }
 
  
?>