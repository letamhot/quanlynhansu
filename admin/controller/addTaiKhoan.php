<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnAddLienKet']))
    {
        $id = $_POST['id'];
        $tenRole = $_POST['tenRole'];
        if($id != null){
            $sql = "UPDATE nhanvien SET idRole = '".$tenRole."' WHERE id= '".$id."' ";
        }
        
        

        mysqli_query($conn, $sql);
        header('location:../indexNhanVien.php');
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>