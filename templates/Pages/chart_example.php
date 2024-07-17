<script>
    function BuildChart(labels, values, chartTitle) {
        var data = {
            labels: labels,
            datasets: [{
                label: chartTitle, // Name the series
                data: values,
                backgroundColor: ['rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                ],
            }],
        };

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: data,
            options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: '$ Billion'
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Name'
                        }
                    }]
                },
            }
        });

        return myChart;
    }


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(this.response);
            console.log(json);
            var labels = json.reportRun.map(function (e) {
                return e.name;
            });

// Map json values back to values array
            var values = json.reportRun.map(function (e) {
                return (e.finalWorth / 1000); // Divide to billions in units of ten
            });

            BuildChart(labels, values, "Real Time Net Worth");
        }
    };
    xhttp.open("GET", "https://cf24.ddev.site/rb/api/another-one", false);
    xhttp.send();
</script>

<div class="chart" style="position: relative; height:80vh; width:100vw">
    <canvas id="myChart"></canvas>
</div>
