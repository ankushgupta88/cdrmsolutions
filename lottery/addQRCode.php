<?php
  include ("functions.php"); 
  $szOperation = isset($_GET['mode']) ? filter_var($_GET['mode'], FILTER_SANITIZE_STRING) : ""; 
  $szAction = isset($_GET['action']) ? filter_var($_GET['action'], FILTER_SANITIZE_STRING) : ""; 
 
  if($szOperation=="SUBMIT_QR_CODE_CUSTOMER_FORM")
  { 
      $arResults = sendCurlCal("addCustomer", $_POST); 
      ob_end_clean();
        echo "SUCCESS||||";
      successPopup(); 
        echo "||||";
      print_R($arResults);
      die;
  }
  else if($szOperation=="FROM_ANGULAR_APPLICATION")
  {
    $objJson = file_get_contents('php://input');
    $arData = json_decode($objJson); 
    $arResults = sendCurlCal($szAction, $arData); 
    ob_end_clean();
    header( 'HTTP/1.1 200 OK' );
    echo json_encode($arResults);;
    //echo $arResults;
    die();
  }
  else 
  {
    display_add_details_popup();
  } 
?>