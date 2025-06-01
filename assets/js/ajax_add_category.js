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

    // Khi nút mở modal được nhấn
    $('[data-bs-toggle="modal"]').click(function() {
        // Lấy giá trị từ attribute data-value-id
        const categoryId = $(this).data('value-id');
        // Gán giá trị vào input hidden
        $('input[name="id_category_v1"]').val(categoryId);
    });

    // Kiểm tra input và bật/tắt nút "Thêm"
    $('#name_category_v2').on('input', function() {
        const nameCategory = $(this).val();
        if (nameCategory) {
            $('#addCateV2').removeClass('disabled').prop('disabled', false);
        } else {
            $('#addCateV2').addClass('disabled').prop('disabled', true);
        }
    });

    // Gửi yêu cầu AJAX khi form được gửi
    $('#categoryV2Form').submit(function(event) {
        event.preventDefault(); // Ngăn chặn gửi form mặc định

        const idV1 = $('input[name="id_category_v1"]').val(); // Lấy từ input hidden
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
                // Gán dữ liệu trả về vào các phần tử tương ứng
                $('#messageToast').html(response.message);
                $('#dataCategory').html(response.data);
                
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
});