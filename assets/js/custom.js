// Sự kiện khi trang đã tải xong
window.onload = function() {
    document.getElementById('spinner').style.visibility = 'hidden'; // Ẩn spinner
};

// Hàm mở ảnh modal
function openFullscreen(src) {
    const img = document.getElementById('fullscreenImage');
    img.src = src;

    // Tạo hoặc lấy instance của modal
    const modalElement = document.getElementById('fullscreenModal');
    const modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);

    // Hiện modal với ảnh mới
    modal.show();
}