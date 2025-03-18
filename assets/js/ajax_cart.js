$(document).ready(function() {
    // Sử dụng event delegation cho nút thêm vào giỏ hàng
    $(document).on('click', '#addCartBtn', function() {
        // Tìm phần tử cha chứa idProduct
        var productId = $(this).closest('form').find('.idProduct').val();

        $.ajax({
            type: 'POST',
            url: '/gio-hang/add',
            data: {
                id_product: productId
            },
            success: function(response) {
                $("#messageCart").html(response.message);
                loadCountCart();
            },
            error: function(xhr, status, error) {
                console.log('Có lỗi xảy ra: ' + error);
            }
        });
    });

    // Lấy số lượng sản phẩm
    function loadCountCart() {
        $.ajax({
            url: '/gio-hang/get_count',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#countCart").html(response.count);
            },
        });
    }

    // Lấy danh sách
    function loadListCart() {
        $.ajax({
            url: '/gio-hang/get_list',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#listCart").html(response.data);
                $("#totalCart").html(response.total);
            },
        });
    }

    // Gọi hàm loadCart khi trang được tải
    loadCountCart();
    // Gọi hàm loadListCart khi truy cập giỏ hàng
    if (window.location.pathname === '/gio-hang') {
        loadListCart();
    }
});