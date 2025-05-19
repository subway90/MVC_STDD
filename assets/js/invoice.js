$(document).ready(function() {
    // Hàm gửi AJAX
    function fetchInvoices(state) {
        $.ajax({
            url: '/lich-su-mua-hang',
            type: 'POST',
            data: {
                'get-list-invoice': true,
                'state': state
            },
            success: function(response) {
                $('#result-list-invoice').html(response.list_invoice_history);
            },
            error: function() {
                console.log('Có lỗi xảy ra, vui lòng thử lại.');
            }
        });
    }

    // Gọi hàm khi trang được tải
    fetchInvoices('tat-ca');

    // Xử lý sự kiện khi nhấn vào nút
    $('.btn-status-invoice').on('click', function() {
        // Lấy ID của nút đã nhấn
        var state = $(this).attr('id');
        // Gửi yêu cầu AJAX
        fetchInvoices(state);
        
        // Cập nhật trạng thái nút
        $('.btn-status-invoice').removeClass('active');
        $(this).addClass('active');
    });
});