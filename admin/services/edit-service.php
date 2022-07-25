<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$slugExitsMsg = false;
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['service_update'])){

    $service_id = addslashes($_POST['service_id']);
    $name = addslashes($_POST['name']);
    $slug = strtolower($_POST['slug']);
	$name_two = addslashes($_POST['name_two']);
	$description = addslashes($_POST['description']);
	$short_description = addslashes($_POST['short_description']);
    $category_id = $_POST['category_id'];
	$status = $_POST['status'];
    $meta_description = $_POST['meta_description'];
	$meta_keyword = $_POST['meta_keyword'];
    $updated_at = date('Y-m-d H:i:s');

    //Check slug is exit or not with current service id
    $slug_query = "SELECT id,slug FROM `services` WHERE `id` = '$service_id' AND `slug` = '$slug'";
    $slug_result = mysqli_query($conn,$slug_query);	
    $slug_rows = mysqli_num_rows($slug_result);
    if($slug_rows >= 1){
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
    
            //update service
            $slide_update_sql = "UPDATE services SET name='$name',slug='$slug',description='$description',short_description='$short_description',image='$newImageName',category_id='$category_id',status='$status',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='$updated_at' WHERE id='$service_id'";;
            if ($conn->query($slide_update_sql) === TRUE) {
                $sucessMsg = true;
            } else {
                $unsucessMsg = true;
            }
        }  else {
            //update service
            $slide_update_sql = "UPDATE services SET name='$name',slug='$slug',description='$description',short_description='$short_description',category_id='$category_id',status='$status',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='$updated_at' WHERE id='$service_id'";;
            if ($conn->query($slide_update_sql) === TRUE) {
                $sucessMsg = true;
            } else {
                $unsucessMsg = true;
            }
        }
    } else {
        //Check slug is exit or not with other service
        $slug_query2 = "SELECT id,slug FROM `services` WHERE `slug` = '$slug'";
        $slug_result2 = mysqli_query($conn,$slug_query2);	
        $slug_rows2 = mysqli_num_rows($slug_result2);
        if($slug_rows2 >= 1){
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
        
                //update service
                $slide_update_sql = "UPDATE services SET name='$name',slug='$slug',description='$description',short_description='$short_description',image='$newImageName',category_id='$category_id',status='$status',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='$updated_at' WHERE id='$service_id'";;
                if ($conn->query($slide_update_sql) === TRUE) {
                    $sucessMsg = true;
                } else {
                    $unsucessMsg = true;
                }
            }  else {
                //update service
                $slide_update_sql = "UPDATE services SET name='$name',slug='$slug',description='$description',short_description='$short_description',category_id='$category_id',status='$status',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='$updated_at' WHERE id='$service_id'";;
                if ($conn->query($slide_update_sql) === TRUE) {
                    $sucessMsg = true;
                } else {
                    $unsucessMsg = true;
                }
            }
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
            <h1>Edit Service</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Service</li>
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
                //Get service according to id
                $service_query = "SELECT * FROM `services` WHERE id='$id'";
                $service_result = $conn->query($service_query);
                if($service_result->num_rows >= 1){
                    while($service = $service_result->fetch_assoc()) { 
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="service_id" value="<?php echo $service['id']; ?>">
              <div class="card-body">
                <?php 
                if($slugExitsMsg){
                  echo "<p class='msg-unsuccess'>Service Slug Already Exits.</p>";
                } 
                if($sucessMsg){
                  echo "<p class='msg-success'>Service Updated Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                <label for="inputName">Service Name </label>
                <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $service['name']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Slug</label>
                  <input type="text" class="form-control" name="slug" value="<?php echo $service['slug']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="description" name="description" rows="4" cols="50" required><?php echo $service['description']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Short Description</label>
                  <textarea id="page_short_desc" name="short_description" rows="4" cols="50" required><?php echo $service['short_description']; ?></textarea>
                </div>
                <div class="form-group">
                   <label>Service Image</label>
                    <input type="file" class="form-control" name="image">
                    <?php if($service['image']){ ?>
                        <img src="<?php echo UPLOAD_IMAGE_PATH."service/".$service['image']; ?>" alt="<?php echo $service['image']; ?>" width="100" height="100">
                    <?php } ?>
                </div>
                <div class="form-group"> 
                  <?php //Get all services category
                    $services_cat_query = "SELECT * FROM `services_cat` WHERE status='1'";
                    $services_cat_result = $conn->query($services_cat_query); ?>
                   <label>Select Category</label>
                   <select name="category_id" class="form-control" required>
                     <?php if($services_cat_result->num_rows >= 1){
                      while($cat = $services_cat_result->fetch_assoc()) { ?>
                       <option value="<?php echo $cat['id']; ?>" <?php if($cat['id'] == $service['category_id']){ echo "selected"; } ?>><?php echo $cat['name']; ?></option>
                      <?php } } ?>
                    </select>
                </div>
                 <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1" <?php if($service['status'] == 1){ echo "selected"; } ?>>Activate</option>
                      <option value="0" <?php if($service['status'] == 0){ echo "selected"; } ?>>Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Meta Description</label>
                  <textarea name="meta_description" rows="4" cols="50" class="form-control"><?php echo $service['meta_description']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Meta keywords</label>
                  <textarea name="meta_keyword" rows="4" cols="50" class="form-control"><?php echo $service['meta_keyword']; ?></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Update" class="btn btn-success" name="service_update">
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