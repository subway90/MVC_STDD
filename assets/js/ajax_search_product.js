let controller; // Biến để lưu trữ AbortController

document.getElementById('search-input').addEventListener('input', function() {
    const keyword = this.value.trim();
    const trendDiv = document.getElementById('search-list-trend');
    const historyDiv = document.getElementById('search-list-history');
    const resultDiv = document.getElementById('search-list-result');

    // Kiểm tra nếu ô tìm kiếm không rỗng
    if (keyword.length > 0) {
        // Thêm class d-none vào hai div để ẩn chúng
        trendDiv.classList.add('d-none');
        historyDiv.classList.add('d-none');

        // Hủy yêu cầu fetch cũ nếu có
        if (controller) {
            controller.abort();
        }

        // Tạo một instance mới của AbortController
        controller = new AbortController();
        const signal = controller.signal;

        // Gắn nội dung loading vào resultDiv
        resultDiv.innerHTML = '<div class="d-flex justify-content-center gap-2"><div class="loader-btn-success"></div><div class="small text-muted">Đang tìm kiếm</div></div>';

        fetch(`/search/?key=${encodeURIComponent(keyword)}`, { signal })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Kiểm tra xem có dữ liệu trả về không
                if (data && data.data) {
                    // Thay thế nội dung loading bằng dữ liệu
                    resultDiv.innerHTML = data.data;
                }
            })
            .catch(error => {
                if (error.name === 'AbortError') {
                    console.log('Fetch aborted'); // Không làm gì
                } else {
                    console.error('There was a problem with the fetch operation:', error);
                    resultDiv.innerHTML = 'Có lỗi xảy ra. Vui lòng thử lại.';
                }
            });
    } else {
        // Nếu ô tìm kiếm rỗng, xoá class d-none để hiện lại hai div
        trendDiv.classList.remove('d-none');
        historyDiv.classList.remove('d-none');
        resultDiv.innerHTML = '';
    }
});