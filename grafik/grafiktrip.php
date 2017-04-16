<script>
  var chart1;
  $(document).ready(function() {
    chart1 = new Highcharts.Chart({
      chart: {
        renderTo: 'mygraph',
        type: 'column'
      },
      title: {
        text: ''
      },
      xAxis: {
        categories: ['Nopol Kendaraan']
      },
      yAxis: {
        title: {
          text: 'Total volume Usage'
        }
      },
      series:
      [
      <?php
      include "connection.php";
      $sql   = "SELECT nopol_armada  FROM monitor";
      $query = mysqli_query( $con, $sql )  or die(mysqli_error());
      while( $temp = mysqli_fetch_array( $query ) )
      {
        $trendbrowser=$temp['nopol_armada'];
        $sql_total   = "SELECT volume FROM monitor WHERE nopol_armada='$trendbrowser'";
        $query_total = mysqli_query($con,$sql_total ) or die(mysql_error());
        while( $data = mysqli_fetch_array( $query_total ) )
        {
          $total = $data['volume'];
        }
        ?>
        {
          name: '<?php echo $trendbrowser; ?>',
          data: [<?php echo $total; ?>]
        },
        <?php
      } 	?>
      ]
    });
  });
</script>
