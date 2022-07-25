<?php
$root  = $_SERVER['DOCUMENT_ROOT'].'/'.'cdrmsolutions/';
include_once($root.'inc/db_connection.php');
include_once($root.'inc/config.php');

 if(isset($_POST['action']) && $_POST['action'] == 'changepassword'){
     global $conn ;
     $adminId = trim($_POST['adminloginid']);
     $newpassword = md5(trim($_POST['oldpassword']));
    $query = "SELECT * FROM `users` WHERE `id` = '$adminId' AND `role` = '0' AND `deleted` = '0'  AND `status` = '0'  AND `password` = '$newpassword' ";
    $result = mysqli_query($conn,$query);	
	$get_result  = mysqli_fetch_assoc($result);
	$row = mysqli_num_rows($result);
	if($row > 0){
	    echo 'true';
	    $valid = 'true';
	}else{
	    echo 'false'; 
	    $valid = 'false';
	}
	
	$result = $valid;
    die();
}
?>