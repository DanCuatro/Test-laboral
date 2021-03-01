<script type="text/javascript" >
    window.livewire.on('Recargar',CargarGrafica)
    
    function CargarGrafica(arrayDatos,myChart) {
        console.log(arrayDatos);
        var datos = {
            labels: ['Nulo','Bajo','Medio','Alto','Muy alto'],
            datasets:DesglosarDatos(arrayDatos)
        }

        var ctx = document.getElementById(myChart).getContext('2d');
        window.myChart = new Chart(ctx, {
        type: 'bar',
        data: datos,
        options: {scales: {yAxes: [{ticks: {beginAtZero: true}}]}}});
    }  
    function DesglosarDatos(arrayDatos){
        var datos = []
        for(i=0;i<arrayDatos.length;i++){
            datos[i] = {
            label: arrayDatos[i][0],
            data: arrayDatos[i][1],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(80, 200, 90, 0.2)',
                'rgba(255,227, 0, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(80, 200, 90, 1)',
                'rgba(255, 227, 0, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
            };
        }
        return datos
    } 
</script>