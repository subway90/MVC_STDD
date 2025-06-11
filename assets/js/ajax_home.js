$(document).ready(function() {
    // Lấy sự kiện flashsale
    function Flashsale() {
        $.ajax({
            url: '/trang-chu/flashsale',
            type: 'POST',
            data: { flashsale: true },
            success: function(response) {
                $('#dataFlashSale').html(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    }

    Flashsale();
});