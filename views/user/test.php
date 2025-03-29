<div class="container mt-5">
    
<div class="h2 text-center text-danger text-uppercase mt-3">
    Khu vực kiểm thử
</div>
<div class="mb-1">
    <span class="fw-bold text-green">Địa chỉ IP :</span>
    <?= get_ip() ?>
</div>
<div class="mb-3">
    <span class="fw-bold text-green">Thời gian hiện tại :</span>
    <span id="current-time"></span>
</div>
<div class="border border-1 border-danger p-5">
    <div class="fst-italic text-muted text-center">
        (Chưa có dữ liệu test)
    </div>
</div>

<script>
    function displayCurrentTime() {
    var currentTime = new Date();
    var timeZoneOffset = currentTime.getTimezoneOffset() / 60; // Đổi về giờ địa phương
  
    var gmt7TimeOffset = 7 + timeZoneOffset;
    currentTime.setHours(currentTime.getHours() + gmt7TimeOffset);
  
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
  
    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;
    seconds = (seconds < 10 ? "0" : "") + seconds;
  
    var currentTimeString = hours + ":" + minutes + ":" + seconds;
    document.getElementById("current-time").textContent = currentTimeString;
  
    setTimeout(displayCurrentTime, 1000);
  }
  
displayCurrentTime();
</script>
</div>