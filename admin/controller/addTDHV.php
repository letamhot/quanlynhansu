<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnAddTDHV']))
    {
        $tenTrinhDoHocVan = $_POST['tenTrinhDoHocVan'];
        $sql = "INSERT INTO trinhdohocvan(tenTrinhDoHocVan)
        VALUE ('".$tenTrinhDoHocVan."') ";
        mysqli_query($conn, $sql);
        header('location:../indexTDHV.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>