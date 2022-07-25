<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['portfolio_submit'])){

    $name = addslashes($_POST['name']);
    $url = addslashes($_POST['url']);
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

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
    }  else {
        $newImageName = "";
    }

    //insert new portfolio
    $portfolio_insert_sql = "INSERT INTO portfolios (name,image,url,category_id,status)VALUES ('$name','$newImageName','$url','$category_id','$status')";
    if ($conn->query($portfolio_insert_sql) === TRUE) {
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
            <h1>Add Portfolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Portfolio</li>
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
                  echo "<p class='msg-success'>Portfolio Added Successfully..</p>";
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
                   <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                  <label for="inputName">Url</label>
                  <input type="text"  class="form-control" name="url" value="" >
                </div>
                <div class="form-group"> 
                  <?php //Get all portfolio category
                    $portfolios_cat_query = "SELECT * FROM `portfolios_cat` WHERE status='1'";
                    $portfolios_cat_result = $conn->query($portfolios_cat_query); ?>
                   <label>Select Category</label>
                   <select name="category_id" class="form-control" required>
                     <?php if($portfolios_cat_result->num_rows >= 1){
                      while($cat = $portfolios_cat_result->fetch_assoc()) { ?>
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
                <input type="submit" value="Submit" class="btn btn-success" name="portfolio_submit">
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