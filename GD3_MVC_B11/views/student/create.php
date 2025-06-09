<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tạo mới sinh viên</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="margin-bottom: 16px;">
            <span>Nhập tên: </span>
            <input type="text" name="name">
        </div>
         <div style="margin-bottom: 16px;">
            <span>Chọn chuyên ngành: </span>
            <!-- <input type="text" name="name"> -->
            <select name="major_id" id="">
                <?php foreach($danhSachMajor as $major) :?>
                <option value="<?= $major->id ?>"> <?= $major->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
         <div style="margin-bottom: 16px;">
            <span>Mã sinh viên: </span>
            <input type="text" name="account">
        </div>
         <div style="margin-bottom: 16px;">
            <span>Nhập ngày sinh: </span>
            <input type="date" name="date_of_birth">
        </div>
         <div style="margin-bottom: 16px;">
            <span>Chọn ảnh: </span>
            <input type="text" name="avatar">
            <input type="file" name="file_upload">
        </div>
        <button type="submit" name="submitForm">Tạo mới</button>
    </form>
</body>
</html>