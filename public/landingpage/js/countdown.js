// Set the date we're counting down to
var countDownDate = new Date("Sep 25, 2019 09:01:00").getTime();
    
// Update the count down every 1 second
var x = setInterval(function() {

// Get today's date and time
var now = new Date().getTime();

// Find the distance between now and the count down date
var distance = countDownDate - now;

// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Display the result in the element with id="demo"
document.getElementById("myDay").innerHTML = days;
document.getElementById("myHours").innerHTML = hours;
document.getElementById("myMinute").innerHTML = minutes;
document.getElementById("mySecond").innerHTML = seconds;

// If the count down is finished, write some text
if (distance < 0) {
  clearInterval(x);
  document.getElementById("title-reward").style.display = "none";
  document.getElementById("text-lead").style.display = "none";
  document.getElementById("pmwu").style.display = "none";
  document.getElementById("text-expired").style.display = "block";
  document.getElementById("pmwu-button").style.display = "none";
  document.getElementById("started").style.display = "none";
  document.getElementById("expired").innerHTML = "EXPIRED";
}
}, 1000);