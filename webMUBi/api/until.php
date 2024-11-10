<?php
class until {
    public static function domain($links) {
        $domain = 'http://'.$_SERVER['HTTP_HOST'].'/'.$links;
        return $domain;
    }
    
    public static function avatar() {
       if (!isset($_SESSION['username'])){
        return until::domain("Assets/Images/0.png");
       }
       return until::avatar_(sql::Select("account" , "username" , $_SESSION['username'])['id']);
    }
    
    public static function isPl(){
        if (!isset($_SESSION['username'])){
        return null;
       }
       $account = sql::Select("account" , "username" , $_SESSION['username']);
       $player = sql::Select("player" , "account_id" , $account['id']);
       if (!$player){
           return null;
       }
       return $player;
    }
   
    
    public static function avatar_($uid) {
        $player = sql::Select("player" , "account_id" , $uid);
        if (!$player){
           return until::domain("Assets/Images/0.png");
        }
        $items_body = json_decode($player['items_body'], true);
        $avatar = ($player['gender'] == 0) ? 19 : (($player['gender'] == 1) ? 121 : 261);
        foreach ($items_body as $item) {
            $decoded_item = json_decode($item, true);
            if (is_array($decoded_item)) {
                if ($decoded_item[0] != -1){
                    $items = sql::Select("item_template" , "id" , $decoded_item[0]);
                    if ($items['TYPE'] == 5){
                    $avatar = $items['icon_id'];
           }
         }
     }
   }
   return until::domain('Assets/Icon/'.$avatar.'.png');
 }
}
?>