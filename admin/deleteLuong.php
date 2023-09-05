<?php

include("../connection/connection.php");
    $sql_oder = "DELETE FROM luong WHERE id = '".$_GET['id']."'";
    if(mysqli_query($conn, $sql_oder))
    {
        header('location: indexLuong.php');
    }
    else
    {
        echo'Lỗi không thể xoá'. $sql_oder. mysqli_error($conn);
    }
    include("../connection/closedatabase.php");
?>