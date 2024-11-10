<?php
include '../head.php';
   if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $row = sql::Select("account","id",$_GET['id']);
   if($row){
       sql::delete("account","id",$_GET['id']);
     }
   }
   echo'<script> location.href = "'.until::domain("ADMIN/ACCOUNT").'" </script>';
?>