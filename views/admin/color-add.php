<form action="" method="post">
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <h1 class="h3 m-0">Thêm màu</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <a href="<?= URL_ADMIN?>danh-sach-mau" class="btn btn-secondary me-3">Huỷ</a>
                            <button name="add" type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                        
                        <div class="col-12">
                            <?= show_error($list_error) ?>
                        </div>

                    </div>
                </div>
                <div class="sa-entity-layout"
                    data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5 row">

                                    <div class="col-12 col-lg-6 mb-4">
                                        <label for="name_color" class="form-label">Tên màu <span class="text-danger">(✱)</span></label>
                                        <input type="text" class="form-control" name="name_color" id="name_color" value="<?= $name_color ?>" placeholder="Tên màu" />
                                    </div>

                                    <div class="col-12 col-lg-6 mb-4">
                                        <label for="code_color" class="form-label">Mã màu <span class="text-danger">(✱)</span></label>
                                        <div class="d-flex align-items-center gap-3">
                                            <input type="color" class="form-control" name="code_color" id="code_color" value="<?= $code_color ?>" placeholder="Mã màu" />
                                            <span class="text-muted text-uppercase small" id="code_color_show">#000000</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        // Khởi tạo giá trị span theo mã màu mặc định
        $('#code_color_show').text($('#code_color').val());

        // Cập nhật span khi input màu thay đổi
        $('#code_color').on('input', function() {
            var colorValue = $(this).val();
            $('#code_color_show').text(colorValue); // Cập nhật mã hex trong span
        });
    });
</script>