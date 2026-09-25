<?php
session_start();
session_destroy(); //borra toda la sesion
header ("location: login.html");
exit;
?>