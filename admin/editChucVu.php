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
            <h1 class="m-0">Sửa Chức vụ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Chức vụ</a></li>
              <li class="breadcrumb-item active">Sửa Chức vụ</li>
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
        if(isset($_POST['btnLuuChucVu']))
        {
            $id = $_POST['id'];
            $tenChucVu = $_POST['tenChucVu'];
            if($tenChucVu == ""){
              $errors['Error!!! '] = "Vui lòng nhập đầy đủ thông tin.";

            }
            else{
              $sql = "UPDATE chucvu SET tenChucVu = '".$tenChucVu."' WHERE id= '".$id."' ";
              mysqli_query($conn, $sql);
              $success['Success:)) '] = "Sửa chức vụ thành công.!";
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
                                <h3><i class="mdi mdi-plus-circle-outline menu-icon"></i>Cập nhật Chức vụ</h3>
                            </div>
                            <div class="header__buttom_edit">
                                <button type="submit" name="btnLuuChucVu" class="btn btn-primary">
                                    <i class="mdi mdi-content-save menu-icon"></i>Lưu
                                </button>
                                <a href="indexChucVu.php" rel="noopener noreferrer" class="btn btn-danger">
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
                            $sql_cv = "SELECT * FROM chucvu WHERE id = '".$_GET['id']."'";
                            $result_cv = mysqli_query($conn, $sql_cv);
                            $value = mysqli_fetch_array($result_cv, MYSQLI_ASSOC);
                        ?>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                            <div class="form-group">
                                <label for="#">Tên chức vụ</label>
                                <input type="text" name="tenChucVu" value="<?php echo $value['tenChucVu']; ?>" class="form-control">
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
