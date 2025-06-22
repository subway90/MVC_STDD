<?php

if(isset($_POST['send'])) {
    test_array($_POST);
}

?>

<div class="">
    <form action="" method="post">
        <input 
            min="0" 
            max="4" 
            value="0" 
            type="range" 
            name="point_star" 
            oninput="emoji.innerText = [
                '⭐ Rất tệ',
                '⭐⭐ Tệ',
                '⭐⭐⭐ Bình thường',
                '⭐⭐⭐⭐ Tốt',
                '⭐⭐⭐⭐⭐ Tuyệt vời'
                ][this.value]"
        >
        <p id="emoji">⭐ Rất tệ</p>
        <button name="send" type="submit">Gửi</button>
    </form>
</div>


<input readonly value="0965279041" id="copy">
<button onclick="navigator.clipboard.writeText(copy.value); this.innerText = 'Đã copy'">
    Copy
</button>