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
            <h1 class="m-0">Bảng Chấm Công</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng Chấm Công</a></li>
              <li class="breadcrumb-item active">Thêm Bảng Chấm Công</li>
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
      if(isset($_POST['btnAddBCC']))
      {
          $id = $_POST['id'];

          $tenNV = $_POST['tenNV'];
          $soNgayCong = $_POST['soNgayCong'];
          $soNgayNghi = $_POST['soNgayNghi'];
          $thangChamCong = $_POST['thangChamCong'];
          $tenDonVi = $_POST['tenDonVi'];
          $luongThucNhan = 0;

          
          $sql = "SELECT * FROM bangchamcong";
              
          // Thực thi câu truy vấn và gán vào $result
          $result = mysqli_query($conn, $sql);
          $value = mysqli_fetch_array($result,MYSQLI_ASSOC);
          if($tenNV == ""){
              $errors['Error!!! ']= "Chưa chọn tên nhân viên";
          }
          else{
            if($soNgayCong == "" || $soNgayNghi== "" || $thangChamCong== "" || $tenDonVi== "")
            {
                $errors['Error!!!'] = "Vui lòng nhập đầy đủ thông tin.";
            }
            else{
              if($id == ""){
                $sql = "INSERT INTO bangchamcong(idNhanVien,soNgayCong,soNgayNghi,thangChamCong,luongThucNhan,idDonVi)
                VALUE ('".$tenNV."','".$soNgayCong."','".$soNgayNghi."','".$thangChamCong."','".$luongThucNhan."','".$tenDonVi."') ";
                
                mysqli_query($conn, $sql);
                $success['Success :)) '] = "Thêm bảng chấm công thành công.!";
              }
              else{
                $sql = "UPDATE bangchamcong SET idNhanVien ='".$tenNV."',
                soNgayCong='".$soNgayCong."', soNgayNghi='".$soNgayNghi."', 
                thangChamCong ='".$thangChamCong."', idDonVi='".$tenDonVi."'
                WHERE id= '".$id."'";
              }
                
  
                
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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm Bảng Chấm Công</h3>
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

                            $sql = "SELECT * FROM nhanvien";
                            // Thực thi câu truy vấn và gán vào $result
                            $result = mysqli_query($conn, $sql);
                            $value = mysqli_fetch_array($result,MYSQLI_ASSOC);
                            $sql1 = "SELECT * FROM donvi";
                            // Thực thi câu truy vấn và gán vào $result
                            $result1 = mysqli_query($conn, $sql1);
                            $value1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                            
                         ?>
                        
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">

                            <div class="form-group">
                                <label for="#">Tên đơn vị</label>
                                <select name="tenDonVi" class="form-control" id="donvi" onclick="getEmployeesByUnit()">
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
                                <label>Tháng chấm công</label>
                                <select name="thangChamCong" class="form-control" id="thangChamCong" onchange="onclickDate()">
                                        <option value="1">Tháng 1</option> 
                                        <option value="2">Tháng 2</option>
                                        <option value="3">Tháng 3</option> 
                                        <option value="4">Tháng 4</option> 
                                        <option value="5">Tháng 5</option> 
                                        <option value="6">Tháng 6</option> 
                                        <option value="7">Tháng 7</option> 
                                        <option value="8">Tháng 8</option> 
                                        <option value="9">Tháng 9</option> 
                                        <option value="10">Tháng 10</option> 
                                        <option value="11">Tháng 11</option> 
                                        <option value="12">Tháng 12</option> 
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="#">Tên nhân viên</label>
                                <select name="tenNV" class="form-control" id="nhanvien">
                                  
                                </select>
                                  
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Số ngày công</label>
                                <input type="number" name="soNgayCong" id="soNgayCong" class="form-control">

                                
                            </div>
                            <div class="form-group">
                                <label for="#">Số ngày nghỉ</label>
                                <input type="number" name="soNgayNghi" id="soNgayNghi" class="form-control">

                                
                            </div>
                            
                        </div>
                        <div class="header__buttom_edit">
                                <button type="submit" name="btnAddBCC" id="btnAddBCC" class="btn btn-primary">
                                    <i class="mdi mdi-content-save menu-icon"></i>Thêm
                                </button>
                                <a href="indexBangChamCong.php" rel="noopener noreferrer" class="btn btn-danger">
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
      document.getElementById("btnAddBCC").disabled = false;
    }
    else{
      document.getElementById("btnAddBCC").disabled = true;

    }
  }
</script>