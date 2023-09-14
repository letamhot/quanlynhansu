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
            <h1 class="m-0">Nhân viên</h1>
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
    <?php 

        include('../connection/connection.php');
        $errors = [];
        $success = [];
        if(isset($_POST['btnAddNhanVien']))
        {
            $maNV = $_POST['maNV'];
            $tenNV = $_POST['tenNV'];
            $soDienThoai = $_POST['soDienThoai'];
            $email = $_POST['email'];
            $ngaySinh = $_POST['ngaySinh'];
            $cmnd = $_POST['cmnd'];
            $ngayCap = $_POST['ngayCap'];
            $noiCap = $_POST['noiCap'];
            $gioiTinh = $_POST['gioiTinh'];
            $diaChi = $_POST['diaChi'];
            $trinhDoHocVan = $_POST['trinhDoHocVan'];
            $tinhTrangHonNhan = $_POST['tinhTrangHonNhan'];
            $ngayVaoLam  = $_POST['ngayVaoLam'];
            $soQuyetDinh  = $_POST['soQuyetDinh'];
            $trangThaiLamViec  = $_POST['trangThaiLamViec'];
            $luong  = $_POST['luong'];
            $congDoan  = $_POST['congDoan'];
            $donVi  = $_POST['donVi'];
            // $donVis = implode(",", $donVi);
            $chucVu  = $_POST['chucVu'];
            $pass  = md5("123456");
            $role  =   2;
            // $chucVus  = implode(",", $chucVu);
            $errors = [];

            $sql = "SELECT * FROM nhanvien";
                            
            // Thực thi câu truy vấn và gán vào $result
            $result = mysqli_query($conn, $sql);
            $value = mysqli_fetch_array($result,MYSQLI_ASSOC);
            if($maNV = ""|| $tenNV = ""|| $donVi = ""|| $chucVu = ""|| $congDoan = ""|| $trinhDoHocVan = ""|| $email = "" || $cmnd = "" || $gioiTinh = ""){
                $errors['Error!!!'] = "Vui lòng nhập đầy đủ thông tin.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['Error!!!'] = "Invalid email format";
            }
            if(isset($_FILES['avatar'])) 
            {
                $file_name = $_FILES['avatar'] ['name'];
                $file_size = $_FILES['avatar'] ['name'];
                $file_tmp = $_FILES['avatar'] ['tmp_name'];
                $file_type = $_FILES['avatar'] ['type'];
        
                $arr = explode('.', $file_name);
                $file_ext = strtolower(end($arr));
                $expensions = array("jpeg", "jpg", "png","mp4","webp","");
        
                if(in_array($file_ext, $expensions) === false)
                {
        
                    $errors['Error!!!']= "Chỉ cho upload file ở dạng JPG, PNG và JPEG";
                }
                if($file_size > 372244480) 
                {
                    $errors['Error!!!'] = "Chỉ cho phép upload file dưới 2MB";
                }
                if (empty($errors) == true) 
                {
                    move_uploaded_file($file_tmp,"../images/imageNV/".$file_name);
                    $sql = "INSERT INTO nhanvien(avatar, maNV, tenNV, soDienThoai, diaChi, email,
                    ngaySinh, CMND, ngayCap, noiCap, gioiTinh, trinhDoHocVan, tinhTrangHonNhan, 
                    trangThai, ngayVaoLam, luong, congDoan, donvi, chucvu, soQuyetDinh,pass,idRole)
                    VALUE ('".$file_name."', '".$maNV."', '".$tenNV."',
                    '".$soDienThoai."', '".$diaChi."','".$email."',
                    '".$ngaySinh."','".$cmnd."','".$ngayCap."',
                    '".$noiCap."','".$gioiTinh."','".$trinhDoHocVan."',
                    '".$tinhTrangHonNhan."','".$trangThaiLamViec."','".$ngayVaoLam."',
                    '".$luong."','".$congDoan."','".$donVi."','".$chucVu."','".$soQuyetDinh."','".$pass."','".$role."')";
                    mysqli_query($conn, $sql);
                    $success['Success :)) '] = "Thêm nhân viên thành công.!";
                    sleep(10);
                    header('location:../indexNhanVien.php');

                }
                else 
                {
                    $errors['Error!!!'] ='Thêm nhân viên không thành công';
                }
            }
        }
        //Ngắt kết nối dữ liệu với db
        include('../connection/closedatabase.php');
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="" method="post" enctype="multipart/form-data">
            <div class="profile_edit">
                <div class="row">
                    <div class="col-12 col-sm-12 col-sm-6">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm mới Nhân viên</h3>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="bg-light">
                <?php if($errors) : ?>
                    <div class="alert alert-warning fade show mt-3" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php foreach ($errors as $key => $er) : ?>
                            <strong><?php echo $key; ?></strong><?php echo $er; ?>
                        <?php endforeach; ?>   
                    </div>
                <?php endif; ?>
                <!-- Thông báo thành công  -->
                <?php if($success) : ?>
                    <div class="alert alert-primary fade show mt-3" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php foreach ($success as $key => $su) : ?>
                            <strong><?php echo $key; ?></strong><?php echo $su; ?>
                        <?php endforeach; ?>   
                    </div>  
                <?php endif; ?>
                    <div class="row">
                    
                    <div class="col-sm-12">
                            
                            <div class="form-group">
                                <div class="input-group col-xs-6">
                                    <img id="hinhanh_post" src="../admin/images/imageNV/logo.jpg" alt="" srcset="" width="100px" height="100px">
                                    <input type="file" name="avatar" id="image" class="file-upload-default form-control file-upload-info" placeholder="Upload Image">

                                    <!-- <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <button class="file-upload-browse btn btn-primary btn-sm" style="height: 40px;" type="button">Chọn ảnh</button> -->

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
                                    <input name="gioiTinh" type="radio" value="0" checked/>Nam
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
                                      $sql_danhmuc = "SELECT * FROM donvi where id= $donvi ORDER BY donvi.id ASC";
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