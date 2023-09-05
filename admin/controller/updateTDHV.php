<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnLuuTDHV']))
    {
        $id = $_POST['id'];
        $tenTrinhDoHocVan = $_POST['tenTrinhDoHocVan'];
        $sql = "UPDATE trinhdohocvan SET tenTrinhDoHocVan = '".$tenTrinhDoHocVan."' WHERE id= '".$id."' ";
        mysqli_query($conn, $sql);
        header('location:../indexTDHV.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>