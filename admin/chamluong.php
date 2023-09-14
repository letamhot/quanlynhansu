<?php
include dirname(__FILE__)."/layout/header.php";
include dirname(__FILE__)."/layout/nav.php";
include dirname(__FILE__)."/layout/sidebar.php";


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chấm lương</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Chấm lương</a></li>
              <li class="breadcrumb-item active">Chấm lương</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
        include('../connection/connection.php');
        $sql_bcl = "SELECT * FROM bangchamcong WHERE id = '".$_GET['id']."'";
        $result_bcl = mysqli_query($conn, $sql_bcl);
        $value = mysqli_fetch_array($result_bcl, MYSQLI_ASSOC);

        $sql_nv = "SELECT * FROM nhanvien WHERE id = '".$value['idNhanVien']."'";
        $result_nv = mysqli_query($conn, $sql_nv);
        $value1 = mysqli_fetch_array($result_nv, MYSQLI_ASSOC);

        $sql_luong = "SELECT * FROM luong WHERE id = '".$value1['luong']."'";
        $result_luong = mysqli_query($conn, $sql_luong);
        $value2 = mysqli_fetch_array($result_luong, MYSQLI_ASSOC);
    ?>
    <section class="content">
      <div class="container-fluid">
      <form action="controller/chamluong.php" method="post" enctype="multipart/form-data">
            <div class="profile_edit">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Chấm lương cho <?php echo $value1["tenNV"] ?> </h3>
                            </div>
                            <div class="header__buttom_edit">
                                <button type="submit" name="btnChamLuong" class="btn btn-primary">
                                    <i class="mdi mdi-content-save menu-icon"></i>Thêm
                                </button>
                                <a href="indexBangChamCong.php" rel="noopener noreferrer" class="btn btn-danger">
                                    <i class="mdi mdi-close menu-icon"></i>Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light">
                    <div class="row">
                       
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Số ngày công</label>
                                <input type="number" name="soNgayCong" value="<?php echo $value["soNgayCong"] ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="#">Số ngày nghỉ</label>
                                <input type="number" name="soNgayNghi" value="<?php echo $value["soNgayNghi"] ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="#">Lương cơ bản (VND)</label>
                                <input type="number" name="luongCoBan" value="<?php echo ($value2["luongCoBan"]) ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="#">Hệ số</label>
                                <input type="number" name="heSo" value="<?php echo $value2["heSoLuong"] ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="#">Lương thực nhận</label>
                                <input type="text" name="luongThucNhan" value="<?php echo ceil(((($value2["heSoLuong"]*$value2["luongCoBan"])+ $value2["phuCap"])/26)*$value["soNgayCong"] + (($value2["heSoLuong"]*$value2["luongCoBan"])/26)*$value["soNgayNghi"]) ?>" class="form-control">
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
include dirname(__FILE__)."/layout/footer.php";

?>