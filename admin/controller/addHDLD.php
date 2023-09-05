<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnAddHDLDNV']))
    {
        $tenNV = $_POST['tenNV'];
        $tenHDLD = $_POST['tenHDLD'];
        $loaiHDLD = $_POST['loaiHDLD'];
        $soQuyetDinh = "";
        $ngayHDLD = $_POST['ngayHDLD'];
        $daiDienCongTy_ky = $_POST['daiDienCongTy_ky'];
        $daiDienNLD_ky = $_POST['daiDienNLD_ky'];
        $noiDung = $_POST['noiDung'];
        
        $sql = "INSERT INTO hopdonglaodong(tenHDLD,idNhanVien,loaiHDLD,ngayHDLD,daiDienCongTy_ky,daiDienNLD_ky,noiDung)
        VALUE ('".$tenHDLD."','".$tenNV."','".$loaiHDLD."','".$ngayHDLD."','".$daiDienCongTy_ky."','".$daiDienNLD_ky."','".$noiDung."') ";
        
        mysqli_query($conn, $sql);
        header('location:../indexHDLD.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>