<?php
    session_start();
    // Tạo các đối tượng khởi đầu sẽ được truyền giá trị khi nhập 
    $name = "";
    $id = "";
    $tenTinh = "";
    $tinhid = "";
    $edit_state = false;
    // Tạo các đối tượng kết nối database
    $servername = "localhost";
    $username = "admin";
    $password = "123456";
    $dbname = "danhmuc";
    header("Content-type: text/html; charset=utf-8");
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, 'UTF8');
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Lấy dữ liệu từ database ra
    if (isset($_GET['view'])) {
        $id = $_GET['view'];
        $tinhid = $id;
        $sql = "SELECT * FROM dshuyen WHERE tinhid=$id";
        $sqlTenTinh = "SELECT tentinh FROM dstinh WHERE tinhid=$id";
        $kqTenTinh = mysqli_query($conn, $sqlTenTinh);
        $tenTinh = mysqli_fetch_array($kqTenTinh)['tentinh'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
        } else {
            echo "0 results";
        }
    }

    // Sự kiện nút lưu được click
    if (isset($_POST['save'])) {
        // error_reporting(0);
        // Thêm mới dữ liệu vào database
        $name = $_POST['name'];
        // $matheloai = $_POST['matheloai'];
        $tinhid = $_POST['tinhid'];
        // $id = $_GET['view'];
        if ($name != "") {
            $query = "INSERT INTO dshuyen (tenhuyen, tinhid) VALUES ('$name', '$tinhid')";
        }
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Thêm thành công!');</script>";
        } else {
            echo "<script>alert('Vui lòng điền đủ các thông tin.');</script>";
        }
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $edit_state = true;
        $record = mysqli_query($conn, "SELECT * FROM dshuyen WHERE huyenid=$id");
        
        $obj = mysqli_fetch_array($record);
        $tinhid = $obj['tinhid'];
        $name = $obj['tenhuyen'];
    }
    // Cập nhật dữ liệu
    if (isset($_POST['update'])) {
        // error_reporting(0);
        // Thêm mới dữ liệu vào database
        $newid = mysqli_real_escape_string($conn, $_POST['tinhid']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);

        if ($name != "" && $newid != "") {
            $query = "UPDATE dshuyen SET tenhuyen='$name', tinhid=$newid WHERE huyenid=$id";
        }
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Sửa thành công!');</script>";
         } else {
            echo "<script>alert('Vui lòng điền đủ các thông tin.');</script>";
        }
    }

    // Xóa bản ghi
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        if (mysqli_query($conn, "DELETE FROM dshuyen WHERE huyenid=$id")) {

        } else {
            echo "<script>alert('Vui lòng điền đủ các thông tin.');</script>";
        }
    }

    
    //Xóa nhiều bản ghi
    if (isset($_REQUEST['submit'])) {
        $check = $_REQUEST['check'];
        $arr = implode(",", $check);
        mysqli_query($conn, "DELETE FROM dshuyen WHERE huyenid in ($arr)");
        // header('location: 17020706.php');

    }

    //Tìm kiếm theo tên
    if (isset($_REQUEST['search'])) {
        $searchValue = $_POST['search'];
        $sql = "SELECT * FROM dshuyen WHERE tinhid=$id
                AND tenhuyen LIKE '%$searchValue%'";
                
        $result = mysqli_query($conn, $sql);
    }

    mysqli_close($conn);

?>