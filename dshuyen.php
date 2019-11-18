<?php  include('huyen-server.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý danh mục</title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>

    <body>
        <h2>Danh sách các huyện tỉnh <?php echo $tenTinh?></h2>
        <form method="POST">
        <button class="btn btn-primary">
            <a href="huyen-process.php">Thêm mới</a>
        </button>
        <button class="btn btn-danger" type="submit" name="submit" onclick="return checkDelete()">Xóa nhiều</button>
        <button class="btn btn-primary"><a href="dshuyen.php?view=<?php echo $tinhid; ?>">Tải lại</a></button>
        <br><br>
            <input type="text" class="input-search" placeholder="Tìm kiếm theo tên" name="search"/>
        <br>
        <div class="tb-content">
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="check-all" onclick="checkAll()"/></th>
                        <th>Mã huyện</th>
                        <th>Tên huyện</th>
                        <th>Mã tỉnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><input type="checkbox" class="check" name="check[]" value="<?php echo $row['huyenid']?>"/></td>
                            <td><?php echo $row['huyenid']; ?></td>
                            <td><?php echo $row['tenhuyen']; ?></td>
                            <td><?php echo $row['tinhid']; ?></td>
                            <td>
                                <button class="btn btn-info"><a href="huyen-process.php?edit=<?php echo $row['huyenid']; ?>" name="edit" >Sửa</a></button>
                                <button class="btn btn-danger"><a onclick="return checkDelete()" href="huyen-server.php?del=<?php echo $row['huyenid']; ?>" name="del">Xóa</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button class="btn btn-primary"><a href="17020706.php">Quay lại</a></button>
        </div>
        </form>

        <script language="JavaScript" type="text/javascript">
            function checkDelete(){
                var x = confirm('Bạn có chắc chắn muốn xóa?');
                if (x) {
                    alert("Xóa thành công!");
                }
                return x;
            }

            // Hàm chọn tất cả các bản ghi
            function checkAll() {
                var lengthCheckBox = document.getElementsByClassName("check").length;
                if (document.getElementById("check-all").checked == true) {
                    for (var i = 0; i < lengthCheckBox; i++) {
                        document.getElementsByClassName("check")[i].checked = true;
                    } 
                } else {
                    for (var i = 0; i < lengthCheckBox; i++) {
                        document.getElementsByClassName("check")[i].checked = false;
                    } 
                }
            }
        </script>
    </body>

</html>