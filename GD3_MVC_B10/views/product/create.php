<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Trang tạo mới sản phẩm</h3>
    
    <!-- Form nhập dữ liệu -->
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Khu vực tên -->
        <div style="margin-bottom:16px;">
            <span>Nhập tên:</span>
            <input type="text" name="name">
        </div>
        <!-- Khu vực giá -->
        <div style="margin-bottom:16px;">
            <span>Nhập giá:</span>
            <input type="number" name="price">
        </div>
        <!-- Khu vực danh mục -->
        <div style="margin-bottom:16px;">
            <span>Chọn danh mục:</span>
            <select name="category_id" id="">
                <?php foreach($danhSachCategory as $cat) {?>
                    <option value="<?= $cat->id ?>"> <?= $cat->name ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- Khu vực ảnh -->
        <div style="margin-bottom:16px;">
            <div>
                 <span>Đường dẫn ảnh:</span>
                 <input type="text" name="image_src">
            </div>
            <div>
                <span>Chọn ảnh:</span>
                <input type="file" name="file_upload">
            </div>
        </div>
          <!-- Khu vực só lượng -->
        <div style="margin-bottom:16px;">
            <span>Nhập số lượng:</span>
            <input type="number" name="quantity">
        </div>
          <!-- Khu vực ngày tạo -->
        <div style="margin-bottom:16px;">
            <span>Nhập ngày tạo:</span>
            <input type="date" name="created_date">
        </div>

        <!-- Khu vực button -->
        <div style="margin-bottom:16px;">
            <a href="?act=product-list"> Quay lại</a>
            <button type="submit" name="submitForm">Tạo mới</button>
        </div>
        <!-- Khu vực thông báo lỗi -->
        <div style="margin-bottom:16px;color:red;">
            <?= $thongBaoLoi ?>
        </div>
        <!-- Khu vực thông báo thành công -->
        <div style="margin-bottom:16px;color:green;">
            <?= $thongBaoThanhCong ?>
        </div>
        
    </form>
</body>
</html>