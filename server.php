<?php
    session_start();
    // Tạo các đối tượng khởi đầu sẽ được truyền giá trị khi nhập 
    $name = "";
    $id = "";
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
    $sql = "SELECT dstinh.*, (CASE WHEN tenhuyen IS null THEN 0 ELSE COUNT(tenhuyen) END) AS sohuyen FROM dstinh
            LEFT JOIN dshuyen ON dstinh.tinhid = dshuyen.tinhid
            GROUP BY tinhid
            ORDER BY sohuyen DESC";
             
    $layma = "SELECT matheloai FROM loaisach";
    $arrCode = mysqli_query($conn, $layma);
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
    } else {
        echo "0 results";
    }

    // Sự kiện nút lưu được click
    if (isset($_POST['save'])) {
        error_reporting(0);
        // Thêm mới dữ liệu vào database
        $name = $_POST['name'];
        // $matheloai = $_POST['matheloai'];
        $tinhid = $_POST['tinhid'];

        if ($name != "" && $tinhid != "") {
            $query = "INSERT INTO dstinh (tinhid, tentinh) VALUES ('$tinhid', '$name')";
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
        $record = mysqli_query($conn, "SELECT * FROM dstinh WHERE tinhid=$id");
        
        $obj = mysqli_fetch_array($record);
        $id = $obj['tinhid'];
        $name = $obj['tentinh'];
    }
    // Cập nhật dữ liệu
    if (isset($_POST['update'])) {
        // error_reporting(0);
        // Thêm mới dữ liệu vào database
        $newid = mysqli_real_escape_string($conn, $_POST['tinhid']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);

        if ($name != "" && $newid != "") {
            $query = "UPDATE dstinh SET tentinh='$name', tinhid=$newid WHERE tinhid=$id";
            $queryHuyen = "UPDATE dshuyen SET tinhid=$newid WHERE tinhid=$id";
            $id = $newid;
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
        if (mysqli_query($conn, "DELETE FROM dstinh WHERE tinhid=$id")) {
            header('location: 17020706.php');

        } else {
            echo "<script>alert('Vui lòng điền đủ các thông tin.');</script>";
        }
    }

    
    //Xóa nhiều bản ghi
    if (isset($_REQUEST['submit'])) {
        $check = $_REQUEST['check'];
        $arr = implode(",", $check);
        mysqli_query($conn, "DELETE FROM dstinh WHERE tinhid in ($arr)");
        header('location: 17020706.php');

    }

    //Tìm kiếm theo tên
    if (isset($_REQUEST['search'])) {
        $searchValue = $_POST['search'];
        $sql = "SELECT dstinh.*, (CASE WHEN tenhuyen IS null THEN 0 ELSE COUNT(tenhuyen) END) AS sohuyen FROM dstinh
                LEFT JOIN dshuyen ON dstinh.tinhid = dshuyen.tinhid
                GROUP BY tinhid
                HAVING tentinh LIKE '%$searchValue%'
                ORDER BY sohuyen DESC";
                
        $result = mysqli_query($conn, $sql);
    }

    mysqli_close($conn);

?>