<div id="overlay"></div>
<div id="largeImage">
    <img id="largeImageView" src="" alt="">
    <div class="text-center">
        <span class="mt-5 small text-decoration-underline text-light">Nhấn vào màn hình để tắt</span>
    </div>
</div>

<style>
    #largeImage {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        transition: transform 1s ease;
    }
    #largeImage img {
        max-width: 100%;
        max-height: 100%;
        
    }
    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 999;
    }
    .thumbnail-container {
        position: relative; /* Để định vị overlay */
        display: inline-block; /* Để chứa nội dung bên trong */
    }

    .thumbnail {
        display: block; /* Để không có khoảng cách dưới ảnh */
        transition: transform 0.2s; /* Hiệu ứng chuyển tiếp cho phóng to */
    }

    .thumbnail-container:hover .thumbnail {
        transform: scale(1.1); /* Phóng to ảnh khi hover */
    }

    .thumbnail-container:hover {
        background: rgba(0, 0, 0, 0.3); /* Nền màu đen với độ mờ */
        border: 1px dashed rgba(0, 0, 0, 0.5); /* Viền đứt nét */
    }

    .hover-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); /* Căn giữa văn bản */
        opacity: 0; /* Ẩn văn bản ban đầu */
        transition: opacity 0.3s; /* Hiệu ứng chuyển tiếp */
    }

    .thumbnail-container:hover .hover-text {
        opacity: 1; /* Hiện văn bản khi hover */
    }
</style>

<script>
    const thumbnails = document.querySelectorAll('.thumbnail-container');
    const largeImageView = document.getElementById('largeImageView');
    const largeImage = document.getElementById('largeImage');
    const overlay = document.getElementById('overlay');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const img = this.querySelector('.thumbnail');
            largeImageView.src = img.src; // Lấy src của ảnh
            largeImage.style.display = 'block';
            overlay.style.display = 'block';
        });
    });

    // Hàm để ẩn ảnh lớn và overlay
    function hideLargeImage() {
        largeImage.style.display = 'none';
        overlay.style.display = 'none';
    }

    overlay.addEventListener('click', hideLargeImage);
    largeImage.addEventListener('click', hideLargeImage);
</script>