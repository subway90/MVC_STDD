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

    // Tăng số lượng
    $(document).on('click', '#plusCartBtn', function() {
        // Tìm phần tử cha chứa idProduct
        var productId = $(this).closest('form').find('.idProduct').val();

        $.ajax({
            type: 'POST',
            url: '/gio-hang/plus',
            data: {
                id_product: productId
            },
            success: function(response) {
                $("#messageCart").html(response.message);
                loadListCart();
            },
            error: function(xhr, status, error) {
                console.log('Có lỗi xảy ra : ' + error);
            }
        });
    });

    // Giảm số lượng
    $(document).on('click', '#minusCartBtn', function() {
        // Tìm phần tử cha chứa idProduct
        var productId = $(this).closest('form').find('.idProduct').val();

        $.ajax({
            type: 'POST',
            url: '/gio-hang/minus',
            data: {
                id_product: productId
            },
            success: function(response) {
                $("#messageCart").html(response.message);
                loadListCart();
            },
            error: function(xhr, status, error) {
                console.log('Có lỗi xảy ra: ' + error);
            }
        });
    });

    // Xoá sản phẩm
    $(document).on('click', '#deleteCartBtn', function() {
        // Tìm phần tử cha chứa idProduct
        var productId = $(this).closest('form').find('.idProduct').val();

        $.ajax({
            type: 'POST',
            url: '/gio-hang/delete',
            data: {
                id_product: productId
            },
            success: function(response) {
                $("#messageCart").html(response.message);
                loadListCart();
            },
            error: function(xhr, status, error) {
                console.log('Có lỗi xảy ra : ' + error);
            }
        });
    });

    // Xoá tất cả
    $(document).on('click', '#deleteAllCartBtn', function() {
        $.ajax({
            type: 'POST',
            url: '/gio-hang/delete',
            data: {
                deleteAll: true
            },
            success: function(response) {
                $("#messageCart").html(response.message);
                loadListCart();
            },
            error: function(xhr, status, error) {
                console.log('Có lỗi xảy ra : ' + error);
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
            error: function(xhr, status, error) {
                console.log('Có lỗi xảy ra: ' + error);
            }
        });
    }

    // Gọi hàm loadCart khi trang được tải
    loadCountCart();
    // Gọi hàm loadListCart khi truy cập giỏ hàng
    if (window.location.pathname === '/gio-hang') {
        loadListCart();
    }
});