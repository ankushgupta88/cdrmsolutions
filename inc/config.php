<?php
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'];
//$site_url  = "${protocol}://${domain}/";

$site_url = 'https://testcaresort.com/cdrmsolutions/'; 

define("DOCUMENT_ROOT",$_SERVER["DOCUMENT_ROOT"]);

define("SITE_URL",$site_url);
define("ADMIN_URL",'https://testcaresort.com/cdrmsolutions/admin');

define("UPLOAD_URL",SITE_URL."assets/images/");

define("UPLOAD_DIR",DOCUMENT_ROOT."/cdrmsolutions/assets/images/");

//Upload admin images
define("UPLOAD_ADMIN_DIR",DOCUMENT_ROOT."/cdrmsolutions/upload/");
define("UPLOAD_IMAGE_PATH",$site_url."upload/");


?>