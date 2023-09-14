<?php
include dirname(__FILE__) . "/layout/header.php";
include dirname(__FILE__) . "/layout/nav.php";
include dirname(__FILE__) . "/layout/sidebar.php";

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container">
    <div class="profile_edit">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="header_content">
                    <div class="header__content_title">
                        <h3><i class="mdi mdi-newspaper menu-icon"></i>Danh sách Nhân Viên</h3>
                    </div>
                    <div class="header__buttom_edit">
                        <input class='form-control' type='text' placeholder='Search' aria-label='Search' id='tableSearch' style='width: 25%; float: right; margin: 15px;'>

                        <a href="createNhanVien.php" class="btn btn-primary">
                            <i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm mới</a>
                        <a href="indexNhanVien.php" rel="noopener noreferrer" class="btn btn-danger">
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
                                    <th>Mã nhân viên</th>
                                    <th>Tên nhân viên</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>CMND/CCCD</th>
                                    <th>Ngày cấp</th>
                                    <th>Nơi cấp</th>
                                    <th>Giới tính</th>
                                    <th>Avatar</th>
                                    <th>Trình độ học vấn</th>
                                    <th>Tình trạng hôn nhân</th>
                                    <th>Ngày vào làm</th>
                                    <th>Số quyết định</th>
                                    <th>Trạng thái làm việc</th>
                                    <th>Hệ số lương</th>
                                    <th>Công đoàn</th>
                                    <!-- <th>Đơn vị</th>
                                        <th>Chức vụ</th> -->
                                    <?php
                                    if ($role == 1) {
                                        echo '<th colspan="4" class="text-center">Thao tác</th>';
                                    } else {
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <?php
                            include('../connection/connection.php');
                            // thực thi câu lệnh truy vấn và gắn nó vào result 
                            // tim tong so records
                            $result = mysqli_query($conn, 'select count(id) as total from nhanvien');
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];
                            // Tim limit va current page
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $limit = 10; // 10 ban ghi tren moi trang

                            // tinh toan total va strat
                            // tong so trang

                            $total_page = ceil($total_records / $limit);
                            // gioi han current page trong khoang 1 trang ddens total page
                            if ($current_page > $total_page) {
                                $current_page = $total_page;
                            } else if ($current_page < 1) {
                                $current_page = 1;
                            }
                            // timf start 
                            $start = ($current_page - 1) * $limit;
                            // truy van lay tin tuc danh sach
                            // cos limit va start roi thi thuy van csdl lay danh sach san pham
                            $sql = "SELECT * FROM nhanvien ORDER BY maNV  LIMIT $start, $limit";
                            $result = mysqli_query($conn, $sql);
                            if ($result != null) {



                                $resultSQL = mysqli_num_rows($result);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sql1 = "SELECT * FROM trinhdohocvan where id ='" . $row['trinhDoHocVan'] . "'";
                                    // Thực thi câu truy vấn và gán vào $result
                                    $result1 = mysqli_query($conn, $sql1);
                                    $value1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);


                                    // $sql2 = "SELECT * FROM donvi";
                                    // // Thực thi câu truy vấn và gán vào $result
                                    // $result2 = mysqli_query($conn, $sql2);
                                    // $value2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

                                    // $sql3 = "SELECT * FROM chucvu";
                                    // // Thực thi câu truy vấn và gán vào $result
                                    // $result3 = mysqli_query($conn, $sql3);
                                    // $value3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);

                                    $sql4 = "SELECT * FROM luong where id ='" . $row['luong'] . "'";
                                    // Thực thi câu truy vấn và gán vào $result
                                    $result4 = mysqli_query($conn, $sql4);
                                    $value4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
                                    if ($row["tenNV"] != "Administrator") {
                                        echo "<tbody id='myTable'>";
                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["maNV"] . "</td>";
                                        echo "<td>" . $row["tenNV"] . "</td>";
                                        echo "<td>" . date("d-m-Y", strtotime($row["ngaySinh"])) . "</td>";
                                        echo "<td>" . $row["diaChi"] . "</td>";
                                        echo "<td>" . $row["soDienThoai"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["CMND"] . "</td>";
                                        echo "<td>" . date("d-m-Y", strtotime($row["ngayCap"])) . "</td>";
                                        echo "<td>" . $row["noiCap"] . "</td>";
                                        echo "<td>" . ($row["gioiTinh"] == 0 ? "Nam" : "Nữ") . "</td>";
                                        if($row["avatar"] != ""){
                                            echo "<td><img src='../admin/images/imageNV/" . $row["avatar"] . "' width='60px' height='60px'/></td>";

                                        }
                                        else{
                                            echo "<td><img src='../admin/images/imageNV/logo.jpg' width='60px' height='60px'/></td>";

                                        }
                                        echo "<td>" . $value1["tenTrinhDoHocVan"] . "</td>";
                                        echo "<td>" . ($row["tinhTrangHonNhan"] == 1 ? "Độc thân" : "Đã kết hôn") . "</td>";
                                        echo "<td>" . date("d-m-Y", strtotime($row["ngayVaoLam"])) . "</td>";
                                        echo "<td>" . $row["soQuyetDinh"] . "</td>";
                                        echo "<td>" . ($row["trangThai"] == 1 ? "Đang làm việc" : "Nghỉ làm việc") . "</td>";
                                        echo "<td>" . $value4["heSoLuong"] . "</td>";
                                        echo "<td>" . $row["congDoan"] . "</td>";

                                        if ($role == 1 && $row["donvi"] == $donvi) {
                                            echo "<td class='text-center'><a href=\"linktaikhoan.php?id=" . $row['id'] . "\"><i class='mdi mdi-link menu-icon' title='Liên kết tài khoản'></i></a></td>";
                                            echo "<td class='text-center'><a href=\"editNhanVien.php?id=" . $row['id'] . "\"><i class='mdi mdi-rename-box menu-icon' title='Sửa nhân viên'></i></a></td>";
                                            echo "<td class='text-center'><a href=\"deleteNhanVien.php?id=" . $row['id'] . "\"> <i class='mdi mdi-delete menu-icon' title='Xóa nhân viên'></i></a></td>";
                                        } else {
                                        }

                                        echo "</tr>";
                                        echo "</tbody>";
                                    }
                                }
                            } else {
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td colspan='19' class='__waiting'>Không có dữ liệu nào </td>";
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
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<a class="page-link" href="?page=' . ($current_page - 1) . '"><i class="mdi mdi-chevron-double-left menu-icon"></i></a> ';
                        }
                        // lap khoang giua
                        for ($i = 1; $i <= $total_page; $i++) {
                            // neu la trang hiện tại thì hiển thị thẻ span
                            // nguoc lại hiển thị thẻ a 

                            if ($i == $current_page) {
                                echo '<span class="page-link text-danger">' . $i . '</span>';
                            } else {
                                echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a> ';
                            }
                        }
                        // nếu current_page < total_page >1 mới hiển thị nút prev 
                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<a class="page-link" href="?page=' . ($current_page + 1) . '"><i class="mdi mdi-chevron-double-right menu-icon"></i></a> ';
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
include dirname(__FILE__) . "/layout/footer.php";

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