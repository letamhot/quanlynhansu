<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnLuuChucVu']))
    {
        $id = $_POST['id'];
        $tenChucVu = $_POST['tenChucVu'];
        $sql = "UPDATE chucvu SET tenChucVu = '".$tenChucVu."' WHERE id= '".$id."' ";
        mysqli_query($conn, $sql);
        header('location:../indexChucVu.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>