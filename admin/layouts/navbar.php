<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?php echo ADMIN_URL; ?>" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo ADMIN_URL; ?>" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <?php 
            if(isset($_SESSION)){
                $profileimage = ($_SESSION['profile_picture'] == '') ? 'no-profile.png' : $_SESSION['profile_picture'];
            }else{
               $profileimage = 'no-profile.png' ;
            }
            ?>
          <img src="<?php echo  UPLOAD_URL.$profileimage; ?>" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php  echo (isset($_SESSION)) ? strtoupper($_SESSION['username']): ''?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?php echo  UPLOAD_URL.$profileimage; ?>" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php  echo (isset($_SESSION)) ? ucfirst($_SESSION['first_name']).' '. ucfirst($_SESSION['last_name']): ''?> - <?php  echo (isset($_SESSION)) ? $_SESSION['email'] : ''?>
            </p>
          </li>
        
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="<?php echo ADMIN_URL; ?>/profile.php" class="btn btn-default btn-flat">Profile</a>
            <a href="<?php echo ADMIN_URL; ?>/logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo ADMIN_URL; ?>" class="brand-link">
      <img src="<?php echo ADMIN_URL; ?>/assets/images/logo.png" alt="logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CDRM Solutions Inc</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo ADMIN_URL; ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php //echo ADMIN_URL.'/pages/add-page.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo ADMIN_URL.'/pages/all-pages.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Pages </p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Menus
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php //echo ADMIN_URL.'/menu/add-menu.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo ADMIN_URL.'/menu/all-menu.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Menus </p>
                </a>
              </li>
            </ul>
          </li>-->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/slider/add-slide.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slide</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/slider/all-slide.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Slide </p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Services
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/services/add-service.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/services/all-service.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Services </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/services/add-category.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/services/all-category.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category </p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/blog/add-blog.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/blog/all-blog.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Blogs </p>
                </a>
              </li>
            </ul>
          </li>
        
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Portfolios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/portfolio/add-portfolio.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Portfolio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/portfolio/all-portfolio.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Portfolio </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/portfolio/add-category.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/portfolio/all-category.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category </p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Testimonial 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/testimonial/add-testimonial .php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Testimonial </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/testimonial/all-testimonial.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Testimonials  </p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Faq 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/faq/add-faq .php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Faq </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ADMIN_URL.'/faq/all-faq.php'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Faq  </p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>