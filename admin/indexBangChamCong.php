<?php
include dirname(__FILE__)."/layout/header.php";
include dirname(__FILE__)."/layout/nav.php";
include dirname(__FILE__)."/layout/sidebar.php";
$errors = [];
$success = [];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container">
        <div class="profile_edit">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="header_content">
                        <div class="header__content_title">
                            <h3><i class="mdi mdi-newspaper menu-icon"></i>Danh sách chấm công</h3>
                        </div>
                        <div class="header__buttom_edit">
                            <input class='form-control' type='text' placeholder='Search' aria-label='Search' id='tableSearch' style='width: 25%; float: right; margin: 15px;'>
                            <a href="createBangChamCong.php" class="btn btn-primary">
                                <i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm mới</a>
                            <a href="indexBangChamCong.php" rel="noopener noreferrer" class="btn btn-danger">
                                <i class="mdi mdi-close menu-icon"></i>Thoát
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-light">
            <?php if($errors) : ?>
                        <div class="alert alert-warning fade show mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php foreach ($errors as $key => $er) : ?>
                                <strong><?php echo $key; ?></strong><?php echo $er; ?>
                            <?php endforeach; ?>   
                        </div>
                    <?php endif; ?>
                    <!-- Thông báo thành công  -->
                    <?php if($success) : ?>
                        <div class="alert alert-primary fade show mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php foreach ($success as $key => $su) : ?>
                                <strong><?php echo $key; ?></strong><?php echo $su; ?>
                            <?php endforeach; ?>   
                        </div>  
                    <?php endif; ?>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên nhân viên</th>
                                        <th>Tháng chấm công</th>
                                        <th>Số ngày công</th>
                                        <th>Số ngày nghỉ</th>
                                        <th>Mức lương(VND)</th>
                                        <th>Lương thực nhận(VND)</th>
                                        <th>Tên đơn vị</th>
                                        <?php 
                                            if($role == 1) 
                                            {
                                                echo '<th colspan="2" class="text-center">Thao tác</th>';
                                            }
                                            else 
                                            {
                                            }
                                        ?>
                                    </tr>
                                </thead>
                                <?php
                                    include('../connection/connection.php');
                                    
                                    // thực thi câu lệnh truy vấn và gắn nó vào result 
                                    // tim tong so records
                                    $result = mysqli_query($conn, 'select count(id) as total from bangchamcong where idDonVi = "'.$donvi.'" ');
                                    $row = mysqli_fetch_assoc($result);
                                    $total_records = $row['total'];
                                    // Tim limit va current page
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $limit = 10; // 10 ban ghi tren moi trang

                                    // tinh toan total va strat
                                    // tong so trang

                                    $total_page = ceil($total_records / $limit);
                                    // gioi han current page trong khoang 1 trang ddens total page
                                    if($current_page > $total_page) {
                                        $current_page = $total_page;
                                    }
                                    else if ($current_page< 1) {
                                        $current_page =1;
                                    }
                                    // timf start 
                                    $start = ($current_page - 1 )* $limit;
                                    // truy van lay tin tuc danh sach
                                    // cos limit va start roi thi thuy van csdl lay danh sach san pham
                                    $sql = "SELECT * FROM bangchamcong where idDonVi = $donvi ORDER BY idNhanVien , thangChamCong ASC LIMIT $start, $limit";
                                    $result = mysqli_query($conn, $sql);                                    

                                    
                                    if($result != null) 
                                    {
                                        $resultSQL= mysqli_num_rows($result);

                                        

                                        while($row = mysqli_fetch_assoc($result)) {
                                            $sql2 = "SELECT * FROM nhanvien WHERE id = '".$row['idNhanVien']."'";
                                            // Thực thi câu truy vấn và gán vào $result
                                            $result2 = mysqli_query($conn, $sql2);
                                            $value2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

                                            $sql3 = "SELECT * FROM donvi WHERE id = '".$value2['donvi']."'";
                                            // Thực thi câu truy vấn và gán vào $result
                                            $result3 = mysqli_query($conn, $sql3);
                                            $value3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                            $sql1 = "SELECT * FROM luong  WHERE id = '".$value2['luong']."'";
                                            // Thực thi câu truy vấn và gán vào $result
                                            $result1 = mysqli_query($conn, $sql1);
                                            $value1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                            echo "<tbody id='myTable'>";
                                                echo "<tr>";
                                                    echo "<td>". $row["id"]."</td>";
                                                    if($value2["id"] == $row["idNhanVien"]){
                                                        echo "<td>".$value2["tenNV"]. "</td>";
                                                    }
                                                    
                                                    echo "<td>Tháng ". $row["thangChamCong"]."</td>";
                                                    echo "<td>". $row["soNgayCong"]."</td>";
                                                    echo "<td>". $row["soNgayNghi"]."</td>";
                                                    echo "<td>".number_format($value1["luongCoBan"]). "</td>";
                                                    echo "<td>". ceil($row["luongThucNhan"])."</td>";
                                                    echo "<td>". $value3["tenDonVi"]."</td>";

                                                    if($role == 1)
                                                    {
                                                        echo "<td class='text-center'><a href=\"chamluong.php?id=".$row['id']."\"><i class='mdi mdi-link menu-icon' title='Chấm lương'></i></a></td>";
                                                        echo "<td class='text-center'><a href=\"editBangChamCong.php?id=".$row['id']."\"><i class='mdi mdi-rename-box menu-icon' title='Sửa'></i></a></td>";
                                                        echo "<td class='text-center'><a href=\"deleteBangChamCong.php?id=".$row['id']."\"> <i class='mdi mdi-delete menu-icon' title='Xóa'></i></a></td>";
                                                    }
                                                    else
                                                    {
                                                        
                                                    }
                                                    
                                                echo "</tr>";
                                            echo "</tbody>";
                                        }
                                    }
                                    else {
                                        echo "<tbody>";
                                            echo "<tr>";
                                                echo "<td colspan='9' class='__waiting'>Không có dữ liệu nào </td>";
                                            echo "</tr>";
                                        echo "</tbody>";
                                    }

                                    include('../connection/closedatabase.php');
                                ?>
                            </table>
                        </div>
                        <!-- Start phần hiện thị phân trang  -->
                        <div class="pagination float-right mt-3">
                            <?php 
                                // phần hiển thi phân trang 
                                // nếu current_page > 1 và total_page > 1 thì mới hiển thị nút prev
                                if ($current_page> 1 && $total_page > 1) 
                                {      
                                    echo '<a class="page-link" href="?page='.($current_page-1).'"><i class="mdi mdi-chevron-double-left menu-icon"></i></a> ';
                                }
                                // lap khoang giua
                                for($i =1; $i <= $total_page; $i++) 
                                {
                                    // neu la trang hiện tại thì hiển thị thẻ span
                                    // nguoc lại hiển thị thẻ a 

                                    if($i == $current_page) 
                                    {
                                        echo '<span class="page-link text-danger">'.$i.'</span>';
                                    }
                                    
                                    else 
                                    {
                                        echo '<a class="page-link" href="?page='.$i.'">'.$i.'</a> ';
                                    }
                                }
                                // nếu current_page < total_page >1 mới hiển thị nút prev 
                                if ($current_page < $total_page && $total_page > 1) 
                                {
                                    echo '<a class="page-link" href="?page='.($current_page+1).'"><i class="mdi mdi-chevron-double-right menu-icon"></i></a> ';
                                }
                            ?>
                        </div>
                        <!-- End phần hiện thị phân trang  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include dirname(__FILE__)."/layout/footer.php";

?>
<script>
	$(document).ready(function() {
    $("#tableSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			
        });
    });
});
</script>