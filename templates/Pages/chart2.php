<?php
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Total Time Per Project Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<canvas id="projectsChart" width="400" height="200"></canvas>
<script>
    // Fetch data from the endpoint
    fetch('https://cf24.ddev.site/rb/api/rodrigo') // Replace with your actual endpoint
        .then(response => response.json())
        .then(data => {
            // Aggregate total time per project
            const projects = data.reportRun;
            const projectNames = [];
            const projectHours = [];

            projects.forEach(project => {
                let totalHours = 0;
                project.issues.forEach(issue => {
                    issue.time_entries.forEach(entry => {
                        totalHours += entry.hours ? entry.hours : 0;
                    });
                });
                projectNames.push(project.name);
                projectHours.push(totalHours);
            });

            // Create the chart
            const ctx = document.getElementById('projectsChart').getContext('2d');
            const projectsChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: projectNames,
                    datasets: [{
                        label: 'Total Hours',
                        data: projectHours,
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
                    responsive: true
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
</body>
</html>
