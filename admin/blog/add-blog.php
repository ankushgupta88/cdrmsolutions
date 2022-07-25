<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$slugExitsMsg = false;
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['blog_submit'])){

  $name = addslashes($_POST['name']);
  $slug = strtolower($_POST['slug']);
	$description = addslashes($_POST['description']);
	$short_description = addslashes($_POST['short_description']);
	$user_id = $_SESSION['login_id'];
	$status = $_POST['status'];
  $meta_description = $_POST['meta_description'];
	$meta_keyword = $_POST['meta_keyword'];

  //Check slug is exit or not
  $blog_slug_query = "SELECT id,slug FROM `blogs` WHERE `slug` = '$slug'";
	$blog_slug_result = mysqli_query($conn,$blog_slug_query);	
	$blog_slug_rows = mysqli_num_rows($blog_slug_result);
	if($blog_slug_rows >= 1){
    $slugExitsMsg = true; 
  } else {
    //check file
    if($_FILES["blog_image"]['name']){
        //Upload image
       $image=$_FILES['blog_image']['name']; 
        $imageArr=explode('.',$image); //first index is file name and second index file type
        $rand=rand(10000,99999);
        $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
        //upload path
        $uploadPath = UPLOAD_ADMIN_DIR."blog/".$newImageName;

        $isUploaded = move_uploaded_file($_FILES["blog_image"]["tmp_name"],$uploadPath);
    }  else {
        $newImageName = "";
    }


    //insert new blog
    $blog_insert_sql = "INSERT INTO blogs (name,slug,description,short_description,blog_image,user_id,status,meta_description,meta_keyword)VALUES ('$name','$slug','$description','$short_description','$newImageName','$user_id','$status','$meta_description','$meta_keyword')";
    if ($conn->query($blog_insert_sql) === TRUE) {
      $sucessMsg = true;
    } else {
      $unsucessMsg = true;
    }
  }
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="card card-primary">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <?php if($slugExitsMsg){
                  echo "<p class='msg-unsuccess'>Slug Already Exits.</p>";
                } 
                if($sucessMsg){
                  echo "<p class='msg-success'>Blog Added Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                  <label for="inputName">Blog Name </label>
                  <input type="text" id="inputName" class="form-control" name="name" value="" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Blog Slug </label>
                  <input type="text" class="form-control" name="slug" value="" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                </div>
                <div class="form-group">
                  <label>Short Description</label>
                  <textarea id="page_short_desc" name="short_description" rows="4" cols="50" required></textarea>
                </div>
                <div class="form-group">
                   <label>Blog Image</label>
                    <input type="file" class="form-control" name="blog_image">
                </div>
                 <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1">Activate</option>
                      <option value="0">Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Meta Description</label>
                  <textarea name="meta_description" rows="4" cols="50" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>Meta keywords</label>
                  <textarea name="meta_keyword" rows="4" cols="50" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Submit" class="btn btn-success" name="blog_submit">
                </div>
              </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('../layouts/footer.php'); ?>