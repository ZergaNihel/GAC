<!DOCTYPE html>
<html>
<head>
	<title>bar</title>


</head>
<body>
<br>
          <canvas id="chart"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js" ></script>
<script >
	   var ctx = document.getElementById('chart');

var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["algo","fre","jfh","algo","fre","jfh"],
    datasets: [
      {
        label: 'présence',
        data: [30,200,100,400,150,250],
       backgroundColor: '#D6E9C6',
      },
      {
        label: 'absence',
        data: [50,20,10,40,15,25],
        backgroundColor: '#FAEBCC',
      }]
    
  },
  options: {
    scales: {
      xAxes: [{ stacked: true }],
      yAxes: [{ stacked: true }]
    }
  }
});

</script>

</body>
</html>