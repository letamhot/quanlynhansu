<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnUpdateNhanVien']))
    {
        $id = $_POST['id'];
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
        // $chucVus  = implode(",", $chucVu);
        $errors = array();

        $sql = "SELECT * FROM nhanvien";
											
        // Thực thi câu truy vấn và gán vào $result
        $result = mysqli_query($conn, $sql);
        $value = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
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
    
                $errors[]= "Chỉ cho upload file ở dạng JPG, PNG và JPEG";
            }
            if($file_size > 372244480) 
            {
                $errors[] = "Chỉ cho phép upload file dưới 2MB";
            }
            if (empty($errors) == true) 
            {
                move_uploaded_file($file_tmp,"../images/imageNV/".$file_name);
                $sql = "UPDATE nhanvien SET avatar ='".$file_name."', maNV ='".$maNV."', tenNV='".$tenNV."', 
                soDienThoai='".$soDienThoai."', diaChi='".$diaChi."', email='".$email."',
                 ngaySinh='".$ngaySinh."', CMND ='".$cmnd."', ngayCap ='".$ngayCap."', noiCap ='".$noiCap."', 
                 gioiTinh='".$gioiTinh."', trinhDoHocVan= '".$trinhDoHocVan."', tinhTrangHonNhan='".$tinhTrangHonNhan."', 
                trangThai='".$trangThaiLamViec."', ngayVaoLam='".$ngayVaoLam."', luong ='".$luong."', 
                congDoan='".$congDoan."', donvi='".$donVi."', chucvu='".$chucVu."', soQuyetDinh='".$soQuyetDinh."')
                WHERE id= '".$id."'";
                mysqli_query($conn, $sql);
                header('location:../indexNhanVien.php');

            }
            else 
            {
                print_r($errors);
            }
        }
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>