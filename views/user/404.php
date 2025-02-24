<style>
    .typing-keyword p {
        display: inline-block;
        padding-right: 4px;
        animation: type .5s alternate infinite;
    }

    @keyframes type {
        from {
            box-shadow: inset -1px 0px 0px darkred;
        }

        to {
            box-shadow: inset -1px 0px 0px transparent;
        }    
    } 
</style>


<div class="container py-5 my-5">
    <div class="text-center my-5">
        <h1 class="text-dark text-opacity-25 h1 mb-4">404 Not Found</h1>
        <div class="typing-keyword">
            <div class="fs-6 text-danger text-opacity-75">
                <p id="errorMessage"></p>
            </div>
        </div>
        <a href="<?= URL ?>" class="btn btn sm btn-outline-secondary mt-4">Đi đến Trang chủ</a>
    </div>
</div>

<script>
    const errorMessage = document.getElementById('errorMessage');
    let text = "Không tìm thấy nội dung của trang này, thử lại sau !";
    let index = 0;

    function typeText() {
        if (index < text.length) {
            errorMessage.innerHTML += text.charAt(index);
            index++;
            setTimeout(typeText, 60);
        } else {
            // Đợi một chút trước khi xóa và bắt đầu lại
            setTimeout(() => {
                errorMessage.innerHTML = ''; // Xóa nội dung hiện tại
                index = 0; // Đặt lại chỉ số
                typeText(); // Bắt đầu gõ lại
            }, 1500); // Đợi 1 giây trước khi bắt đầu lại
        }
    }

    typeText();

</script>