var data = {
    labels: ['User','Host'],
    datasets: [{
      data: [300, 150],
      backgroundColor: ['#FF6384', '#36A2EB',]
    }]
};
var ctx = document.getElementById('myPieChart').getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data
});