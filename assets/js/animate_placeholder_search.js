const input = document.getElementById('search-input');

// Lấy giá trị từ data-placeholder và chuyển đổi thành mảng
const placeholders = input.getAttribute('data-placeholder').split(',').map(item => item.trim());
let currentIndex = 0;

function typePlaceholder(text, callback) {
    let index = 0;
    input.placeholder = ''; // Đặt placeholder là rỗng
    input.classList.add('placeholder-visible'); // Hiện placeholder

    const interval = setInterval(() => {
        if (index < text.length) {
            input.placeholder += text[index++];
        } else {
            clearInterval(interval);
            setTimeout(callback, 2000); // Chờ 2 giây trước khi xóa
        }
    }, 100); // Thay đổi tốc độ gõ ở đây
}

function erasePlaceholder(callback) {
    const text = input.placeholder;
    let index = text.length;

    const interval = setInterval(() => {
        if (index > 0) {
            input.placeholder = text.substring(0, index--);
        } else {
            clearInterval(interval);
            input.classList.remove('placeholder-visible'); // Ẩn placeholder
            callback();
        }
    }, 50); // Thay đổi tốc độ xóa ở đây
}

function changePlaceholder() {
    erasePlaceholder(() => {
        currentIndex = (currentIndex + 1) % placeholders.length;
        typePlaceholder(placeholders[currentIndex], changePlaceholder);
    });
}

// Bắt đầu quá trình
typePlaceholder(placeholders[currentIndex], changePlaceholder);