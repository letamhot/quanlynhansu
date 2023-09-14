<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnChamLuong']))
    {
        $id = $_POST['id'];
        $luongThucNhan = $_POST['luongThucNhan'];
        $sql = "UPDATE bangchamcong SET luongThucNhan = '".$luongThucNhan."' WHERE id= '".$id."'";

        mysqli_query($conn, $sql);
        header('location:../indexBangChamCong.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>