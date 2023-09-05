<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnAddLuong']))
    {
        $heSoLuong = $_POST['heSoLuong'];
        $luongCoBan = $_POST['luongCoBan'];
        $phuCap = $_POST['phuCap'];
        $sql = "INSERT INTO luong(heSoLuong,luongCoBan,phuCap)
        VALUE ('".$heSoLuong."','".$luongCoBan."','".$phuCap."') ";
        mysqli_query($conn, $sql);
        header('location:../indexLuong.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>