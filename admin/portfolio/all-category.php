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
            <h1>All Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">All Category</li>
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
                <h3 class="card-title">All Category list</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                 //Show flash message for delete
                  if(isset($_SESSION['delete_flash_message'])) {
                    echo $_SESSION['delete_flash_message'];
                    unset($_SESSION['delete_flash_message']);
                  }
                //Get all portfolios_cat
                $portfolios_cat_query = "SELECT * FROM `portfolios_cat`";
                $portfolios_cat_result = $conn->query($portfolios_cat_query);	
                ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if($portfolios_cat_result->num_rows >= 1){
                      $count = 1;
                      while($cat = $portfolios_cat_result->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $cat['name']; ?></td>
                        <td><?php echo $cat['slug']; ?></td>
                        <td> 
                            <?php if($cat['status'] == 1){
                                echo "Activate";
                            } else {
                                echo "Deactivate";
                            } ?>
                        </td>
                        <td>
                          <a class="btn btn-info btn-sm" href="<?php echo ADMIN_URL.'/portfolio/edit-category.php?id='.$cat['id']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a> 

                          <a class="btn btn-danger btn-sm" href="<?php echo ADMIN_URL.'/portfolio/delete-category.php?id='.$cat['id']; ?>"><i class="fas fa-trash"></i>Delete</a>
                          
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