<div class="container py-5">
    <form method="post">
        <div class="container text-center col-lg-5 border border-2 shadow border-light rounded-3 py-5 bg-light" data-aos="fade-up" data-aos-delay="200">
            <h4 class="text-success">Nhập mã OTP xác thực</h4>
            <div class="small py-3">
                Bạn sẽ nhận được cuộc gọi từ số điện thoại <span class="text-danger fw-bold"><?= $_SESSION['verify_user']['username'] ?></span>,<br> vui lòng nghe máy để nhận mã OTP.
            </div>
            <div id="otp-container">
                <input name="input_otp[]" type="text" maxlength="1" class="otp-input" oninput="moveToNext(this, 'next')" onkeydown="moveToPrevious(event, this)">
                <input name="input_otp[]" type="text" maxlength="1" class="otp-input" oninput="moveToNext(this, 'next')" onkeydown="moveToPrevious(event, this)">
                <input name="input_otp[]" type="text" maxlength="1" class="otp-input" oninput="moveToNext(this, 'next')" onkeydown="moveToPrevious(event, this)">
                <input name="input_otp[]" type="text" maxlength="1" class="otp-input" oninput="moveToNext(this, 'next')" onkeydown="moveToPrevious(event, this)">
                <input name="input_otp[]" type="text" maxlength="1" class="otp-input" oninput="moveToNext(this, 'next')" onkeydown="moveToPrevious(event, this)">
                <input name="input_otp[]" type="text" maxlength="1" class="otp-input" oninput="moveToNext(this, 'next')" onkeydown="moveToPrevious(event, this)">
            </div>
            <button name="verify_user" type="submit" class="btn btn-small btn-success mt-3 disabled">Xác thực OTP</button>
            <?php if($_SESSION['verify_user']['expried'] > time()) {?>
            <div class="text-muted small mt-5">
                Còn <span id="second_count" class=" text-danger"><?= $_SESSION['verify_user']['expried'] - time() ?></span> giây nữa để gửi lại mã <strong>OTP xác thực</strong>
            </div>
            <?php }?>
            <div class="mt-3">
                <button name="resend_otp" type="submit" class="btn btn-sm small btn-outline-success mt-2">Gửi lại mã OTP xác thực</button>
            </div>
            <div class="mt-1">
                <button name="close_register" type="submit" class="text-muted btn btn-sm small text-decoration-underline">Huỷ đăng kí tài khoản</button>
            </div>
        </div>
    </form>
</div>


<script>
    function moveToNext(input, direction) {
        if (input.value.length >= input.maxLength && direction === 'next') {
            const nextInput = input.nextElementSibling;
            if (nextInput) {
                nextInput.focus();
            }
        }
        checkAllInputs(); // Kiểm tra trạng thái nút khi nhập
    }

    function moveToPrevious(event, input) {
        if (event.key === 'Backspace' && input.value === '') {
            const previousInput = input.previousElementSibling;
            if (previousInput) {
                previousInput.focus();
            }
        }
        checkAllInputs(); // Kiểm tra trạng thái nút khi nhấn Backspace
    }

    // Hàm kiểm tra tất cả input
    function checkAllInputs() {
        const inputs = document.querySelectorAll('.otp-input');
        const verifyButton = document.querySelector('button[name="verify_user"]');
        const allFilled = Array.from(inputs).every(input => input.value.length > 0);
        
        if (allFilled) {
            verifyButton.classList.remove('disabled');
            verifyButton.disabled = false; // Kích hoạt nút
        } else {
            verifyButton.classList.add('disabled');
            verifyButton.disabled = true; // Vô hiệu hóa nút
        }
    }

    // Lấy giá trị ban đầu từ phần tử
    let seconds = parseInt(document.getElementById('second_count').innerText);
    const resendButton = document.querySelector('button[name="resend_otp"]');

    // Hàm đếm ngược
    function startCountdown() {
        const countdownElement = document.getElementById('second_count');
        const countdownContainer = countdownElement.parentElement;

        resendButton.disabled = seconds > 0;

        const interval = setInterval(() => {
            if (seconds > 0) {
                seconds--;
                countdownElement.innerText = seconds;
            } else {
                clearInterval(interval);
                countdownContainer.style.display = 'none';
                resendButton.disabled = false;
            }
        }, 1000);
    }

    // Khởi động đếm ngược khi trang được tải
    window.onload = startCountdown;
</script>