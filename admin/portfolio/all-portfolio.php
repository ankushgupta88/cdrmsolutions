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
            <h1>All Portfolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">All Portfolio</li>
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
                <h3 class="card-title">All Portfolio list</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                    //Show flash message for delete
                    if(isset($_SESSION['delete_flash_message'])) {
                        echo $_SESSION['delete_flash_message'];
                        unset($_SESSION['delete_flash_message']);
                    }
                    //Get all portfolios
                    $portfolios_query = "SELECT * FROM `portfolios`";
                    $portfolios_result = $conn->query($portfolios_query);	
                  ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Image</th>
                     <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if($portfolios_result->num_rows >= 1){
                      $count = 1;
                      while($portfolio = $portfolios_result->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $portfolio['name']; ?></td>
                        <td>
                            <?php if($portfolio['image']){?>
                                <img src="<?php echo UPLOAD_IMAGE_PATH."portfolio/".$portfolio['image']; ?>" alt="<?php echo $portfolio['image']; ?>" width="100" height="100">
                            <?php } ?>    
                        </td>
                        <td>
                            <?php  
                            //Get cat anme with use  id
                            $category_id = $portfolio['category_id'];
                            $cat_query = "SELECT id,name FROM `portfolios_cat` WHERE id='$category_id'";
                            $cat_result = $conn->query($cat_query);
                            $cat_data = $cat_result->fetch_array(MYSQLI_ASSOC);
                              
                            echo $cat_name = $cat_data['name'];
                            ?>
                        </td>
                        <td> 
                            <?php if($portfolio['status'] == 1){
                                echo "Activate";
                            } else {
                                echo "Deactivate";
                            } ?>
                        </td>
                        <td>
                          <a class="btn btn-info btn-sm" href="<?php echo ADMIN_URL.'/portfolio/edit-portfolio.php?id='.$portfolio['id']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a> 

                          <a class="btn btn-danger btn-sm" href="<?php echo ADMIN_URL.'/portfolio/delete-portfolio.php?id='.$portfolio['id']; ?>"><i class="fas fa-trash"></i>Delete</a>
                          
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