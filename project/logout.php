<?php
session_start();
unset($_SESSION['user']);
echo '您已经成功登出!';
?>