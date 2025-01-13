/******/ (() => { // webpackBootstrap
/*!*********************************************!*\
  !*** ./resources/js/superadmin/sidemenu.js ***!
  \*********************************************/
document.addEventListener("DOMContentLoaded", function () {
  // Your existing JavaScript code

  // Menu Hover effect
  var list = document.querySelectorAll(".navigation li");
  function activeLink() {
    list.forEach(function (item) {
      item.classList.remove("hovered");
    });
    this.classList.add("hovered");
  }
  list.forEach(function (item) {
    return item.addEventListener("mouseover", activeLink);
  });

  // Menu Toggle functionality
  var toggle = document.querySelector(".toggle");
  var navigation = document.querySelector(".navigation");
  var main = document.querySelector(".main");
  toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
  };

  // Chart.js code
  var ctx = document.getElementById('registrationChart').getContext('2d');
  var registrationChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      datasets: [{
        label: "Registrations",
        data: [50, 80, 120, 150, 200, 220, 300],
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        fill: true,
        tension: 0.4
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      responsive: true,
      // Make chart responsive
      maintainAspectRatio: false // Allow manual resizing
    }
  });
});
/******/ })()
;