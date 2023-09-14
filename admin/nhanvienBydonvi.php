<?php 

include('../connection/connection.php');

    // Lấy đơn vị đã chọn từ tham số truyền vào
    $idDonVi = $_GET['idDonVi'];

    // Truy vấn cơ sở dữ liệu để lấy danh sách nhân viên của đơn vị đã chọn
    $sql = "SELECT * FROM nhanvien WHERE donvi = " . $idDonVi ;
    $result = $conn->query($sql);

    $employees = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employee = array(
            'id' => $row['id'],
            'tenNV' => $row['tenNV']
            );
            $employees[] = $employee;
        }
    }

    // Trả về dữ liệu dạng JSON
    header('Content-Type: application/json');
    echo json_encode($employees);
    //Ngắt kết nối dữ liệu với db
    include('../connection/closedatabase.php');
?>