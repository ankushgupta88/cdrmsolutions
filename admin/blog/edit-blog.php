<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$slugExitsMsg = false;
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['blog_update'])){

    $blog_id = addslashes($_POST['blog_id']);
    $name = addslashes($_POST['name']);
    $slug = strtolower($_POST['slug']);
    $description = addslashes($_POST['description']);
    $short_description = addslashes($_POST['short_description']);
    $status = $_POST['status'];
    $meta_description = $_POST['meta_description'];
	  $meta_keyword = $_POST['meta_keyword'];
    $updated_at = date('Y-m-d H:i:s');
    
    //Check slug is exit or not with current blog id
    $blog_slug_query = "SELECT id,slug FROM `blogs` WHERE `id` = '$blog_id' AND `slug` = '$slug'";
	$blog_slug_result = mysqli_query($conn,$blog_slug_query);	
	$blog_slug_rows = mysqli_num_rows($blog_slug_result);
	if($blog_slug_rows >= 1){
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
    
            //update blog
            $blog_update_sql = "UPDATE blogs SET name='$name',slug='$slug',description='$description',short_description='$short_description',blog_image='$newImageName',status='$status',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='$updated_at' WHERE id='$blog_id'";;
            if ($conn->query($blog_update_sql) === TRUE) {
                $sucessMsg = true;
            } else {
                $unsucessMsg = true;
            }
        }  else {
           //update blog
            $blog_update_sql = "UPDATE blogs SET name='$name',slug='$slug',description='$description',short_description='$short_description',status='$status',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='$updated_at' WHERE id='$blog_id'";;
            if ($conn->query($blog_update_sql) === TRUE) {
                $sucessMsg = true;
            } else {
                $unsucessMsg = true;
            }
        }
    } else {
        //Check slug is exit or not with other blog
        $blog_slug_query2 = "SELECT id,slug FROM `blogs` WHERE  `slug` = '$slug'";
    	$blog_slug_result2 = mysqli_query($conn,$blog_slug_query2);	
    	$blog_slug_rows2 = mysqli_num_rows($blog_slug_result2);
    	if($blog_slug_rows2 >= 1){
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
        
                //update blog
                $blog_update_sql = "UPDATE blogs SET name='$name',slug='$slug',description='$description',short_description='$short_description',blog_image='$newImageName',status='$status',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='$updated_at' WHERE id='$blog_id'";;
                if ($conn->query($blog_update_sql) === TRUE) {
                    $sucessMsg = true;
                } else {
                    $unsucessMsg = true;
                }
            }  else {
               //update blog
                $blog_update_sql = "UPDATE blogs SET name='$name',slug='$slug',description='$description',short_description='$short_description',status='$status',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='$updated_at' WHERE id='$blog_id'";;
                if ($conn->query($blog_update_sql) === TRUE) {
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
            <h1>Edit Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Blog</li>
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
                //Get blog according to id
                $blog_query = "SELECT * FROM `blogs` WHERE id='$id'";
                $blog_result = $conn->query($blog_query);
                if($blog_result->num_rows >= 1){
                    while($blog = $blog_result->fetch_assoc()) { 
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="blog_id" value="<?php echo $blog['id']; ?>">
              <div class="card-body">
                <?php 
                if($slugExitsMsg){
                  echo "<p class='msg-unsuccess'>Slug Already Exits.</p>";
                } 
                if($sucessMsg){
                  echo "<p class='msg-success'>Blog Updated Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                    <label for="inputName">Blog Name </label>
                    <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $blog['name']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputName">Blog Slug </label>
                  <input type="text" class="form-control" name="slug" value="<?php echo $blog['slug']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="description" name="description" rows="4" cols="50" required><?php echo $blog['description']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Short Description</label>
                  <textarea id="page_short_desc" name="short_description" rows="4" cols="50" required><?php echo $blog['short_description']; ?></textarea>
                </div>
                <div class="form-group">
                   <label>Blog Image</label>
                    <input type="file" class="form-control" name="blog_image">
                    <?php if($blog['blog_image']){ ?>
                        <img src="<?php echo UPLOAD_IMAGE_PATH."blog/".$blog['blog_image']; ?>" alt="<?php echo ['blog_image']; ?>" width="100" height="100">
                    <?php } ?>
                </div>
                 <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="1" <?php if($blog['status'] == 1){ echo "selected"; } ?>>Activate</option>
                      <option value="0" <?php if($blog['status'] == 0){ echo "selected"; } ?>>Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Meta Description</label>
                  <textarea name="meta_description" rows="4" cols="50" class="form-control"><?php echo $blog['meta_description']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Meta keywords</label>
                  <textarea name="meta_keyword" rows="4" cols="50" class="form-control"><?php echo $blog['meta_keyword']; ?></textarea>
                </div>
                <div class="form-group">
                <input type="submit" value="Update" class="btn btn-success" name="blog_update">
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