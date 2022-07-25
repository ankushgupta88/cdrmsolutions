<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$slugExitsMsg = false;
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['service_submit'])){

  $name = addslashes($_POST['name']);
  $slug = strtolower($_POST['slug']);
	$description = addslashes($_POST['description']);
	$short_description = addslashes($_POST['short_description']);
	$category_id = $_POST['category_id'];
	$status = $_POST['status'];
  $meta_description = $_POST['meta_description'];
	$meta_keyword = $_POST['meta_keyword'];

  //Check slug is exit or not
  $slug_query = "SELECT id,slug FROM `services` WHERE `slug` = '$slug'";
	$slug_result = mysqli_query($conn,$slug_query);	
	$slug_rows = mysqli_num_rows($slug_result);
	if($slug_rows >= 1){
      $slugExitsMsg = true; 
  } else {
      //check file
      if($_FILES["image"]['name']){
          //Upload image
        $image=$_FILES['image']['name']; 
          $imageArr=explode('.',$image); //first index is file name and second index file type
          $rand=rand(10000,99999);
          $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
          //upload path
          $uploadPath = UPLOAD_ADMIN_DIR."service/".$newImageName;

          $isUploaded = move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
      }  else {
          $newImageName = "";
      }

      //insert new services
      $service_insert_sql = "INSERT INTO services (name,slug,description,short_description,image,category_id,status,meta_description,meta_keyword)VALUES ('$name','$slug','$description','$short_description','$newImageName','$category_id','$status','$meta_description','$meta_keyword')";
      if ($conn->query($service_insert_sql) === TRUE) {
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
            <h1>Add Service</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Service</li>
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
                <?php 
                if($slugExitsMsg){
                  echo "<p class='msg-unsuccess'>Service Slug Already Exits.</p>";
                } 
                if($sucessMsg){
                  echo "<p class='msg-success'>Service Added Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                  <label for="inputName">Name </label>
                  <input type="text" id="inputName" class="form-control" name="name" value="" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Slug</label>
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
                   <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group"> 
                  <?php //Get all services category
                    $services_cat_query = "SELECT * FROM `services_cat` WHERE status='1'";
                    $services_cat_result = $conn->query($services_cat_query); ?>
                   <label>Select Category</label>
                   <select name="category_id" class="form-control" required>
                     <?php if($services_cat_result->num_rows >= 1){
                      while($cat = $services_cat_result->fetch_assoc()) { ?>
                       <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                      <?php } } ?>
                    </select>
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
                  <input type="submit" value="Submit" class="btn btn-success" name="service_submit">
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