<?php session_start();

$root  = $_SERVER['DOCUMENT_ROOT'].'/'.'cdrmsolutions/';
include_once($root.'inc/db_connection.php');
if($_SESSION['login_id'] != ""){
    header("Location: index.php");   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CDRM Solutions Inc | Admin Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
  <style>
      .login-box{
          width:380px;
      }
  </style>
</head>
<body class="hold-transition login-page">
<?php
if(isset($_POST['login_check']) && $_POST['login_check'] == 'login'){
    global $conn ;	
	
	$admin_email = trim($_POST['email']);
	$admin_password = md5($_POST['password']);
	
	$query = "SELECT * FROM `users` WHERE `email` = '$admin_email' AND `password` = '$admin_password' AND `role` = '0' AND `deleted` = '0'  AND `status` = '0'";
	$result = mysqli_query($conn,$query);	
	$get_result  = mysqli_fetch_assoc($result);
	$row = mysqli_num_rows($result);
	if($row > 0){
		// Initializing Session
		$_SESSION['login_id']   = $get_result['id'];
		$_SESSION['username']   = $get_result['username'];
		$_SESSION['first_name'] = $get_result['first_name']; 
		$_SESSION['last_name'] = $get_result['last_name']; 
		$_SESSION['email'] = $get_result['email']; 
		$_SESSION['role']       = $get_result['role']; 
		$_SESSION['email']      = $get_result['email']; 
		$_SESSION['profile_picture'] = $get_result['profile_img']; 
        header('Location: index.php');
    echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();
	}else{?>
	   <div class="alert alert-danger alert-dismissible fade show" role="alert">
	       Please Enter correct Username or password
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        </div>
<?php	}
	
}
?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo SITE_URL;?>" class="h1"><b>CDRM</b>Solutions Inc</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in </p>

      <form action="" method="post" id='adminloginForm'>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name='email'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login_check" value="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Toastr -->
<script src="assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<script>
$(function () {
  $('#adminloginForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
