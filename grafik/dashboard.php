 <script src="chart/Chart.js" ></script>
<?php
$koneksi     = mysqli_connect("localhost", "root", "", "db_ambar");
$bulan       = mysqli_query($koneksi, "SELECT id_monitor, CONCAT(YEAR(waktu_input),'/',MONTH(waktu_input)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM monitor WHERE CONCAT(YEAR(waktu_input))=CONCAT(YEAR(NOW())) GROUP BY YEAR(waktu_input),MONTH(waktu_input)");
$bulan2       = mysqli_query($koneksi, "SELECT id_monitor, CONCAT(YEAR(waktu_input),'/',MONTH(waktu_input)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM monitor WHERE CONCAT(YEAR(waktu_input))=CONCAT(YEAR(NOW())) GROUP BY YEAR(waktu_input),MONTH(waktu_input)");
?>
<div class="col-md-12">
    <!-- START SALES BLOCK -->
    <div class="panel panel-default">
     <div class="panel-heading">
            <h3 class="panel-title">Dashboard</h3>

        </div>

        <div class="panel-body">
            <div class="row stacked">
                <div class="col-md-12">



            <canvas id="myChart" width="100%" height="50"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['tahun_bulan'] . '",';}?>],
                    datasets: [{
                            label: '# Jumlah Trip Perbulan untuk Tahun <?php echo date('Y'); ?>',
                            data: [<?php while ($p = mysqli_fetch_array($bulan2)) { echo '"' . $p['jumlah_bulanan'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>

            </div>
        </div>
    </div>
    <!-- END SALES BLOCK -->
</div>
