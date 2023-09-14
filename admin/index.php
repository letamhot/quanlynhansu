<?php
include dirname(__FILE__)."/layout/header.php";
include dirname(__FILE__)."/layout/nav.php";
include dirname(__FILE__)."/layout/sidebar.php";

?>
<?php 
    include('../connection/connection.php');
    $currentMonth = date("m");
    $sql_nv = mysqli_query($conn, "select count(id) as tongchamcong from bangchamcong where thangChamCong = " .$currentMonth);
    if(mysqli_num_rows($sql_nv)> 0)
    {
      while($row = mysqli_fetch_array($sql_nv))
      {
        $tongchamcong = $row['tongchamcong'];
        // var_dump($tongsanpham);
      }
    }
    $sql_nv = mysqli_query($conn, "select count(id) as tongnhanvien from nhanvien");
			if(mysqli_num_rows($sql_nv)> 0)
			{
				while($row = mysqli_fetch_array($sql_nv))
				{
					$tongnhanvien = $row['tongnhanvien'];
					// var_dump($tongsanpham);
				}
			}
    $sql_hd = mysqli_query($conn, "select count(id) as tonghopdong from hopdonglaodong");
			if(mysqli_num_rows($sql_hd)> 0)
			{
				while($row = mysqli_fetch_array($sql_hd))
				{
					$tonghopdong = $row['tonghopdong'];
					// var_dump($tongsanpham);
				}
			}
      $sql_hd = mysqli_query($conn, "select count(email) as tongtaikhoan from nhanvien");
			if(mysqli_num_rows($sql_hd)> 0)
			{
				while($row = mysqli_fetch_array($sql_hd))
				{
					$tongtaikhoan = $row['tongtaikhoan'];
					// var_dump($tongsanpham);
				}
			}
      include('../connection/connection.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Trang chủ hệ thống</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ hệ thống</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $tongnhanvien ?></h3>

                <p>Tổng số nhân viên</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $tonghopdong ?><sup style="font-size: 20px"></sup></h3>

                <p>Tổng số hợp đồng lao động</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $tongtaikhoan ?></h3>

                <p>Số lượng tài khoản</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $tongchamcong ?></h3>

                <p>Số lượng nhân viên chấm công trong tháng</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include dirname(__FILE__)."/layout/footer.php";

?>