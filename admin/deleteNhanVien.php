<?php

include("../connection/connection.php");
    $sql_oder = "DELETE FROM nhanvien WHERE id = '".$_GET['id']."'";
    if(mysqli_query($conn, $sql_oder))
    {
        header('location: indexNhanVien.php');
    }
    else
    {
        echo'Lỗi không thể xoá'. $sql_oder. mysqli_error($conn);
    }
    include("../connection/closedatabase.php");
?>