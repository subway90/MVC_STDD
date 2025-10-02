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

    // Sử dụng event delegation cho nút thêm dùng voucher
    $(document).on('click', '#useVoucher', function() {
        // Tìm phần tử cha chứa idProduct
        var codeVoucher = $(this).closest('form').find('.codeVoucher').val();

        $.ajax({
            type: 'POST',
            url: '/use-voucher',
            data: {
                use_in_list: null,
                code_voucher: codeVoucher
            },
            success: function(response) {
                // Gọi hàm showToast với thông điệp từ phản hồi
                showToast(response.message);
                loadCountCart();
                loadListCart();
            },
            error: function(xhr, status, error) {
                console.log('Lỗi sử dụng voucher : ' + error);
                showToast('Có lỗi xảy ra khi sử dụng voucher.'); // Hiển thị thông báo lỗi
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
                loadCountCart();
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
                loadCountCart();
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
                $("#totalCart").html(response.total_cart);
                $("#applyVoucher").html(response.apply_voucher);
                $("#totalCheckout").html(response.total_checkout);
                $("#btnCheckout").html(response.btnCheckout);
                $("#listVoucher").html(response.listVoucher);
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

function showToast(message) {
        const toastContainer = document.querySelector("#messageCart");

        // Tạo phần tử toast mới
        const newToast = document.createElement("div");
        newToast.classList.add("toast", "show", "animate__animated", "animate__fadeInRight");
        newToast.setAttribute("role", "alert");
        newToast.setAttribute("aria-live", "assertive");
        newToast.setAttribute("aria-atomic", "true");

        newToast.innerHTML = `
            <div class="toast-header justify-content-center gap-1 small">
                <i class="bi bi-bell-fill"></i>
                <strong class="me-auto">Hệ thống</strong>
                <button type="button" class="btn-close" aria-label="Close" onclick="closeToast(this)"></button>
            </div>
            <div class="toast-body">
                <span>${message}</span>
            </div>
            <div class="bg-danger line-bar"></div>
        `;

        // Thêm toast vào container
        toastContainer.appendChild(newToast);

        // Hiển thị toast và thiết lập thời gian tự động đóng
        setTimeout(() => {
            newToast.classList.add("animate__fadeOutRight");

            // Xóa toast sau khi hiệu ứng biến mất
            newToast.addEventListener("animationend", () => {
                newToast.remove();
            });
        }, 2000); // Thay đổi thời gian ở đây nếu cần
    }

    function closeToast(button) {
        const toast = button.closest('.toast');
        toast.classList.add("animate__fadeOutRight");

        // Xóa toast sau khi hiệu ứng biến mất
        toast.addEventListener("animationend", () => {
            toast.remove();
        });
    }