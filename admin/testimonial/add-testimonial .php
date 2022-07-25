<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['testimonial_submit'])){

    $name = addslashes($_POST['name']);
	$description = addslashes($_POST['description']);
	$status = $_POST['status'];

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
    }  else {
        $newImageName = "";
    }

      //insert new testimonials
      $testimonial_insert_sql = "INSERT INTO testimonials (name,description,image,status)VALUES ('$name','$description','$newImageName','$status')";
      if ($conn->query($testimonial_insert_sql) === TRUE) {
        $sucessMsg = true;
      } else {
        $unsucessMsg = true;
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
            <h1>Add Testimonial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Testimonial</li>
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
                if($sucessMsg){
                  echo "<p class='msg-success'>Testimonial Added Successfully..</p>";
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
                  <label>Description</label>
                  <textarea id="description" name="description" rows="4" cols="50" required></textarea>
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
                    <input type="submit" value="Submit" class="btn btn-success" name="testimonial_submit">
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