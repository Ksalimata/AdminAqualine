/* globals Chart:false, feather:false */

var xhttp;
if (window.XMLHttpRequest) {
  // code for modern browsers
  xhttp = new XMLHttpRequest();
} else {
  // code for IE6, IE5
  xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    //document.getElementById("demo").innerHTML = this.responseText;
    var result = JSON.parse(this.responseText);
    var jours = result[0];
    var nombres = result[1];
    
    (function () {
      'use strict'

      // Graphs
      var ctx = document.getElementById('myChart')
      // eslint-disable-next-line no-unused-vars
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: jours,
          datasets: [{
            data: nombres,
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          legend: {
            display: false
          }
        }
      })
    }())
  }
};
xhttp.open("GET", "/statistiques", true);
xhttp.send();