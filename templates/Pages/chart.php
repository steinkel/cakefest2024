<?php
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hours Spent Per Day Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<canvas id="hoursChart" width="400" height="200"></canvas>
<script>
    // Fetch data from the endpoint
    fetch('https://cf24.ddev.site/rb/api/for-api') // Replace with your actual endpoint
        .then(response => response.json())
        .then(data => {
            // Extract and transform data for Chart.js
            const timeEntries = data.reportRun[0].time_entries;
            const labels = timeEntries.map(entry => entry.spent_on);
            const hours = timeEntries.map(entry => entry.hours);

            // Create the chart
            const ctx = document.getElementById('hoursChart').getContext('2d');
            const hoursChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Hours Spent',
                        data: hours,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
</body>
</html>
