<?php
session_start();
$root  = $_SERVER['DOCUMENT_ROOT'].'/'.'cdrmsolutions/';
include_once($root.'inc/config.php');
unset($_SESSION["login_id"]);
if(session_destroy()){
  header("Location:".ADMIN_URL);
}
?>
