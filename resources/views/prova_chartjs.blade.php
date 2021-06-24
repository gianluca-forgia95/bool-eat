<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  


    <title>Document</title>
  </head>
  <body>
      
      <div class="container chart_container" style="width: 400px">
      <div class="" id="stats">

        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
         
        
      </div>


    <script>
      var ctx = document.getElementById('myChart');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              
              labels: [@foreach($orders as $order) "{{$order->name}}", @endforeach ],
              datasets: [{
                  label: '# of Votes',
                  data: [@foreach($orders as $order) "{{$order->total}}", @endforeach ],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: true,
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
    </script>
    
  </body>
</html>