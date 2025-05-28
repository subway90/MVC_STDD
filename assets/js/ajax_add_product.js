$(document).ready(function() {
    // Hàm gửi yêu cầu AJAX cho danh sách V2
    function fetchData(id_category_v1) {
        $.ajax({
            url: '/admin/choose-v1',
            type: 'POST',
            data: { id_category_v1: id_category_v1 },
            success: function(response) {
                $('#v2').html(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    }

    // Gửi yêu cầu với id_category_v1 mặc định là 0 khi trang được tải
    fetchData('none');

    // Lắng nghe sự kiện thay đổi trên dropdown
    $('#v1').change(function() {
        var id_category_v1 = $(this).val();
        fetchData(id_category_v1);
    });

    // Hàm gửi yêu cầu AJAX cho danh sách series
    function chooseSeries(name_series) {
        $.ajax({
            url: '/admin/choose-series',
            type: 'POST',
            data: { name_series: name_series },
            success: function(response) {
                $('#model').html(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    }

    // Gửi yêu cầu với name_series mặc định là 0 khi trang được tải
    chooseSeries('none');

    // Lắng nghe sự kiện thay đổi trên dropdown series
    $('#series').change(function() {
        var name_series = $(this).val();
        chooseSeries(name_series);
    });

    // Thêm hình ảnh sản phẩm
    $('#addImage').click(function() {
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
                    url: '/admin/image-product',
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
            url: '/admin/image-product',
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

    // Xóa hình ảnh sản phẩm
    $(document).on('click', '.deleteImage', function(event) {
        event.stopPropagation();
        var pathImage = $(this).closest('form').find('input[name="pathImage"]').val();

        $.ajax({
            url: '/admin/image-product',
            type: 'POST',
            data: {
                delete: true,
                path: pathImage
            },
            success: function(response) {
                $('#messageImage').html(response.message);
                $('#dataImage').html(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });

    // Kiểm tra các input và bật/tắt nút thêm
    window.checkInputs = function() {
        const nameAttribute = $('#name_attribute').val();
        const valueAttribute = $('#value_attribute').val();
        if (nameAttribute && valueAttribute) {
            $('#addAttribute').removeClass('disabled').prop('disabled', false);
        } else {
            $('#addAttribute').addClass('disabled').prop('disabled', true);
        }
    };

    // Gửi yêu cầu AJAX khi form được gửi
    $('#attributeForm').submit(function(event) {
        event.preventDefault(); // Ngăn chặn gửi form mặc định

        const nameAttribute = $('#name_attribute').val();
        const valueAttribute = $('#value_attribute').val();

        $.ajax({
            url: '/admin/attribute-product',
            type: 'POST',
            data: {
                add: true,
                name_attribute: nameAttribute,
                value_attribute: valueAttribute
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

    // Lấy thông số
    function getAttribute() {
        $.ajax({
            url: '/admin/attribute-product',
            type: 'POST',
            data: { load: true },
            success: function(response) {
                $('#dataAttribute').html(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    }

    getAttribute();

    // Xóa thông số sản phẩm
    $(document).on('click', '.deleteAttribute', function(event) {
        event.stopPropagation();
        var order = $(this).closest('form').find('input[name="orderAttribute"]').val();

        $.ajax({
            url: '/admin/attribute-product',
            type: 'POST',
            data: {
                delete: true,
                order: order
            },
            success: function(response) {
                $('#messageToast').html(response.message);
                $('#dataAttribute').html(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        });
    });
});