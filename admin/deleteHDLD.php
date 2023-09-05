<?php

include("../connection/connection.php");
    $sql_oder = "DELETE FROM hopdonglaodong WHERE id = '".$_GET['id']."'";
    if(mysqli_query($conn, $sql_oder))
    {
        header('location: indexHDLD.php');
    }
    else
    {
        echo'Lỗi không thể xoá'. $sql_oder. mysqli_error($conn);
    }
    include("../connection/closedatabase.php");
?>