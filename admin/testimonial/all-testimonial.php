<?php include_once('../inc/config.php');

include_once('../layouts/head.php');
include_once('../layouts/navbar.php');

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Testimonials</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">All Testimonials</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Testimonials list</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                    //Show flash message for delete
                    if(isset($_SESSION['delete_flash_message'])) {
                        echo $_SESSION['delete_flash_message'];
                        unset($_SESSION['delete_flash_message']);
                    }
                    //Get all testimonials
                    $testimonials_query = "SELECT * FROM `testimonials`";
                    $testimonials_result = $conn->query($testimonials_query);	
                  ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if($testimonials_result->num_rows >= 1){
                      $count = 1;
                      while($testimonial = $testimonials_result->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $testimonial['name']; ?></td>
                        <td>
                            <?php if($testimonial['image']){?>
                                <img src="<?php echo UPLOAD_IMAGE_PATH."testimonial/".$testimonial['image']; ?>" alt="<?php echo $testimonial['image']; ?>" width="100" height="100">
                            <?php } ?>    
                            </td>
                        <td> 
                            <?php if($testimonial['status'] == 1){
                                echo "Activate";
                            } else {
                                echo "Deactivate";
                            } ?>
                        </td>
                        <td>
                          <a class="btn btn-info btn-sm" href="<?php echo ADMIN_URL.'/testimonial/edit-testimonial.php?id='.$testimonial['id']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a> 

                          <a class="btn btn-danger btn-sm" href="<?php echo ADMIN_URL.'/testimonial/delete-testimonial.php?id='.$testimonial['id']; ?>"><i class="fas fa-trash"></i>Delete</a>
                          
                        </td>
                      </tr>
                    <?php $count++;
                    } } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('../layouts/footer.php'); ?>