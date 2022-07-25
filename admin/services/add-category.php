<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$slugExitsMsg = false;
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['category_submit'])){

  $name = addslashes($_POST['name']);
  $slug = strtolower($_POST['slug']);
	$description = addslashes($_POST['description']);
	$short_description = addslashes($_POST['short_description']);
	$status = $_POST['status'];
	$is_home = $_POST['is_home'];
	$menu_type = $_POST['menu_type'];
	$meta_description = $_POST['meta_description'];
	$meta_keyword = $_POST['meta_keyword'];
	$city = $_POST['city'];

  //Check slug is exit or not
  $slug_query = "SELECT id,slug FROM `services_cat` WHERE `slug` = '$slug'";
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
            $uploadPath = UPLOAD_ADMIN_DIR."service/cat/".$newImageName;

            $isUploaded = move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
        }  else {
            $newImageName = "";
        }

        //insert new service category
        $cat_insert_sql = "INSERT INTO services_cat (name,slug,description,short_description,image,status,is_home,menu_type,meta_description,meta_keyword,city)VALUES ('$name','$slug','$description','$short_description','$newImageName','$status','$is_home','$menu_type','$meta_description','$meta_keyword','$city')";
        if ($conn->query($cat_insert_sql) === TRUE) {
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
            <h1>Add Service Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Service Category</li>
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
                  echo "<p class='msg-unsuccess'>Category Slug Already Exits.</p>";
                } 
                if($sucessMsg){
                  echo "<p class='msg-success'>Service Category Added Successfully..</p>";
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
                    <label for="inputName">Slug </label>
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
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1">Activate</option>
                      <option value="0">Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>is home</label>
                  <select name="is_home" class="form-control">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Page Type</label>
                  <select name="menu_type" class="form-control">
                      <option value="service">Service</option>
                      <option value="resource">Resource</option>
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
                    <label for="inputName">City </label>
                    <input type="text" class="form-control" name="city" value="">
                </div>
                <div class="form-group">
                  <input type="submit" value="Submit" class="btn btn-success" name="category_submit">
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