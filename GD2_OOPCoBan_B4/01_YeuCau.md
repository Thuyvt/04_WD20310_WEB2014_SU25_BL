# Thông tin đăng nhập
username: root
password: để trống

# 1. Tạo database
- Tạo database: 04_WD20310_WEB2014_SU25_BL1
- Tạo table: product
- Tạo các column trong table: id, name, price, quantity

# 2. Tạo class thể hiện đối tượng
- Tên class: Product
- Thuộc tính: id, name, price, quantity
- Phương thức: displayProductInfo()

# 3. Tạo class giúp Product tương tác với database
- Tên class: ProductQuery
- Thuộc tính: pdo 
- Phương thức: mặc định, find($id), all()

# 4. Tạo object sử dựng class ProductQuery để kiểm tra các phương thức tương tác với db có đúng không