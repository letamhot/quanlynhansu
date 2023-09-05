<?php
include dirname(__FILE__)."/layout/header.php";
include dirname(__FILE__)."/layout/nav.php";
include dirname(__FILE__)."/layout/sidebar.php";

?>
<div class="content-wrapper container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liên kết tài khoản</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
              <li class="breadcrumb-item active">Liên kết tài khoản</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="controller/addTaiKhoan.php" method="post" enctype="multipart/form-data">
            <div class="profile_edit">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Liên kết tài khoản</h3>
                            </div>
                            <div class="header__buttom_edit">
                                <button type="submit" name="btnAddLienKet" class="btn btn-primary">
                                    <i class="mdi mdi-content-save menu-icon"></i>Lưu
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
                    <?php 
                            include('../connection/connection.php');
                            $sql_nv = "SELECT * FROM nhanvien WHERE id = '".$_GET['id']."'";
                            $result_nv = mysqli_query($conn, $sql_nv);
                            $value = mysqli_fetch_array($result_nv, MYSQLI_ASSOC);
                        ?>
                        <input type="hidden" name="id" value="<?php echo $value['id']; ?>">

                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Tên nhân viên</label>
                                <input type="text" name="tenNV" value="<?php echo $value['tenNV'];?>" class="form-control" disabled>
                                
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Quyền</label>
                                <select name="tenRole" class="form-control" data-rel="chosen">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM role ORDER BY role.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {   
                                            if($value['idRole'] == $row_danhmuc['id']) {
                                                echo '<option value='.$row_danhmuc['id'].' selected>'.$row_danhmuc['roleName'].'</option>';

                                            }
                                            else{
                                                echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['roleName'].'</option>';

                                            }
                                          }
                                  ?>
                                  </select>
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