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
            <h1 class="m-0">Thêm Nhân viên</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
              <li class="breadcrumb-item active">Thêm Nhân viên</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="controller/addNhanVien.php" method="post" enctype="multipart/form-data">
            <div class="profile_edit">
                <div class="row">
                    <div class="col-12 col-sm-12 col-sm-6">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm mới Nhân viên</h3>
                            </div>
                            <div class="header__buttom_edit">
                                <button type="submit" name="btnAddNhanVien" class="btn btn-primary">
                                    <i class="mdi mdi-content-save menu-icon"></i>Thêm
                                </button>
                                <a href="indexNhanVien.php" rel="noopener noreferrer" class="btn btn-danger">
                                    <i class="mdi mdi-close menu-icon"></i>Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light">
                    <div class="row">
                    
                    <div class="col-sm-12">
                            <div class="form-group">
                                
                                <input type="file" name="avatar" id="image" class="file-upload-default">
                                
                                
                                <div class="input-group col-xs-6">
                                    <img id="hinhanh_post" src="../admin/images/imageNV/logo.jpg" alt="" srcset="" width="100px" height="100px">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <button class="file-upload-browse btn btn-primary btn-sm" type="button">Chọn ảnh</button>

                                </div>
                                <label for="#">Ảnh đại diện</label>
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Mã nhân viên</label>
                                <input type="text" name="maNV" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="#">Tên nhân viên</label>
                                <input type="text" name="tenNV" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Ngày sinh</label>
                                <input type="date" name="ngaySinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="#">Địa chỉ</label>
                                <textarea type="text" name="diaChi" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Số điện thoại</label>
                                <input type="number" name="soDienThoai" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="#">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">CMND/CCCD</label>
                                <input type="text" name="cmnd" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="#">Ngày cấp</label>
                                <input type="date" name="ngayCap" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Nơi cấp</label>
                                <input type="text" name="noiCap" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="#">Giới tính</label>
                                <form>
                                    <input name="gioiTinh" type="radio" value="0" />Nam
                                    <input name="gioiTinh" type="radio" value="1" />Nữ
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Trình độ học vấn</label>
                                <select name="trinhDoHocVan" class="form-control" id="exampleFormControlSelect2">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM trinhdohocvan ORDER BY trinhdohocvan.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['tenTrinhDoHocVan'].'</option>';
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <select name="donVi" class="select2 form-control">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM donvi ORDER BY donvi.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['tenDonVi'].'</option>';
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select name="chucVu" class="form-control">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM chucvu ORDER BY chucvu.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['tenChucVu'].'</option>';
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Trạng thái làm việc</label>
                                <select name="trangThaiLamViec" class="form-control" id="">
                                        <option value="1">Đang làm việc</option> 
                                        <option value="2">Nghỉ làm việc</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="#">Tình trạng hôn nhân</label>
                                <select name="tinhTrangHonNhan" class="form-control" id="">
                                        <option value="1">Độc thân</option> 
                                        <option value="2">Đã kết hôn</option> 
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Ngày vào làm</label>
                                <input type="date" name="ngayVaoLam" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="#">Số quyết định</label>
                                <input type="text" name="soQuyetDinh" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Lương</label>
                                <select name="luong" class="form-control" id="">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM luong ORDER BY luong.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['luongCoBan'].'</option>';
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="#">Công đoàn</label>
                                <input type="text" name="congDoan" class="form-control">
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
<script>
    $(document).ready(function() {
        $('#select2ChucVu').select2();
    });
    $(document).ready(function() {
        $('#select2DonVi').select2();
    });
</script>