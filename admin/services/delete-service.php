<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');

 //Get if from url
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //delete sql to delete a record
    $delete_sql = "DELETE FROM services WHERE id='$id'";
    if ($conn->query($delete_sql) === TRUE) {
        $_SESSION['delete_flash_message'] = "<p class='msg-success'>Service Deleted Successfully..</p>";
        $url = ADMIN_URL."/services/all-service.php";
        echo "<script type='text/javascript'>window.location.href = '$url';</script>";
    } else {
       $_SESSION['delete_flash_message'] = "<p class='msg-unsuccess'>Oops something wrong.</p>";
        $url = ADMIN_URL."/services/all-service.php";
        echo "<script type='text/javascript'>window.location.href = '$url';</script>";
    }
}
?>