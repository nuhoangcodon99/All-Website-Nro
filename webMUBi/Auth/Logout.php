<?php
session_set_cookie_params([
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();
session_unset();
session_destroy();
?>
<script>
window.location.href = "./trang-chu";
</script>