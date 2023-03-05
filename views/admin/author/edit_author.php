<?php
    include_once './views/includes/boostrap.php';
    include APP_ROOT . '/views/includes/headerAdmin.php';
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                    <input type="text" class="form-control" name="txtMaTGia" value="">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" class="form-control" name="txtTenTgia" value="">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Hình tác giả</span>
                    <input type="file" class="form-control" name="txtHinhTgia" value="">
                </div>

                <button type="submit" name="save" class="btn btn-success">Lưu lại</button>
                <a href="category.php" class="btn btn-warning ">Quay lại</a>

            </form>
        </div>
    </div>
</main>

<?php
    include APP_ROOT . '/views/includes/footer.php';
?>