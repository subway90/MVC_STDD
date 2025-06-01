$(document).ready(function() {
    $(document).on('click', '#addImageCategory', function() {
        var fileInput = $('<input type="file" accept=".jpg,.jpeg,.png,.webp" style="display: none;">');
        $('body').append(fileInput);
        fileInput.click();

        fileInput.on('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var formData = new FormData();
                formData.append('add', true);
                formData.append('file', file);

                $.ajax({
                    url: '/admin/image-category',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#messageToast').html(response.message);
                        $('#dataImage').html(response.data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi:', error);
                    }
                });
            }
        });

        fileInput.on('remove', function() {
            $(this).remove();
        });
    });


    // Lấy hình ảnh sản phẩm
    function getImage() {
        $.ajax({
            url: '/admin/image-category',
            type: 'POST',
            data: { load: true },
            success: function(response) {
                $('#dataImage').html(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    }

    getImage();

    // Gửi yêu cầu AJAX khi form được gửi
    $('#categoryV2Form').submit(function(event) {
        event.preventDefault(); // Ngăn chặn gửi form mặc định

        const name_category = $('#name_category_v2').val();
        const logo_category = $('#logo_category_v2').val();

        $.ajax({
            url: '/admin/them-danh-muc-v2',
            type: 'POST',
            data: {
                add: true,
                name_category: name_category,
                logo_category: logo_category
            },
            success: function(response) {
                // Gán dữ liệu trả về vào các phần tử tương ứng
                $('#messageToast').html(response.message);
                $('#dataAttribute').html(response.data);
                // Làm trống input
                $('#name_attribute').val('');
                $('#value_attribute').val('');
                // Đặt lại trạng thái nút "Thêm"
                $('#addAttribute').addClass('disabled').prop('disabled', true);
                // Đóng modal sau khi thêm thành công
                $('#modalAddAttribute').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });
});