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
            <h1 class="m-0">Sửa Bảng Chấm Công</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng Chấm Công</a></li>
              <li class="breadcrumb-item active">Sửa Bảng Chấm Công</li>
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
      if(isset($_POST['btnUpdateBCC']))
      {
          $id = $_POST['id'];
          $tenNV = $_POST['tenNV'];
          $soNgayCong = $_POST['soNgayCong'];
          $soNgayNghi = $_POST['soNgayNghi'];
          $thangChamCong = $_POST['thangChamCong'];
          $tenDonVi = $_POST['tenDonVi'];

          
          $sql = "UPDATE bangchamcong SET idNhanVien ='".$tenNV."',
          soNgayCong='".$soNgayCong."', soNgayNghi='".$soNgayNghi."', 
          thangChamCong ='".$thangChamCong."', idDonVi='".$tenDonVi."'
          WHERE id= '".$id."'";
          $success['Success :)) '] = "Sửa bảng chấm công thành công.!";
          mysqli_query($conn, $sql);
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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Sửa Bảng Chấm Công</h3>
                            </div>
                            <div class="header__buttom_edit">
                                <button type="submit" name="btnUpdateBCC" id="btnUpdateBCC" class="btn btn-primary">
                                    <i class="mdi mdi-content-save menu-icon"></i>Lưu
                                </button>
                                <a href="indexBangChamCong.php" rel="noopener noreferrer" class="btn btn-danger">
                                    <i class="mdi mdi-close menu-icon"></i>Thoát
                                </a>
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
                        <?php
                            include('../connection/connection.php');
                            $sql_bcl = "SELECT * FROM bangchamcong WHERE id = '".$_GET['id']."'";
                            $result_bcl = mysqli_query($conn, $sql_bcl);
                            $value_bcl = mysqli_fetch_array($result_bcl, MYSQLI_ASSOC);

                            $sql_dv = "SELECT * FROM donvi WHERE id = '".$value_bcl['idDonVi']."'";
                            $result_dv = mysqli_query($conn, $sql_dv);
                            $value_dv = mysqli_fetch_array($result_dv, MYSQLI_ASSOC);

                            $sql = "SELECT * FROM nhanvien";
                            // Thực thi câu truy vấn và gán vào $result
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_array($result,MYSQLI_ASSOC);
                         ?>
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Tên đơn vị</label>
                                <select name="tenDonVi" class="form-control" id="donVi">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_dvi = "SELECT * FROM donvi where id= $donvi ORDER BY donvi.id ASC";
                                      $result_dvi = mysqli_query($conn, $sql_dvi);
                                          while($row_dvi = mysqli_fetch_assoc($result_dvi))
                                          {   
                                            if($row_dvi['id'] == $value_dv["id"]){
                                                echo '<option value='.$value_dv["id"].' selected>'.$row_dvi['tenDonVi'].'</option>';

                                            }
                                            else{
                                                echo '<option value='.$row_dvi['id'].'>'.$row_dvi['tenDonVi'].'</option>';

                                            }

                                          }
                                  ?>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label>Tháng chấm công</label>
                                <select name="thangChamCong" class="form-control" id="thangChamCong" onchange="onclickDate()">
                                        <option <?php if($value_bcl["thangChamCong"] == "1") echo"selected"; ?> value="1">Tháng 1</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "2") echo"selected"; ?> value="2">Tháng 2</option>
                                        <option <?php if($value_bcl["thangChamCong"] == "3") echo"selected"; ?> value="3">Tháng 3</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "4") echo"selected"; ?> value="4">Tháng 4</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "5") echo"selected"; ?> value="5">Tháng 5</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "6") echo"selected"; ?> value="6">Tháng 6</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "7") echo"selected"; ?> value="7">Tháng 7</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "8") echo"selected"; ?> value="8">Tháng 8</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "9") echo"selected"; ?> value="9">Tháng 9</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "10") echo"selected"; ?> value="10">Tháng 10</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "11") echo"selected"; ?> value="11">Tháng 11</option> 
                                        <option <?php if($value_bcl["thangChamCong"] == "12") echo"selected"; ?> value="12">Tháng 12</option> 
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="#">Tên nhân viên</label>
                                <select name="tenNV" class="form-control" id="nhanVien">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_nv = "SELECT * FROM nhanvien where donvi = '".$value_dv["id"]."'";
                                      $result_nv = mysqli_query($conn, $sql_nv);
                                          while($row_nv = mysqli_fetch_assoc($result_nv))
                                          {
                                            if($row_nv['id'] == $value_bcl["idNhanVien"]){
                                                if($row_nv['tenNV'] != "Administrator") {
                                                    echo '<option value='.$row_nv['id'].' selected>'.$row_nv['tenNV'].'</option>';
    
                                                }
                                            }
                                            else{
                                                if($row_nv['tenNV'] != "Administrator") {
                                                    echo '<option value='.$row_nv['id'].'>'.$row_nv['tenNV'].'</option>';
    
                                                }
                                            }
                                            
                                          }
                                  ?>
                                  </select>
                                  
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Số ngày công</label>
                                <input type="number" name="soNgayCong" id="soNgayCong" value="<?php echo $value_bcl["soNgayCong"] ?>" class="form-control">

                                
                            </div>
                            <div class="form-group">
                                <label for="#">Số ngày nghỉ</label>
                                <input type="number" name="soNgayNghi" id="soNgayNghi" value="<?php echo $value_bcl["soNgayNghi"] ?>" class="form-control">

                                
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
  function getEmployeesByUnit() {
    var unitSelect = document.getElementById("donvi");
    var employeeSelect = document.getElementById("nhanvien");
    var selectedUnit = unitSelect.value;

    // Xóa tất cả các tùy chọn hiện có trong select nhân viên
    while (employeeSelect.options.length > 0) {
      employeeSelect.remove(0);
    }

    // Gửi yêu cầu AJAX tới server để lấy danh sách nhân viên của đơn vị đã chọn
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "nhanvienBydonvi.php?idDonVi=" + selectedUnit, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Chuyển đổi dữ liệu JSON thành object
        var response = JSON.parse(xhr.responseText);

        // Tạo các tùy chọn nhân viên và thêm vào select nhân viên
        response.forEach(function (employee) {
          var option = new Option(employee.tenNV, employee.id);
          employeeSelect.add(option);
        });
      }
    };
    xhr.send();
  }
  function onclickDate(){
    var date = document.getElementById("thangChamCong");
    var dateValue = date.value;
    let d = new Date();
    let m = d.getMonth() + 1;
    if(dateValue == m){
      document.getElementById("btnUpdateBCC").disabled = false;
    }
    else{
      document.getElementById("btnUpdateBCC").disabled = true;

    }
  }
</script>