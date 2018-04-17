@if ($chart != 0)
    <script> // only include this if the calling template has a chart, device, gpm, etc. variable
        $(function () {
            Highcharts.chart('chartHolder', {
                chart: {
                    type: 'chartType'
                },
                title: {
                    text: 'Device ' . $device
                },
                xAxis: {
                    title: {
                        text: 'Minutes'
                    }
                },
                series: [{
                    name: 'GPM',
                    data: <?php echo json_encode($gpm) ?>
                }, {
                    name: 'Temperature',
                    data: <?php echo json_encode($temperature) ?>
                }, {
                    name: 'PSI',
                    data: <?php echo json_encode($psi) ?>
                }, {
                    name: 'Velocity',
                    data: <?php echo json_encode($velocity) ?>
                }]
            });
        });
    </script>
@endif