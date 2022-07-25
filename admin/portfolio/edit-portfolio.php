<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['portfolio_update'])){

    $portfolio_id = addslashes($_POST['portfolio_id']);
    $name = addslashes($_POST['name']);
    $url = $_POST['url'];
    $category_id = $_POST['category_id'];
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
        $uploadPath = UPLOAD_ADMIN_DIR."portfolio/".$newImageName;

        $isUploaded = move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);

        //update portfolios
        $portfolio_update_sql = "UPDATE portfolios SET name='$name',image='$newImageName',url='$url',category_id='$category_id',status='$status',updated_at='$updated_at' WHERE id='$portfolio_id'";;
        if ($conn->query($portfolio_update_sql) === TRUE) {
            $sucessMsg = true;
        } else {
            $unsucessMsg = true;
        }
    }  else {
        //update portfolios
        $portfolio_update_sql = "UPDATE portfolios SET name='$name',url='$url',category_id='$category_id',status='$status',updated_at='$updated_at' WHERE id='$portfolio_id'";;
        if ($conn->query($portfolio_update_sql) === TRUE) {
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
            <h1>Edit Portfolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Portfolio</li>
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
                //Get portfolios according to id
                $portfolios_query = "SELECT * FROM `portfolios` WHERE id='$id'";
                $portfolios_result = $conn->query($portfolios_query);
                if($portfolios_result->num_rows >= 1){
                    while($portfolio = $portfolios_result->fetch_assoc()) { 
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="portfolio_id" value="<?php echo $portfolio['id']; ?>">
              <div class="card-body">
                <?php if($sucessMsg){
                  echo "<p class='msg-success'>Portfolio Updated Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                <label for="inputName">Name </label>
                <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $portfolio['name']; ?>" required>
                </div>
                <div class="form-group">
                   <label>Image</label>
                    <input type="file" class="form-control" name="image">
                    <?php if($portfolio['image']){ ?>
                        <img src="<?php echo UPLOAD_IMAGE_PATH."portfolio/".$portfolio['image']; ?>" alt="<?php echo $portfolio['image']; ?>" width="100" height="100">
                    <?php } ?>
                </div>
                <div class="form-group">
                  <label for="inputName">Url</label>
                  <input type="text"  class="form-control" name="url" value="<?php echo $portfolio['url']; ?>" >
                </div>
                <div class="form-group"> 
                  <?php //Get all portfolio category
                    $portfolio_cat_query = "SELECT * FROM `portfolios_cat` WHERE status='1'";
                    $portfolio_cat_result = $conn->query($portfolio_cat_query); ?>
                   <label>Select Category</label>
                   <select name="category_id" class="form-control" required>
                     <?php if($portfolio_cat_result->num_rows >= 1){
                      while($cat = $portfolio_cat_result->fetch_assoc()) { ?>
                       <option value="<?php echo $cat['id']; ?>" <?php if($cat['id'] == $portfolio['category_id']){ echo "selected"; } ?>><?php echo $cat['name']; ?></option>
                      <?php } } ?>
                    </select>
                </div>
                 <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1" <?php if($portfolio['status'] == 1){ echo "selected"; } ?>>Activate</option>
                      <option value="0" <?php if($portfolio['status'] == 0){ echo "selected"; } ?>>Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                <input type="submit" value="Update" class="btn btn-success" name="portfolio_update">
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