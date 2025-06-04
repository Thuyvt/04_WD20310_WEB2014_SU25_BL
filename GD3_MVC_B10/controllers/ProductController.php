<?php
    class ProductController {
        
        // Khai báo thuộc
        public $productQuery;
        public $categoryQuery;
        
        public function __construct() {
            $this->productQuery = new ProductQuery();
            $this->categoryQuery = new CategoryQuery();
        }
        public function __destruct(){}

        // Hàm list() xử lý trường hợp người dùng muốn vào trang danh sách
        public function list() {
            // Gọi hàm trong ProductQuery để lấy ra danh sách trong CSDL
            $danhSachProduct = $this->productQuery->all();
            
            // Hiển thị view tương ứng
            include "views/product/list.php";
        }

        // Hàm create() {}
        public function create() {
            // 1. Tạo biến cần thiết
            $product = new Product();
            $thongBaoLoi = "";
            $thongBaoThanhCong = "";
            $danhSachCategory = $this->categoryQuery->all();

            // var_dump($danhSachCategory);
            // Kiểm tra người dùng submit form chưa
            if (isset($_POST["submitForm"])) {
                // 2. Gán giá trị cho object $product
                $product->name = trim($_POST["name"]);
                $product->price = trim($_POST["price"]);
                $product->category_id = trim($_POST["category_id"]);
                $product->quantity = trim($_POST["quantity"]);
                $product->image_src = trim($_POST["image_src"]);
                $product->created_date = trim($_POST["created_date"]);

                // 3. Validate form
                if ($product->name == "" || $product->price == ""
                 || $product->quantity == "") {
                    $thongBaoLoi = "Tên, giá, số lượng là thông tin bắt buộc nhập";
                }
                // Validate khác nếu đề bài yêu cầu
                // 4. Xử lý upload ảnh
                // Nội dung nâng cao, TODO sau ....

                // 5. Gọi lớp model để insert giá trị vào csdl
                if ($thongBaoLoi === "") {
                    $data = $this->productQuery->insert($product);
                    if ($data == 1) {
                        // reset giá trị biến $product
                        $product = new Product();

                        // thông báo tạo mới thành công
                        $thongBaoThanhCong = "Tạo mới thành công";
                    } else {
                        $thongBaoLoi = "Tạo mới thất bại. Mời nhập lại";
                    }
                }
            }
            // Hiển thị view tương ứng
            include "views/product/create.php";
        }

        public function detail($id) {
            if ($id !== "") {
                // Lấy thông tin object từ model
                $product = $this->productQuery->find($id);
                $danhSachCategory = $this->categoryQuery->all();
                
                // Hiển thị view tương ứng
                include "views/product/detail.php";
            } else {
                echo "Lỗi: Không nhận được thông tin <hr>";
            }
        }
        public function update($id) {
            if ($id !== "") {
                 // 1. Tạo biến cần thiết
                // Lấy thông tin object trong CSDL
                $product = $this->productQuery->find($id);
                var_dump($product);
                $thongBaoLoi = "";
                $thongBaoThanhCong = "";
                $danhSachCategory = $this->categoryQuery->all();

                // var_dump($danhSachCategory);
                // Kiểm tra người dùng submit form chưa
                if (isset($_POST["submitForm"])) {
                    // 2. Gán giá trị cho object $product
                    $product->name = trim($_POST["name"]);
                    $product->price = trim($_POST["price"]);
                    $product->category_id = trim($_POST["category_id"]);
                    $product->quantity = trim($_POST["quantity"]);
                    $product->image_src = trim($_POST["image_src"]);
                    $product->created_date = trim($_POST["created_date"]);

                    // 3. Validate form
                    if ($product->name == "" || $product->price == ""
                    || $product->quantity == "") {
                        $thongBaoLoi = "Tên, giá, số lượng là thông tin bắt buộc nhập";
                    }
                    // Validate khác nếu đề bài yêu cầu
                    // 4. Xử lý upload ảnh
                    // Nội dung nâng cao, TODO sau ....

                    // 5. Gọi lớp model để update giá trị vào csdl
                    if ($thongBaoLoi === "") {
                        $data = $this->productQuery->update($product);
                        var_dump($data);
                        if ($data == 1) {
                            // thông báo tạo mới thành công
                            $thongBaoThanhCong = "Cập nhật thành công";
                        } else if ($data == 0) {
                            $thongBaoLoi = "Mời sửa thông tin trước khi cập nhật";
                        }        
                        else {
                            $thongBaoLoi = "Cập nhật thất bại. Mời nhập lại";
                        }
                    }
                }

                // Hiển thị view tương ứng
                include "views/product/update.php";
            } else {
                echo "Lỗi: Không nhận được thông tin <hr>";
            }
        }

        public function delete($id) {
            if ($id !== "") {
                // Hiển thị view tương ứng
                // echo "Xóa id: $id <hr>";
                // Gọi hàm tương ứng trong productQuery, thực hiện xóa trong CSDL
                $result = $this->productQuery->delete($id);
                if ($result == 1) {
                    // Chuyển trang về danh sách
                    header("Location: ?act=product-list");
                } else {
                    echo "Xóa không thành công";
                }
            } else {
                echo "Lỗi: Không nhận được thông tin <hr>";
            }
        }
    }
?>