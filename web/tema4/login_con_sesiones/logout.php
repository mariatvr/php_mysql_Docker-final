<?php
$_SESSION = [];
session_destroy();
header("location:login.php?error_msg=SESION CERRADA CORRECTAMENTE");
exit();
