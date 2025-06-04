$(document).ready(function() {
    $(document).on('click', '#addImageSlide', function() {
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
                    url: '/admin/image-slide',
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
            url: '/admin/image-slide',
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
});