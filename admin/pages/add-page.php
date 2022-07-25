<?php include_once('../inc/config.php');

include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$slugExits = false;
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['menu_submit'])){

  $name = $_POST['name'];
	$slug = strtolower($_POST['slug']);
	$page_description = $_POST['page_description'];
	$page_short_desc = $_POST['page_short_desc'];
	$parent = $_POST['parent'];
	$status = $_POST['status'];
  $created_at = date('Y-m-d H:i:s');
  $updated_at = date('Y-m-d H:i:s');

  //Check slug is exit or not
  $menu_query = "SELECT id,slug FROM `pages` WHERE `slug` = '$slug'";
	$menu_result = mysqli_query($conn,$menu_query);	
	$menu_rows = mysqli_num_rows($menu_result);
	if($menu_rows >= 1){
    $slugExits = true; 
  } else {
    //insert new menu
    $menu_insert_sql = "INSERT INTO pages (name,slug,descriptions,short_desc,status,parent,created_at,updated_at)VALUES ('$name','$slug','$page_description','$page_short_desc','$status','$parent','$created_at','$updated_at')";
    if ($conn->query($menu_insert_sql) === TRUE) {
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
            <h1>Add Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Page</li>
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
                <?php if($slugExits){
                  echo "<p class='msg-unsuccess'>Slug Aready Exist.</p>";
                }
                if($sucessMsg){
                  echo "<p class='msg-success'>Page Added Successfully..</p>";
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
                  <label>Slug</label>
                  <input type="text" class="form-control" name="slug" value="" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea id="page_description" name="page_description" rows="4" cols="50"></textarea>
                </div>
                <div class="form-group">
                  <label>Short Description</label>
                  <textarea id="page_short_desc" name="page_short_desc" rows="4" cols="50"></textarea>
                </div>
                 <div class="form-group">
                    <?php $pages_query = "SELECT id,name FROM `pages` WHERE `parent` = '0'";
                    	$page_result = mysqli_query($conn,$pages_query);
                	?>
                  <label>Parent</label>
                    <select name="parent" id="parent" class="form-control">
                      <option value="0">Select</option>
                      <?php if($page_result->num_rows >= 1){
                        while($page = $page_result->fetch_assoc()) { ?>
                            <option value="<?php echo $page['id'] ; ?>"><?php echo $page['name'] ; ?></option>
                      <?php } } ?>
                    </select>
                </div>
                 <div class="form-group">
                  <label>Status</label>
                  <select name="status" id="status" class="form-control">
                      <option value="publish">Publish</option>
                    </select>
                </div>
                <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-success" name="menu_submit">
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