<?php 

    include('../../connection/connection.php');

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
        $pass  = MD5("123456");
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
                $sql = "INSERT INTO nhanvien(avatar, maNV, tenNV, soDienThoai, diaChi, email,
                 ngaySinh, CMND, ngayCap, noiCap, gioiTinh, trinhDoHocVan, tinhTrangHonNhan, 
                trangThai, ngayVaoLam, luong, congDoan, donvi, chucvu, soQuyetDinh,pass)
                VALUE ('".$file_name."', '".$maNV."', '".$tenNV."',
                '".$soDienThoai."', '".$diaChi."','".$email."',
                 '".$ngaySinh."','".$cmnd."','".$ngayCap."',
                 '".$noiCap."','".$gioiTinh."','".$trinhDoHocVan."',
                 '".$tinhTrangHonNhan."','".$trangThaiLamViec."','".$ngayVaoLam."',
                 '".$luong."','".$congDoan."','".$donVi."','".$chucVu."','".$soQuyetDinh."','".$pass."') ";
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