var countDownDate = new Date("2025/06/10 00:00:00").getTime();
var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  if(days<10){ days='0'+days};
  if(hours<10){ hours='0'+hours};
  if(minutes<10){ minutes='0'+minutes};
  if(seconds<10){ seconds='0'+seconds};
  document.getElementById("time").innerHTML = days + " ngày, " + hours + " : "+ minutes + " : " + seconds +" ";
  console.log(1000);
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("time").innerHTML = "Sự kiện đã kết thúc";
  }
}, 1000);