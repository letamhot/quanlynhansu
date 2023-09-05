<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnAddChucVu']))
    {
        $tenChucVu = $_POST['tenChucVu'];
        $sql = "INSERT INTO chucvu(tenChucVu)
        VALUE ('".$tenChucVu."') ";
        mysqli_query($conn, $sql);
        header('location:../indexChucVu.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>