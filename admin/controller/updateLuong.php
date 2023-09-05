<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnLuuLuong']))
    {
        $id = $_POST['id'];
        $heSoLuong = $_POST['heSoLuong'];
        $luongCoBan = $_POST['luongCoBan'];
        $phuCap = $_POST['phuCap'];
        $sql = "UPDATE luong SET heSoLuong = '".$heSoLuong."',luongCoBan = '".$luongCoBan."', phuCap = '".$phuCap."' WHERE id= '".$id."' ";
        mysqli_query($conn, $sql);
        header('location:../indexLuong.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>