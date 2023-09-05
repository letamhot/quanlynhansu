<?php
include dirname(__FILE__)."/layout/header.php";
include dirname(__FILE__)."/layout/nav.php";
include dirname(__FILE__)."/layout/sidebar.php";

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container">
        <div class="profile_edit">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="header_content">
                        <div class="header__content_title">
                            <h3><i class="mdi mdi-newspaper menu-icon"></i>Danh sách Hợp đồng lao động</h3>
                        </div>
                        <div class="header__buttom_edit">
                            <a href="createHDLD.php" class="btn btn-primary">
                                <i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm mới</a>
                            <a href="indexHDLD.php" rel="noopener noreferrer" class="btn btn-danger">
                                <i class="mdi mdi-close menu-icon"></i>Thoát
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-light">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên nhân viên</th>
                                        <th>Tên Hợp đồng lao động</th>
                                        <th>Loại Hợp đồng lao động</th>
                                        <th>Ngày Hợp đồng lao động</th>
                                        <th>Đại diện công ty</th>
                                        <th>Đại diện người lao động</th>
                                        <th>Nội dung</th>
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
                                    $result = mysqli_query($conn, 'select count(id) as total from hopdonglaodong');
                                    $row = mysqli_fetch_assoc($result);
                                    $total_records = $row['total'];
                                    // Tim limit va current page
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $limit = 3; // 3 ban ghi tren moi trang

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
                                    $sql = "SELECT * FROM hopdonglaodong LIMIT $start, $limit";
                                    $result = mysqli_query($conn, $sql);
                                    if($result != null) 
                                    {
                                        $sql1 = "SELECT * FROM nhanvien";
                                        $result1 = mysqli_query($conn, $sql1);
                                        $value1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                                        $resultSQL= mysqli_num_rows($result);

                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tbody>";
                                                echo "<tr>";
                                                    echo "<td>". $row["id"]."</td>";
                                                    echo "<td>".($row["idNhanVien"] == $value1["id"] ? $value1["tenNV"]:""). "</td>";
                                                    echo "<td>".$row["tenHDLD"]. "</td>";
                                                    echo "<td>".$row["loaiHDLD"]. "</td>";
                                                    echo "<td>".date("d-m-Y", strtotime($row["ngayHDLD"])). "</td>";
                                                    echo "<td>".$row["daiDienCongTy_ky"]. "</td>";
                                                    echo "<td>".$row["daiDienNLD_ky"]. "</td>";
                                                    echo "<td>".$row["noiDung"]. "</td>";
                                                    if($role == 1)
                                                    {
                                                        echo "<td class='text-center'><a href=\"editHDLD.php?id=".$row['id']."\"><i class='mdi mdi-rename-box menu-icon'></i></a></td>";
                                                        echo "<td class='text-center'><a href=\"deleteHDLD.php?id=".$row['id']."\"> <i class='mdi mdi-delete menu-icon'></i></a></td>";
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
                                                echo "<td colspan='10' class='__waiting'>Không có dữ liệu nào </td>";
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