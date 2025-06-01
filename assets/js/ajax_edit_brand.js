$(document).ready(function() {

    $(document).on('click', '#addImageBrand', function() {
        var fileInput = $('<input type="file" accept=".jpg,.jpeg,.png,.webp" style="display: none;">');
        $('body').append(fileInput);
        fileInput.click();

        fileInput.on('change', function(event) {
            var file = event.target.files[0];

            // Lấy id_brand từ URL
            const urlSegments = window.location.pathname.split('/');
            const id_brand = urlSegments[urlSegments.length - 1]; // Giả sử id là phần cuối cùng trong URL
            
            if (file) {
                var formData = new FormData();
                formData.append('add', true);
                formData.append('edit', true);
                formData.append('id_brand', id_brand);
                formData.append('file', file);

                $.ajax({
                    url: '/admin/image-brand',
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
            url: '/admin/image-brand',
            type: 'POST',
            data: { 
                edit : true,
                load: true 
            },
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