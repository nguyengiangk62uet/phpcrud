<?php  include('server.php'); ?>
<html>
    <thead>
        <title>Quản lý danh mục</title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </thead>
    <body>
        <form method="POST" class="form-process">
            <?php if ($edit_state == false): ?>
            <h3>Thêm mới tỉnh</h3>
            <?php else: ?>
            <h3>Sửa thông tin tỉnh</h3>
            <?php endif ?>
            <!-- <input type="hidden" name="tinhid" value="<?php echo $id; ?>"> -->
            <div class="form-group">
                <label class="text">Tên tỉnh</label>
                <input type="text" class="form-control" placeholder="Nhập tên tỉnh" name="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label class="text">Mã tỉnh</label>
                <input type="text" class="form-control" name="tinhid" placeholder="Nhập mã tỉnh" value="<?php echo $id ?>">
            </div>
            
            <br>
            <?php if ($edit_state == false): ?>
                <button type="submit" class="btn btn-primary" name="save">Thêm mới</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="update">Sửa</button>
            <?php endif ?>
    
            <button class="btn btn-primary"><a href="17020706.php">Quay lại</a></button>
            </form>
    </body>
</html>
