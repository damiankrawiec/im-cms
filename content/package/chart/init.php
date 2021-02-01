<?php

$response = require_once $path.'/api-response/init.php';

echo '<canvas id="chart"></canvas>';

echo '<link rel="stylesheet" type="text/css" href="module/chartjs/Chart.min.css">';

echo '<script src="module/chartjs/Chart.bundle.min.js"></script>';

?>

<script>

    let $ctx = document.getElementById('chart').getContext('2d');

    new Chart($ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'zakazenia wszystkie',
                data: [19, 21],
                borderColor: '#3e95cd',
                fill: false
            }, {
                label: 'zakażenia lekkie',
                data: [11, 5],
                borderColor: "#8e5ea2",
                fill: false
            }, {
                label: 'zakazenia ciężkie',
                data: [4, 8],
                borderColor: "#3cba9f",
                fill: false
            }, {
                label: 'zakazenia krytyczne',
                data: [4, 8],
                borderColor: "#1cba87",
                fill: false
            }, {
                label: 'zgony',
                data: [0, 0],
                borderColor: "#2c1a32",
                fill: false
            }, {
                label: 'ozdrowieńcy',
                data: [0, 0],
                borderColor: "#3c7aaa",
                fill: false
            }, {
                label: 'kwarantanny',
                data: [0, 0],
                borderColor: "#4cb5b4",
                fill: false
            }, {
                label: 'testy',
                data: [0, 0],
                borderColor: "#5c5abc",
                fill: false
            }, {
                label: 'współczynnik r',
                data: [0, 2],
                borderColor: "#6c3ddd",
                fill: false
            }],
            labels: ['Dzień 0', 'Dzień 1']
        },
    });
</script>
