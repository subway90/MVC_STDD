$(document).ready(function() {
    // Load danh sách danh mục
    function getListCategory(state_page) {
        $.ajax({
            url: '/admin/danh-sach-danh-muc',
            type: 'POST',
            data: { 
                load: true,
                state_page: state_page
             },
            success: function(response) {
                $('#dataCategory').html(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    }

    // Lấy trạng thái từ URL
    let state_page = true;
    const urlSegments = window.location.pathname.split('/');
    if(urlSegments[3] === 'danh-sach-xoa') state_page = false;
    
    getListCategory(state_page);

    // Khi nút mở modal được nhấn
    $(document).on('click', '[data-bs-toggle="modal"]', function() {
        // Lấy giá trị từ attribute data-value-id
        const categoryId = $(this).data('value-id');
        // Gán giá trị vào input hidden trong modal
        $('#modalAddV2').find('input[name="id_v1"]').val(categoryId);
    });

    // Kiểm tra input và bật/tắt nút "Thêm"
    $('#modalAddV2').on('input', '#name_category_v2', function() {
        const nameCategory = $(this).val();
        if (nameCategory) $('#addCateV2').removeClass('disabled').prop('disabled', false);
        else $('#addCateV2').addClass('disabled').prop('disabled', true);
    });

    // Khi gửi form
    $('#categoryV2Form').on('submit', function(event) {
        event.preventDefault(); // Ngăn chặn gửi form mặc định

        const idV1 = $('#modalAddV2').find('input[name="id_v1"]').val(); 
        const nameV2 = $('#name_category_v2').val(); 

        $.ajax({
            url: '/admin/danh-muc-v2',
            type: 'POST',
            data: {
                add: true,
                id_category_v1: idV1,
                name_category_v2: nameV2
            },
            success: function(response) {
                // Giả sử response trả về một object với các trường message và data
                $('#messageToast').html(response.message); // Gán thông điệp
                $('#dataCategory').html(response.data); // Gán dữ liệu
                
                // Làm trống input
                $('#name_category_v2').val('');
                $('#addCateV2').addClass('disabled').prop('disabled', true);
                
                // Đóng modal sau khi thêm thành công
                $('#modalAddV2').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    // Khi nhấn nút xóa danh mục v2
    $(document).on('click', '.deleteV2', function() {
        const idV1 = $(this).data('value-id-v1');
        const idV2 = $(this).data('value-id-v2');

        // Gửi yêu cầu AJAX để xóa
        $.ajax({
            url: '/admin/danh-muc-v2',
            type: 'POST',
            data: {
                delete: true,
                id_v1: idV1,
                id_v2: idV2,
            },
            success: function(response) {
                $('#messageToast').html(response.message); // Hiển thị thông điệp
                $('#dataCategory').html(response.data); // Cập nhật dữ liệu

                // Bạn có thể thêm logic để xóa phần tử trong DOM nếu cần
                // $(this).closest('tr').remove(); // Ví dụ xóa hàng trong bảng
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });
});