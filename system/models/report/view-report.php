<h2 style="font-size: 30px; color: #262626;">Grafik Monitoring</h2>

<div id="container"></div>

<script src="../asset/library/chart/js/highcharts.js"></script>
<script src="../asset/library/chart/js/exporting.js"></script>
<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Data Jumlah Mahasiswa'
        },
        subtitle: {
            text: 'Source: Siakad'
        },
        xAxis: {
            categories: [<?php $query = mysqli_query($conn, "SELECT * FROM mahasiswa group by nim");
                            while ($row = mysqli_fetch_array($query)) {
                                echo $row['nim'] . ",";
                            } ?>],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Jumlah per jiwa'
            },
            labels: {
                formatter: function() {
                    return this.value;
                }
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ' Jiwa'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: 'Nasabah RW. 005',
            data: [<?php $query = mysqli_query($conn, "SELECT COUNT(nin) AS jiwa FROM mahasiswa group by nim");
                    while ($row = mysqli_fetch_array($query)) {
                        echo ($row['nim']) . ",";
                    } ?>]
        }]
    });
</script>