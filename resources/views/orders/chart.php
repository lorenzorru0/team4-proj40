<div class="container">



<canvas id='orders_chart'>

</canvas>

 

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




<script >


const ctx = document.getElementById('orders_chart');

const myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($months) ?>  , 
datasets: [{
    label:   'numero ordini',
    data: <?php echo json_encode($monthOrders) ?>,
    backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
    ],
    borderColor: [
        'rgba(54, 162, 235, 1)',

    ],
    borderWidth: 1
},
]
},
options: {
scales: {
    y: {
        beginAtZero: true,
        
    },
    
}
}
});
</script>