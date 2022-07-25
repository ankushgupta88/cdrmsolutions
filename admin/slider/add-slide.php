<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['slider_submit'])){

    $name = addslashes($_POST['name']);
	$name_two = addslashes($_POST['name_two']);
	$description = addslashes($_POST['description']);
	$read_more_link = addslashes($_POST['read_more_link']);
	$status = $_POST['status'];

    //check file
    if($_FILES["slide_image"]['name']){
        //Upload image
       $image=$_FILES['slide_image']['name']; 
        $imageArr=explode('.',$image); //first index is file name and second index file type
        $rand=rand(10000,99999);
        $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
        //upload path
        $uploadPath = UPLOAD_ADMIN_DIR."slider/".$newImageName;

        $isUploaded = move_uploaded_file($_FILES["slide_image"]["tmp_name"],$uploadPath);
    }  else {
        $newImageName = "";
    }


    //insert new slide
    $slide_insert_sql = "INSERT INTO sliders (name,name_two,description,slide_image,read_more_link,status)VALUES ('$name','$name_two','$description','$newImageName','$read_more_link','$status')";
    if ($conn->query($slide_insert_sql) === TRUE) {
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
            <h1>Add Slide</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Slide</li>
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
                <?php if($sucessMsg){
                  echo "<p class='msg-success'>Slide Added Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                <label for="inputName">Slide Name </label>
                <input type="text" id="inputName" class="form-control" name="name" value="" required>
                </div>
                <div class="form-group">
                  <label>Slide Heading</label>
                  <input type="text" class="form-control" name="name_two" value="" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                </div>
                <div class="form-group">
                   <label>Slide Image</label>
                    <input type="file" class="form-control" name="slide_image">
                </div>
                <div class="form-group">
                   <label>Read More Link</label>
                    <input type="text" class="form-control" name="read_more_link" value="">
                </div>
                 <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1">Activate</option>
                      <option value="0">Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-success" name="slider_submit">
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