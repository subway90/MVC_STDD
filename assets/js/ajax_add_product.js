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
                        $('#messageImage').html(response.message);
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
});