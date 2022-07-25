<?php include_once('../inc/config.php'); 

//call header files
include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

//messages
$sucessMsg = false;
$unsucessMsg = false;
if(isset($_POST['faq_update'])){

    $faq_id = addslashes($_POST['faq_id']);
    $name = addslashes($_POST['name']);
	$answer = addslashes($_POST['answer']);
    $category_id = $_POST['category_id'];
	$status = $_POST['status'];
    $updated_at = date('Y-m-d H:i:s');

    //update faqs
    $faqs_update_sql = "UPDATE faqs SET name='$name',answer='$answer',category_id='$category_id',status='$status',updated_at='$updated_at' WHERE id='$faq_id'";;
    if ($conn->query($faqs_update_sql) === TRUE) {
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
            <h1>Edit Faq</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Faq</li>
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
                //Get faqs according to id
                $faq_query = "SELECT * FROM `faqs` WHERE id='$id'";
                $faq_result = $conn->query($faq_query);
                if($faq_result->num_rows >= 1){
                    while($faq = $faq_result->fetch_assoc()) { 
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="faq_id" value="<?php echo $faq['id']; ?>">
              <div class="card-body">
                <?php if($sucessMsg){
                  echo "<p class='msg-success'>Faq Updated Successfully..</p>";
                } 
                if($unsucessMsg){
                  echo "<p class='msg-unsuccess'>Oops Something Wrong.</p>";
                }
                ?> 
                <div class="form-group">
                    <label for="inputName">Name </label>
                    <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $faq['name']; ?>" required>
                </div>
                 <div class="form-group">
                    <label for="inputanswer">Answer </label>
                    <textarea class="form-control" id="description" name="answer" rows="4" cols="50" required><?php echo $faq['answer']; ?></textarea>
                </div>
                
                <div class="form-group"> 
                   <label>Category</label>
                   <select name="category_id" class="form-control" required>
                        <option value="1" <?php if($faq['category_id'] == 1){ echo "selected"; } ?>>Left</option>
                        <option value="2" <?php if($faq['category_id'] == 2){ echo "selected"; } ?>>Right</option>
                    </select>
                </div>
                 <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option value="1" <?php if($faq['status'] == 1){ echo "selected"; } ?>>Activate</option>
                      <option value="0" <?php if($faq['status'] == 0){ echo "selected"; } ?>>Deactivate</option>
                    </select>
                </div>
                <div class="form-group">
                <input type="submit" value="Update" class="btn btn-success" name="faq_update">
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