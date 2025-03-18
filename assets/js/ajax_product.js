$(document).ready(function () {
    function loadProduct(price, brand, color) {
        // Thay thế nội dung box-result bằng loading indicator
        $(".box-result").html(`
            <div class="loading" style="text-align: center; margin: 20px 0;">
                <p>Đang tải sản phẩm, vui lòng chờ...</p>
                <div class="spinner-grow text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        `);

        $.ajax({
            url: `?filter&price=${price}&brand=${brand}&color=${color}`,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Cập nhật nội dung mới
                if (response.data) {
                    $(".box-result").html(response.data); // Cập nhật nội dung mới
                }
            },
            error: function () {
                console.log("Đã có lỗi xảy ra.");
                $(".box-result").html("<p>Đã có lỗi khi tải dữ liệu.</p>"); // Thông báo lỗi
            }
        });
    }

    let selectedPrice = 0;
    let selectedBrand = 0;
    let selectedColor = 0;

    if (window.location.pathname.startsWith('/danh-muc')) {
        loadProduct(selectedPrice, selectedBrand, selectedColor);
    }

    $('input[name="filterPrice"]').change(function () {
        selectedPrice = $(this).val();
        loadProduct(selectedPrice, selectedBrand, selectedColor);
    });

    $('input[name="filterBrand"]').change(function () {
        selectedBrand = $(this).val();
        loadProduct(selectedPrice, selectedBrand, selectedColor);
    });

    $('input[name="filterColor"]').change(function () {
        selectedColor = $(this).val();
        loadProduct(selectedPrice, selectedBrand, selectedColor);
    });
});