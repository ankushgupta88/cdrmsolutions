<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['category_update'])){

  $category_id = addslashes($_POST['category_id']);
  $name = addslashes($_POST['name']);
  $description = addslashes($_POST['description']);
	$short_description = addslashes($_POST['short_description']);
	$status = $_POST['status'];
	$is_home = $_POST['is_home'];
	$menu_type = $_POST['menu_type'];
	$meta_description = $_POST['meta_description'];
	$meta_keyword = $_POST['meta_keyword'];
	$city = $_POST['city'];
  $updated_at = date('Y-m-d H:i:s');

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

        //update services_cat
        $cat_update_sql = "UPDATE services_cat SET name='$name',description='$description',short_description='$short_description',image='$newImageName',status='$status',is_home='$is_home',menu_type='$menu_type',meta_description='$meta_description',meta_keyword='$meta_keyword',city='$city',updated_at='$updated_at' WHERE id='$category_id'";;
        if ($conn->query($cat_update_sql) === TRUE) {
            $sucessMsg = true;
        } else {
            $unsucessMsg = true;
        }
    }  else {
        //update services_cat
        $cat_update_sql = "UPDATE services_cat SET name='$name',description='$description',short_description='$short_description',status='$status',is_home='$is_home',menu_type='$menu_type',meta_description='$meta_description',meta_keyword='$meta_keyword',city='$city',updated_at='$updated_at' WHERE id='$category_id'";;
        if ($conn->query($cat_update_sql) === TRUE) {
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
            <h1>Edit Service Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Service Category</li>
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
            <?php //Get if from url
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                //Get service category according to id
                $service_cat_query = "SELECT * FROM `services_cat` WHERE id='$id'";
                $service_cat_result = $conn->query($service_cat_query);
                if($service_cat_result->num_rows >= 1){
                    while($cat = $service_cat_result->fetch_assoc()) { 
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="category_id" value="<?php echo $cat['id']; ?>">
              <div class="card-body">
                <?php if($sucessMsg){
                  echo "<p class='msg-success'>Service Category Updated Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                <label for="inputName">Name </label>
                <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $cat['name']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="description" name="description" rows="4" cols="50" required><?php echo $cat['description']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Short Description</label>
                  <textarea id="page_short_desc" name="short_description" rows="4" cols="50" required><?php echo $cat['short_description']; ?></textarea>
                </div>
                <div class="form-group">
                   <label>Category Image</label>
                    <input type="file" class="form-control" name="image">
                    <?php if($cat['image']){ ?>
                        <img src="<?php echo UPLOAD_IMAGE_PATH."service/cat/".$cat['image']; ?>" alt="<?php echo $cat['image']; ?>" width="100" height="100">
                    <?php } ?>
                </div>
                 <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1" <?php if($cat['status'] == 1){ echo "selected"; } ?>>Activate</option>
                      <option value="0" <?php if($cat['status'] == 0){ echo "selected"; } ?>>Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>is home</label>
                  <select name="is_home" class="form-control">
                      <option value="1" <?php if($cat['is_home'] == 1){ echo "selected"; } ?>>Yes</option>
                      <option value="0" <?php if($cat['is_home'] == 0){ echo "selected"; } ?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Page Type</label>
                  <select name="menu_type" class="form-control">
                      <option value="service" <?php if($cat['menu_type'] == "service"){ echo "selected"; } ?>>Service</option>
                      <option value="resource" <?php if($cat['menu_type'] == "resource"){ echo "selected"; } ?>>Resource</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Meta Description</label>
                  <textarea name="meta_description" rows="4" cols="50" class="form-control"><?php echo $cat['meta_description']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Meta keywords</label>
                  <textarea name="meta_keyword" rows="4" cols="50" class="form-control"><?php echo $cat['meta_keyword']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputName">City </label>
                    <input type="text" class="form-control" name="city" value="<?php echo $cat['city']; ?>">
                </div>
                <div class="form-group">
                  <input type="submit" value="Update" class="btn btn-success" name="category_update">
                </div>
              </div>
            </form>
            <?php } } } else { ?>
                <div class="form-group">
                    <h2>No Record found.</h2>
                </div>
            <?php } ?>
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