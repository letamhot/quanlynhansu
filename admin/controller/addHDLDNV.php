<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnAddHDLDNV']))
    {
        $tenNV = $_POST['tenNV'];
        $id = $_POST['id'];
        $tenHDLD = $_POST['tenHDLD'];
        $loaiHDLD = $_POST['loaiHDLD'];
        $soQuyetDinh = "";
        $ngayHDLD = $_POST['ngayHDLD'];
        $daiDienCongTy_ky = $_POST['daiDienCongTy_ky'];
        $daiDienNLD_ky = $_POST['daiDienNLD_ky'];
        $noiDung = $_POST['noiDung'];
        if($id != null){
            $sql = "UPDATE chitiethopdonglaodong SET idNhanVien = '".$tenNV."',soQuyetDinh = '".$soQuyetDinh."',tenHDLD = '".$tenHDLD."',
            loaiHDLD = '".$loaiHDLD."',ngayHDLD = '".$ngayHDLD."',daiDienCongTy_ky = '".$daiDienCongTy_ky."',
            daiDienNLD_ky = '".$daiDienNLD_ky."',noiDung = '".$noiDung."' WHERE id= '".$id."' ";
        }
        else{
            $sql = "INSERT INTO chitiethopdonglaodong(tenHDLD,idNhanVien,soQuyetDinh,tenHDLD,loaiHDLD,ngayHDLD,daiDienCongTy_ky,daiDienNLD_ky,noiDung)
            VALUE ('".$tenHDLD."','".$tenNV."','".$soQuyetDinh."','".$tenHDLD."','".$loaiHDLD."','".$ngayHDLD."','".$daiDienCongTy_ky."','".$daiDienNLD_ky."','".$noiDung."') ";
        }
        mysqli_query($conn, $sql);
        header('location:../indexHDLD.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>