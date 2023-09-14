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
            <h1 class="m-0">Thông tin cá nhân của <?php echo $tenNV; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Profile</a></li>
              <li class="breadcrumb-item active">Thông tin cá nhân</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="" method="post" enctype="multipart/form-data">
            <div class="profile_edit">
                <!-- <div class="row">
                    <div class="col-12 col-sm-12 col-sm-6">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Sửa thông tin Nhân viên</h3>
                            </div>
                            <div class="header__buttom_edit">
                                <button type="submit" name="btnUpdateNhanVien" class="btn btn-primary">
                                    <i class="mdi mdi-content-save menu-icon"></i>Lưu
                                </button>
                                <a href="indexNhanVien.php" rel="noopener noreferrer" class="btn btn-danger">
                                    <i class="mdi mdi-close menu-icon"></i>Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="bg-light">
                    <div class="row">
                    <?php 
                            include('../connection/connection.php');
                            $sql_nv = "SELECT * FROM nhanvien WHERE id = '".$id."'";
                            $result_nv = mysqli_query($conn, $sql_nv);
                            $value = mysqli_fetch_array($result_nv, MYSQLI_ASSOC);
                        ?>
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">                                
                                
                                <div class="input-group center" >
                                    <?php if($value['avatar']!= null) : ?>
                                    <img style="display: block; margin-left: auto; margin-right: auto;" id="hinhanh_post" src="../admin/images/imageNV/<?php echo $value['avatar'];?>" alt="" srcset="" width="250px" height="250px">
                                    <?php else  : ?>
                                    <img style="display: block; margin-left: auto; margin-right: auto;" id="hinhanh_post" src="../admin/images/imageNV/logo.jpg" alt="" srcset="" width="250px" height="250px">

                                    <?php endif; ?>

                                </div>
                                <label for="#">Ảnh đại diện</label>
                                <br>
                                <strong style="text-transform: uppercase;"><?php echo $value['tenNV'];?></strong>

                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Mã nhân viên:</label>
                                <label><?php echo $value['maNV'];?></label>

                            </div>
                            <div class="form-group">
                                <label for="#">Ngày sinh:</label>
                                <label><?php echo date("d-m-Y", strtotime($value['ngaySinh']));?></label>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                            <div class="form-group">
                                <label for="#">Địa chỉ:</label>
                                <label><?php echo $value['diaChi'];?></label>
                            </div>
                            <div class="form-group">
                                <label for="#">Số điện thoại:</label>
                                <label><?php echo $value['soDienThoai'];?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                            <div class="form-group">
                                <label for="#">Email:</label>
                                <label><?php echo $value['email'];?></label>
                            </div>
                            <div class="form-group">
                                <label for="#">CMND/CCCD:</label>
                                <label><?php echo $value['CMND'];?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                            <div class="form-group">
                                <label for="#">Ngày cấp:</label>
                                <label><?php echo date("d-m-Y", strtotime($value['ngayCap']));?></label>
                            </div>
                            <div class="form-group">
                                <label for="#">Nơi cấp:</label>
                                <label><?php echo $value['noiCap'];?></label>

                            </div>
                        </div>
                        <div class="col-sm-6">
                           
                            <div class="form-group">
                                <label for="#">Giới tính:</label>
                                <form>
                                    <input name="gioiTinh" type="radio" <?php if (empty($value['gioiTinh'])) { ?> checked <?php } ?> value="0" disabled/>Nam
                                    <input name="gioiTinh" type="radio" <?php if (!empty($value['gioiTinh'])) { ?> checked <?php } ?> value="1" disabled/>Nữ
                                </form>
                            </div>
                            <div class="form-group">
                                <label for="#">Công đoàn:</label>
                                <label><?php echo $value['congDoan'];?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Trình độ học vấn:</label>
                                <select name="trinhDoHocVan" class="form-control" id="exampleFormControlSelect2" disabled>
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM trinhdohocvan ORDER BY trinhdohocvan.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {
                                            if($value['trinhDoHocVan'] == $row_danhmuc['id']) {
                                                echo '<option value='.$row_danhmuc['id'].' selected>'.$row_danhmuc['tenTrinhDoHocVan'].'</option>';

                                            }
                                            else{
                                                echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['tenTrinhDoHocVan'].'</option>';

                                            }
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Đơn vị:</label>
                                <select name="donVi" class="form-control" data-rel="chosen" disabled>
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM donvi ORDER BY donvi.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            if($value['donvi'] == $row_danhmuc['id']) {
                                                echo '<option value='.$row_danhmuc['id'].' selected>'.$row_danhmuc['tenDonVi'].'</option>';

                                            }
                                            else{
                                                echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['tenDonVi'].'</option>';

                                            }
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Chức vụ:</label>
                                <select name="chucVu" class="form-control" disabled>
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM chucvu ORDER BY chucvu.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            if($value['chucvu'] == $row_danhmuc['id']) {
                                                echo '<option value='.$row_danhmuc['id'].' selected>'.$row_danhmuc['tenChucVu'].'</option>';

                                            }
                                            else{
                                                echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['tenChucVu'].'</option>';

                                            }
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Trạng thái làm việc:</label>
                                <select name="trangThaiLamViec" class="form-control" id="" disabled>
                                        <option <?php if (!empty($value['trangThai'])) { ?> selected <?php } ?> value="1">Đang làm việc</option> 
                                        <option <?php if (empty($value['trangThai'])) { ?> selected <?php } ?> value="2">Nghỉ làm việc</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="#">Tình trạng hôn nhân:</label>
                                <select name="tinhTrangHonNhan" class="form-control" id="" disabled>
                                        <option <?php if (!empty($value['tinhTrangHonNhan'])) { ?> selected <?php } ?> value="1">Độc thân</option> 
                                        <option <?php if (empty($value['tinhTrangHonNhan'])) { ?> selected <?php } ?> value="2">Đã kết hôn</option> 
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="#">Ngày vào làm:</label>
                                <label><?php echo date("d-m-Y", strtotime($value['ngayVaoLam']));?></label>

                            </div>
                            <div class="form-group">
                                <label for="#">Số quyết định:</label>
                                <label><?php echo $value['soQuyetDinh'];?></label>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Lương:</label>
                                <select name="luong" class="form-control" id="" disabled>
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM luong ORDER BY luong.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            if($value['luong'] == $row_danhmuc['id']) {
                                                echo '<option value='.$row_danhmuc['id'].' selected>'.$row_danhmuc['luongCoBan'].'</option>';

                                            }
                                            else{
                                                echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['luongCoBan'].'</option>';

                                            }
                                          }
                                  ?>
                                  </select>
                                
                            </div>
                           
                            
                        </div>
                        <br>
                        <h2>Lương của <strong style="text-transform: uppercase;"><?php echo $value['tenNV'];?></strong></h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tháng</th>
                                        <th>Số ngày công</th>
                                        <th>Số ngày nghỉ</th>
                                        <th>Lương thực nhận(VND)</th>
                                        
                                    </tr>
                                </thead>
                                <?php
                                    include('../connection/connection.php');
                                    
                                    // thực thi câu lệnh truy vấn và gắn nó vào result 
                                    // tim tong so records
                                    $result = mysqli_query($conn, 'select count(id) as total from bangchamcong where idNhanVien ="'.$id.'" ');
                                    $row = mysqli_fetch_assoc($result);
                                    $total_records = $row['total'];
                                    // Tim limit va current page
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $limit = 10; // 10 ban ghi tren moi trang

                                    // tinh toan total va strat
                                    // tong so trang

                                    $total_page = ceil($total_records / $limit);
                                    // gioi han current page trong khoang 1 trang ddens total page
                                    if($current_page > $total_page) {
                                        $current_page = $total_page;
                                    }
                                    else if ($current_page< 1) {
                                        $current_page =1;
                                    }
                                    // timf start 
                                    $start = ($current_page - 1 )* $limit;
                                    // truy van lay tin tuc danh sach
                                    // cos limit va start roi thi thuy van csdl lay danh sach san pham
                                    $sql = "SELECT * FROM bangchamcong where idNhanVien ='".$id."' ORDER BY idNhanVien , thangChamCong ASC LIMIT $start, $limit";
                                    $result = mysqli_query($conn, $sql);                                    

                                    
                                    if($result != null) 
                                    {
                                        $resultSQL= mysqli_num_rows($result);

                                        

                                        while($row = mysqli_fetch_assoc($result)) {
                                            $sql2 = "SELECT * FROM nhanvien WHERE id = '".$row['idNhanVien']."'";
                                            // Thực thi câu truy vấn và gán vào $result
                                            $result2 = mysqli_query($conn, $sql2);
                                            $value2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

                                            $sql3 = "SELECT * FROM donvi WHERE id = '".$value2['donvi']."'";
                                            // Thực thi câu truy vấn và gán vào $result
                                            $result3 = mysqli_query($conn, $sql3);
                                            $value3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                            $sql1 = "SELECT * FROM luong  WHERE id = '".$value2['luong']."'";
                                            // Thực thi câu truy vấn và gán vào $result
                                            $result1 = mysqli_query($conn, $sql1);
                                            $value1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                            echo "<tbody id='myTable'>";
                                                echo "<tr>";
                                                    echo "<td>Tháng ". $row["thangChamCong"]."</td>";
                                                    echo "<td>". $row["soNgayCong"]."</td>";
                                                    echo "<td>". $row["soNgayNghi"]."</td>";
                                                    echo "<td>". number_format(($row["luongThucNhan"]))."</td>";
                                                echo "</tr>";
                                            echo "</tbody>";
                                        }
                                    }
                                    else {
                                        echo "<tbody>";
                                            echo "<tr>";
                                                echo "<td colspan='4' class='__waiting'>Không có dữ liệu nào </td>";
                                            echo "</tr>";
                                        echo "</tbody>";
                                    }

                                    include('../connection/closedatabase.php');
                                ?>
                            </table>
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