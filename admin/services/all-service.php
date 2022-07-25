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
            <h1>All Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">All Services</li>
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
                <h3 class="card-title">All Services list</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                  //Show flash message for delete
                  if(isset($_SESSION['delete_flash_message'])) {
                    echo $_SESSION['delete_flash_message'];
                    unset($_SESSION['delete_flash_message']);
                  }
                    //Get all services
                    $services_query = "SELECT * FROM `services`";
                    $services_result = $conn->query($services_query);	
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
                    <?php if($services_result->num_rows >= 1){
                      $count = 1;
                      while($service = $services_result->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $service['name']; ?></td>
                        <td>
                            <?php if($service['image']){?>
                                <img src="<?php echo UPLOAD_IMAGE_PATH."service/".$service['image']; ?>" alt="<?php echo $service['image']; ?>" width="100" height="100">
                            <?php } ?>    
                            </td>
                        <td> 
                            <?php if($service['status'] == 1){
                                echo "Activate";
                            } else {
                                echo "Deactivate";
                            } ?>
                        </td>
                        <td>
                          <a class="btn btn-info btn-sm" href="<?php echo ADMIN_URL.'/services/edit-service.php?id='.$service['id']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a> 

                          <a class="btn btn-danger btn-sm" href="<?php echo ADMIN_URL.'/services/delete-service.php?id='.$service['id']; ?>"><i class="fas fa-trash"></i>Delete</a>
                          
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