<?php 
include_once('layouts/head.php');
include_once('layouts/navbar.php');
include_once('ajax.php');

global $conn ;	
$defaulttab = 'settings';
 if(isset($_POST['savesetting']) && $_POST['savesetting'] == 'profile'){
        $id  = $_POST['id'];
        $username  = $_POST['username'];
		$firstname =  ($_POST['first_name'] != '') ? trim($_POST['first_name']): '' ;
		$lastname =  ($_POST['last_name'] != '') ? trim($_POST['last_name']): '' ;
		$phone      = ($_POST['phone'] != '') ? $_POST['phone']: '' ; 
		$profile_img = '';
	    $defaulttab =  trim($_POST['defaulttab']);
		if(!empty($_FILES['profileimage']['name'])){
		    $uploads_dir =  UPLOAD_DIR;
		    $tmp_name = $_FILES["profileimage"]["tmp_name"];
            $filename = time().$_FILES["profileimage"]["name"];
            $target_file =  $uploads_dir."/".$filename;
		    // Check if file already exists
		    if (move_uploaded_file($tmp_name, $target_file)) {
		        $profile_img = $filename;
		    }
		}else{
		     $profile_img = $_POST['previmg'];;
		}
		//$profile_picture = $_FILES['profile_img'];
	    $upadtequery =	"UPDATE `users` SET `username`='$username',`phone`='$phone',`first_name`='$firstname',`last_name`='$lastname',`profile_img`='$profile_img' WHERE id='$id'";
        if (mysqli_query($conn,$upadtequery)) {
            $_SESSION['login_id']   = $id;
    		$_SESSION['username']   = $username;
    		$_SESSION['first_name'] = $firstname; 
    		$_SESSION['last_name'] = $lastname;  
    		$_SESSION['phone'] = $phone;
    		$_SESSION['profile_picture'] = $profile_img; 
        }
    
 }
 
 if(isset($_POST['changepasswordfrm']) && $_POST['changepasswordfrm'] == 'changepassword'){
     $defaulttab =  trim($_POST['defaulttab']);
     $id  = $_POST['id'];
     $newpassword =  md5($_POST['confirmpassword']);
     $upadtepwdquery =	"UPDATE `users` SET `password`='$newpassword' WHERE id='$id'";
     if (mysqli_query($conn,$upadtepwdquery)) {
         
     }

 }
 
    $adminId = $_SESSION['login_id'];
   
    $query = "SELECT * FROM `users` WHERE `id` = '$adminId' AND `role` = '0' AND `deleted` = '0'  AND `status` = '0'";
    $result = mysqli_query($conn,$query);	
	$get_result  = mysqli_fetch_assoc($result);
	$row = mysqli_num_rows($result);
	if($row > 0){
		// Initializing Session
	    $login_id   = $get_result['id'];
		$username  = $get_result['username'];
		$first_name = $get_result['first_name']; 
		$last_name = $get_result['last_name']; 
		$email = $get_result['email']; 
		$role      = $get_result['role'];
		$phone      = $get_result['phone']; 
		$profile_picture = $get_result['profile_img']; 
	}


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo ($profile_picture == '') ? UPLOAD_URL.'no-profile.png' :UPLOAD_URL.$profile_picture ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"> <?php echo ucfirst($first_name).' '. ucfirst($last_name) ?></h3>

                <p class="text-muted text-center"><?php echo ($role == 0) ? 'Admin' : 'User'?></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Username</b> <a class="float-right"><?php echo ucfirst($username); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $email; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right"><?php echo $phone; ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link <?php echo ($defaulttab == 'settings') ? 'active' : '' ?>" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link  <?php echo ($defaulttab == 'change_password') ? 'active' : '' ?>" href="#change_password" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="<?php echo ($defaulttab == 'settings') ? 'active' : '' ?> tab-pane" id="settings">
                    <form class="form-horizontal" id="editsetting" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="defaulttab"  value="settings">
                        <input type="hidden" class="form-control" id="adminId"  name="id" value="<?php echo $login_id ?>">
                        <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="<?php echo $username?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="First Name" name="first_name" value="<?php echo $first_name?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="Last Name" name="last_name" value="<?php echo $last_name?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="<?php echo $phone?>" name="phone">
                        </div>
                      </div>
                     <div class="form-group row">
                         <input type="hidden" name="previmg" value="<?php echo $profile_picture;?>">
                        <label for="profileimageFile">Profile Image</label>
                        <div class="col-sm-10">
                            <div class="input-group" style="margin-left: 53px;">
                              <div class="custom-file">
                                <input type="file" class="form-control custom-file-input" id="profileimageFile" value="" name="profileimage">
                                <label class="custom-file-label" for="profileimageFile">Choose file</label>
                              </div>
                        </div>
                         
                        </div>
                      </div>
                       <div class="form-group row">
                            <label for="showImage"></label>
                        <div class="col-sm-10">
                          <img id="blah" class="profile-user-img img-fluid" src="<?php echo ($profile_picture == '') ? UPLOAD_URL.'no-profile.png' :UPLOAD_URL.$profile_picture ?>" alt="your image" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" name="savesetting" value="profile">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                    <div class="tab-pane <?php echo ($defaulttab == 'change_password') ? 'active' : '' ?>" id="change_password">
                    <form class="form-horizontal"  method="post"  id="changepassword">
                        <input type="hidden" name="id"  value="<?php echo $login_id ?>" id="adminlogin_id">
                        <input type="hidden" name="defaulttab"  value="change_password">
                        <div class="form-group row">
                        <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="oldpassword" placeholder="Old Password" name="oldpassword">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="newpassword" placeholder="New Password" name="newpassword">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" name="changepasswordfrm" value="changepassword">Change</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include_once('layouts/footer.php');
?>
<script>
$(function () {
  bsCustomFileInput.init();
$('[data-mask]').inputmask();


  $('#editsetting').validate({
    rules: {
      username: {
        required: true,
      },
      first_name: {
        required: true,
      },
    },
  /*  messages: {
      username: {
        required: "Please enter a username",
      },
      first_name: {
        required: "Please enter a first name",
      },
    },*/
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
  
   /**Check old password */            
     jQuery.validator.addMethod("checkoldpassword",function(value,element,param){
                var input_old_password = $("#oldpassword").val();
                var loginid = $("#adminlogin_id").val();
                var res = '';
                $.ajax({
                    type : "POST",
                    url : "ajax.php",
                    data : {action:'changepassword','oldpassword': input_old_password, adminloginid:loginid },
                    async : false,
                    success : function(data) {
                        if(data == 'true') {
                             res = true;
                            return true;
                        } else {
                             res = false;
                            return false;
                        }
                    }
                });
               return res;
            },"Please enter correct old password value");
  
    $('#changepassword').validate({
    rules: {
      oldpassword: {
        required: true,
        checkoldpassword :true
      },
      newpassword: {
        required: true,
      },
      confirmpassword:{
            required: true,
            equalTo :'#newpassword'
      }
    },
    messages: {
      oldpassword: {
        required: "Please enter a old password",
      },
      newpassword: {
        required: "Please enter a new password",
      },
      confirmpassword: {
        required: "Please enter a confirm password",
        equalTo: "Confirm password doesn't match with new password",
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
  
  profileimageFile.onchange = evt => {
  const [file] = profileimageFile.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
});
</script>