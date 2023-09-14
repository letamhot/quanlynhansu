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
                        <h3><i class="mdi mdi-newspaper menu-icon"></i>Danh sách chức vụ</h3>
                    </div>
                    <div class="header__buttom_edit">
                        <input class='form-control' type='text' placeholder='Search' aria-label='Search' id='tableSearch' style='width: 25%; float: right; margin: 15px;'>

                        <a href="createChucVu.php" class="btn btn-primary">
                            <i class="mdi mdi-plus-circle-outline menu-icon"></i>Thêm mới</a>
                        <a href="indexChucVu.php" rel="noopener noreferrer" class="btn btn-danger">
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
                                    <th>Tên chức vụ</th>
                                    <?php
                                    if ($role == 1) {
                                        echo '<th colspan="2" class="text-center">Thao tác</th>';
                                    } else {
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <?php
                            include('../connection/connection.php');
                            // thực thi câu lệnh truy vấn và gắn nó vào result 
                            // tim tong so records
                            $result = mysqli_query($conn, 'select count(id) as total from chucvu');
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];
                            // Tim limit va current page
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $limit = 5; // 5 ban ghi tren moi trang

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
                            $sql = "SELECT * FROM chucvu LIMIT $start, $limit";
                            $result = mysqli_query($conn, $sql);
                            $resultSQL = mysqli_num_rows($result);
                            if ($result != null) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tbody id='myTable'>";
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["tenChucVu"] . "</td>";
                                    if ($role == 1) {
                                        echo "<td class='text-center'><a href=\"editChucVu.php?id=" . $row['id'] . "\"><i class='mdi mdi-rename-box menu-icon'></i></a></td>";
                                        echo "<td class='text-center'><a href=\"deleteChucVu.php?id=" . $row['id'] . "\"> <i class='mdi mdi-delete menu-icon'></i></a></td>";
                                    } else {
                                    }

                                    echo "</tr>";
                                    echo "</tbody>";
                                }
                            } else {
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td colspan='4' class='__waiting'>Không có dữ liệu nào </td>";
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