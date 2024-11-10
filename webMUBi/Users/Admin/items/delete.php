<?php
include '../head.php';
   if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $row = sql::Select("items_web" , "id",$_GET['id']);
   if($row){
       sql::delete("items_web","id",$_GET['id']);
     }
   }
   echo'<script> location.href = "'.until::domain("ADMIN/ITEMS").'" </script>';
?>