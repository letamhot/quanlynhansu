
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="<?php $url ?>public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Quản trị hệ thống</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if($id){
            if($anh){
              echo '<img src="../admin/images/imageNV/'.$anh.'" class="img-circle elevation-2" alt="User Image">';

            }
            else{
              echo '<img src="../admin/images/imageNV/logo.jpg" class="img-circle elevation-2" alt="User Image">';

            }
          }
          else{
            echo '<img src="../admin/images/imageNV/logo.jpg" class="img-circle elevation-2" alt="User Image">';
          }
          ?>
          
        </div>
        <div class="user" style="margin-top: 10px; margin-left: 10px;">
            <a href="profile.php">
                <span style="color: #fff;"><?php echo $email; ?></span>
            </a>
        </div>
       
        <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="indexProfile.php">
            <i class="mdi mdi-settings text-primary"></i>
            Cài đặt
          </a>
          <a class="dropdown-item" href="process/processLogout.php">
            <i class="mdi mdi-logout text-primary"></i>
            Đăng xuất
          </a>
        </div> -->

      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="indexDonVi.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục đơn vị</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="indexChucVu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục chức vụ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="indexLuong.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục lương</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="indexHDLD.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục Hợp đồng lao động</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="indexTDHV.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục Trình độ học vấn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="indexNhanVien.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục Nhân viên</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Chức năng hệ thống
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="indexBangChamCong.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bảng chấm công</p>
                  </a>
                </li>
              </ul>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>