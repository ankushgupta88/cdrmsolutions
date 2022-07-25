<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['slider_update'])){

    $slide_id = addslashes($_POST['slide_id']);
    $name = addslashes($_POST['name']);
	$name_two = addslashes($_POST['name_two']);
	$description = addslashes($_POST['description']);
	$read_more_link = addslashes($_POST['read_more_link']);
	$status = $_POST['status'];
    $updated_at = date('Y-m-d H:i:s');

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

        //update slide
        $slide_update_sql = "UPDATE sliders SET name='$name',name_two='$name_two',description='$description',slide_image='$newImageName',read_more_link='$read_more_link',status='$status',updated_at='$updated_at' WHERE id='$slide_id'";;
        if ($conn->query($slide_update_sql) === TRUE) {
            $sucessMsg = true;
        } else {
            $unsucessMsg = true;
        }
    }  else {
        //update slide
        $slide_update_sql = "UPDATE sliders SET name='$name',name_two='$name_two',description='$description',read_more_link='$read_more_link',status='$status',updated_at='$updated_at' WHERE id='$slide_id'";;
        if ($conn->query($slide_update_sql) === TRUE) {
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
            <h1>Edit Slide</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Slide</li>
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
                //Get slide according to id
                $slide_query = "SELECT * FROM `sliders` WHERE id='$id'";
                $slide_result = $conn->query($slide_query);
                if($slide_result->num_rows >= 1){
                    while($slide = $slide_result->fetch_assoc()) { 
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="slide_id" value="<?php echo $slide['id']; ?>">
              <div class="card-body">
                <?php if($sucessMsg){
                  echo "<p class='msg-success'>Slide Updated Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                <label for="inputName">Slide Name </label>
                <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $slide['name']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Slide Heading</label>
                  <input type="text" class="form-control" name="name_two" value="<?php echo $slide['name_two']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="description" name="description" rows="4" cols="50" required><?php echo $slide['description']; ?></textarea>
                </div>
                <div class="form-group">
                   <label>Slide Image</label>
                    <input type="file" class="form-control" name="slide_image">
                    <?php if($slide['slide_image']){ ?>
                        <img src="<?php echo UPLOAD_IMAGE_PATH."slider/".$slide['slide_image']; ?>" alt="<?php echo ['slide_image']; ?>" width="100" height="100">
                    <?php } ?>
                </div>
                <div class="form-group">
                   <label>Read More Link</label>
                    <input type="text" class="form-control" name="read_more_link" value="<?php echo $slide['read_more_link']; ?>">
                </div>
                 <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1" <?php if($slide['status'] == 1){ echo "selected"; } ?>>Activate</option>
                      <option value="0" <?php if($slide['status'] == 0){ echo "selected"; } ?>>Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                <input type="submit" value="Update" class="btn btn-success" name="slider_update">
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