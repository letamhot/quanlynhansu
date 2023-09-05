<?php

include("../connection/connection.php");
    $sql_oder = "DELETE FROM trinhdohocvan WHERE id = '".$_GET['id']."'";
    if(mysqli_query($conn, $sql_oder))
    {
        header('location: indexTDHV.php');
    }
    else
    {
        echo'Lỗi không thể xoá'. $sql_oder. mysqli_error($conn);
    }
    include("../connection/closedatabase.php");
?>