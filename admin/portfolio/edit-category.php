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
	$status = $_POST['status'];
    $updated_at = date('Y-m-d H:i:s');

    
    //update portfolios_cat
    $cat_update_sql = "UPDATE portfolios_cat SET name='$name',description='$description',status='$status',updated_at='$updated_at' WHERE id='$category_id'";;
    if ($conn->query($cat_update_sql) === TRUE) {
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
            <h1>Edit Portfolio Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Portfolio Category</li>
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
                //Get portfolio category according to id
                $portfolios_cat_query = "SELECT * FROM `portfolios_cat` WHERE id='$id'";
                $portfolios_cat_result = $conn->query($portfolios_cat_query);
                if($portfolios_cat_result->num_rows >= 1){
                    while($cat = $portfolios_cat_result->fetch_assoc()) { 
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="category_id" value="<?php echo $cat['id']; ?>">
              <div class="card-body">
                <?php if($sucessMsg){
                  echo "<p class='msg-success'>Portfolio Category Updated Successfully..</p>";
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
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1" <?php if($cat['status'] == 1){ echo "selected"; } ?>>Activate</option>
                      <option value="0" <?php if($cat['status'] == 0){ echo "selected"; } ?>>Deactivate</option>
                    </select>
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