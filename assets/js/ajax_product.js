$(document).ready(function () {

    // Lấy danh sách
    function loadProduct() {
        $.ajax({
            url: 'danh-muc?filter', // Thay đổi URL nếu cần thiết
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                $(".box-result").html(response.data);
            },
            error: function () {
                console.log("Đã có lỗi xảy ra.");
            }
        });
    }

    // Chạy hàm lấy tất cả sản phẩm
    loadProduct();
    
});