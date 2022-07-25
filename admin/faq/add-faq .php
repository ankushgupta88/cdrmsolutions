<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['faq_submit'])){

    $name = addslashes($_POST['name']);
    $answer = addslashes($_POST['answer']);
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

    //insert new services
    $service_insert_sql = "INSERT INTO faqs (name,answer,category_id,status)VALUES ('$name','$answer','$category_id','$status')";
    if ($conn->query($service_insert_sql) === TRUE) {
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
            <h1>Add Faq</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Faq</li>
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
                  echo "<p class='msg-success'>Faq Added Successfully..</p>";
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
                  <label for="inputName">Answer</label>
                  <textarea class="form-control" id="description" name="answer" rows="4" cols="50" required></textarea>
                </div>
                <div class="form-group"> 
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                      <option value="1">Left</option>
                      <option value="2">Right</option>
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
                    <input type="submit" value="Submit" class="btn btn-success" name="faq_submit">
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