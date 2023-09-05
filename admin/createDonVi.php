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
            <h1 class="m-0">Thêm Đơn Vị</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Đơn Vị</a></li>
              <li class="breadcrumb-item active">Thêm Đơn Vị</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="controller/addDonVi.php" method="post" enctype="multipart/form-data">
            <div class="profile_edit">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm mới Đơn vị</h3>
                            </div>
                            <div class="header__buttom_edit">
                                <button type="submit" name="btnAddDonVi" class="btn btn-primary">
                                    <i class="mdi mdi-content-save menu-icon"></i>Thêm
                                </button>
                                <a href="indexDonVi.php" rel="noopener noreferrer" class="btn btn-danger">
                                    <i class="mdi mdi-close menu-icon"></i>Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Tên đơn vị</label>
                                <input type="text" name="tenDonVi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tên đơn vị cha</label>
                                <select name="tenDonViCha" class="form-control" id="exampleFormControlSelect2">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM donvi ORDER BY donvi.idCha ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['tenDonVi'].'</option>';
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="#">Ngày thành lập</label>
                                <input type="date" name="ngayTL" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Ảnh đại diện</label>
                                <input type="file" name="avatar" id="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Chọn ảnh</button>
                                    </span>
                                </div>
                                <img id="hinhanh_post" src="../admin/images/imageDV/logo.jpg" alt="" srcset="" width="100px" height="100px">

                            </div>
                            <!-- status -->
                            <div class="form-group">
                                <label for="#">Địa chỉ</label>
                                <input type="text" name="diaChi" class="form-control">

                                
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#hinhanh_post').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function() {
        readURL(this);
    });
</script>