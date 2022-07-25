<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['testimonial_update'])){

    $testimonial_id = addslashes($_POST['testimonial_id']);
    $name = addslashes($_POST['name']);
	$description = addslashes($_POST['description']);
	$status = $_POST['status'];
    $updated_at = date('Y-m-d H:i:s');

    //check file
    if($_FILES["image"]['name']){
        //Upload image
        $image=$_FILES['image']['name']; 
        $imageArr=explode('.',$image); //first index is file name and second index file type
        $rand=rand(10000,99999);
        $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
        //upload path
        $uploadPath = UPLOAD_ADMIN_DIR."testimonial/".$newImageName;

        $isUploaded = move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);

        //update testimonial
        $testimonial_update_sql = "UPDATE testimonials SET name='$name',description='$description',image='$newImageName',status='$status',updated_at='$updated_at' WHERE id='$testimonial_id'";;
        if ($conn->query($testimonial_update_sql) === TRUE) {
            $sucessMsg = true;
        } else {
            $unsucessMsg = true;
        }
    }  else {
        //update testimonial
        $testimonial_update_sql = "UPDATE testimonials SET name='$name',description='$description',image='$newImageName',status='$status',updated_at='$updated_at' WHERE id='$testimonial_id'";;
        if ($conn->query($testimonial_update_sql) === TRUE) {
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
            <h1>Edit Testimonial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Testimonial</li>
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
                //Get testimonial according to id
                $testimonial_query = "SELECT * FROM `testimonials` WHERE id='$id'";
                $testimonial_result = $conn->query($testimonial_query);
                if($testimonial_result->num_rows >= 1){
                    while($testimonial = $testimonial_result->fetch_assoc()) { 
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="testimonial_id" value="<?php echo $testimonial['id']; ?>">
                <div class="card-body">
                <?php if($sucessMsg){
                    echo "<p class='msg-success'>Testimonial Updated Successfully..</p>";
                    } 
                    if($unsucessMsg){
                    echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                    }
                ?> 
                <div class="form-group">
                <label for="inputName">Name </label>
                <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $testimonial['name']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="description" name="description" rows="4" cols="50" required><?php echo $testimonial['description']; ?></textarea>
                </div>
                <div class="form-group">
                   <label>Image</label>
                    <input type="file" class="form-control" name="image">
                    <?php if($testimonial['image']){ ?>
                        <img src="<?php echo UPLOAD_IMAGE_PATH."testimonial/".$testimonial['image']; ?>" alt="<?php echo $testimonial['image']; ?>" width="100" height="100">
                    <?php } ?>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1" <?php if($testimonial['status'] == 1){ echo "selected"; } ?>>Activate</option>
                      <option value="0" <?php if($testimonial['status'] == 0){ echo "selected"; } ?>>Deactivate</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-success" name="testimonial_update">
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