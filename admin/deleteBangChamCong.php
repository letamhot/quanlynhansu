
<?php

include("../connection/connection.php");
$errors = [];
$success = [];
$sql_oder = "DELETE FROM bangchamcong WHERE id = '".$_GET['id']."'";
if(mysqli_query($conn, $sql_oder))
{
    $success['Success :)) '] = "Xóa thành công.!";
    header('location: indexBangChamCong.php');

    
}
else
{
    $error['Error!!!'] = 'Lỗi không thể xoá'. $sql_oder. mysqli_error($conn);

}
include("../connection/closedatabase.php");
?>