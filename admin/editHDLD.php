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
            <h1 class="m-0">Thêm hợp đồng lao động</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Hợp đồng lao động</a></li>
              <li class="breadcrumb-item active">Thêm hợp đồng lao động</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="controller/updateHDLD.php" method="post" enctype="multipart/form-data">
            <div class="profile_edit">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="header_content">
                            <div class="header__content_title">
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm hợp đồng lao động</h3>
                            </div>
                            <div class="header__buttom_edit">
                                <button type="submit" name="btnAddHDLDNV" class="btn btn-primary">
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
                            $sql_nv = "SELECT * FROM hopdonglaodong WHERE id = '".$_GET['id']."'";
                            $result_nv = mysqli_query($conn, $sql_nv);
                            $value = mysqli_fetch_array($result_nv, MYSQLI_ASSOC);
                            
                        ?>
                        <input type="hidden" name="id" value="<?php echo $value['id']; ?>">

                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Tên nhân viên</label>
                                <select name="tenNV" class="form-control" id="exampleFormControlSelect2">
                                  <?php 
                                      include('../connection/connection.php');
                                      $sql_danhmuc = "SELECT * FROM nhanvien ORDER BY nhanvien.id ASC";
                                      $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                          while($row_danhmuc = mysqli_fetch_assoc($result_danhmuc))
                                          {
                                            if($value['idNhanVien'] = $row_danhmuc['id']){
                                              echo '<option value='.$row_danhmuc['id'].' selected>'.$row_danhmuc['tenNV'].'</option>';

                                            } else{
                                              echo '<option value='.$row_danhmuc['id'].'>'.$row_danhmuc['tenNV'].'</option>';

                                            }
                                          }
                                  ?>
                                </select>
                                
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Tên hợp đồng lao động</label>
                                <input type="text" name="tenHDLD" value="<?php echo $value['tenHDLD'] != null ? $value['tenHDLD']:"";?>" class="form-control">

                                                
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Loại hợp đồng lao động</label>
                                <input type="text" name="loaiHDLD" value="<?php echo $value['loaiHDLD'] != null ? $value['loaiHDLD']:"";?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Ngày hợp đồng lao động</label>
                                <input type="date" name="ngayHDLD" value="<?php echo $value['ngayHDLD'] != null ? $value['ngayHDLD']:"";?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Đại diện công ty ký</label>
                                <input type="text" name="daiDienCongTy_ky" value="<?php echo $value['daiDienCongTy_ky'] != null ? $value['daiDienCongTy_ky']:"";?>" class="form-control">
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Đại diện người lao động ký</label>
                                <input type="text" name="daiDienNLD_ky" value="<?php echo $value['daiDienNLD_ky'];?>" class="form-control" disabled>
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="#">Nội dung</label>
                                <textarea type="text" name="noiDung" class="form-control"><?php echo $value['noiDung'] != null ? $value['noiDung']:"";?></textarea>
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