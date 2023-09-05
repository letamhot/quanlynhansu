<?php  
    $conn = mysqli_connect('localhost', 'root', '', 'quanlynhansu');
    if(!$conn) {
		die ('Kết nối cơ sở dữ liệu thất bại' .mysqli_connect_error());
	}
	// Thiết lập viết tiếng việt 
	mysqli_set_charset($conn, 'utf8');

?>