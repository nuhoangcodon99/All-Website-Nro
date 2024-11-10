<?php
include "sql.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$input = file_get_contents('php://input');
$data = json_decode($input, true);
if(!isset($data['type'])){
   echo json_encode(["error" => "không hộ trợ"] , JSON_PRETTY_PRINT);
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

$type = $data['type'];
if($type == "sm"){
    $bxh = sql::SelectTop10Json("player" , "data_point" , 1 , 50);
    $envenday = [];
    foreach ($bxh as $topPlayers) {
     $account = isset($_SESSION['username']) ? sql::Select("account", "username", $_SESSION['username']) : null;
     $_pl = ($account && $account['id'] == $topPlayers['account_id']) ? 1 : 0;
    $envenday[] = ["id" => $topPlayers['id'] , "name" => $topPlayers['name'] , "sm" =>json_decode($topPlayers['data_point'] , true)[1] , "isPl" => $_pl];
  }
  echo json_encode($envenday , JSON_PRETTY_PRINT);
} else if($type == "task"){
   $bxh = sql::SelectTop10Json("player" , "data_task" , 0 , 50);
   $envenday = [];
   foreach ($bxh as $topPlayers) {
       $account = isset($_SESSION['username']) ? sql::Select("account", "username", $_SESSION['username']) : null;
       $_pl = ($account && $account['id'] == $topPlayers['account_id']) ? 1 : 0;
       $task = sql::SelectWithIndex("task_sub_template" , "task_main_id", json_decode($topPlayers['data_task'] , true)[0], json_decode($topPlayers['data_task'] , true)[1]);
       $envenday[] = ["id" => $topPlayers['id'] , "name" => $topPlayers['name'] , "task" => $task['NAME'] , "isPl" => $_pl];
  }
  echo json_encode($envenday , JSON_PRETTY_PRINT);
} else if($type == "vnd"){
  $bxh = sql::SelectTop10("account" , "tongnap" , 50);
  foreach ($bxh as $topPlayers) {
      $player = sql::Select("player" , "account_id" , $topPlayers['id']);
      $account = isset($_SESSION['username']) ? sql::Select("account", "username", $_SESSION['username']) : null;
       $_pl = ($account && $account['id'] == $topPlayers['id']) ? 1 : 0;
      if ($player){
         $envenday[] = ["id" => $topPlayers['id'] , "name" => $player['name'] , "task" => action($topPlayers['tongnap']) , "isPl" => $_pl];
      }
  }
  echo json_encode($envenday , JSON_PRETTY_PRINT);
}
?>