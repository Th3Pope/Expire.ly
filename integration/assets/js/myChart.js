//var ctx = document.getElementById("DoughnutChart");

//var doughnutChart = new Chart(ctx, {
//    type: 'doughnut',
//    data: data,
//    options: options
//});


    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
    /*
    * type indicates the type of chart we will be using
    * line, bar, radar, doughnut and pie, polar area, bubble, and scatter
    */
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ["Good", "Use", "Bad"],
        datasets: [{
            label: "Food",
            backgroundColor: ['rgb(35, 136, 35)', 'rgb(255, 191, 0)', 'rgb(210, 34, 46)'],
            borderColor: 'rgb(0, 0, 0)',
            data: [13, 7, 5],
        }]
    },

    // Configuration options go here
    options: {
      
    }
});

