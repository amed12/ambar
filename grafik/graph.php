
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="ilmu-detil.blogspot.com">
	<title>Bootstrap Graph Using Highcharts </title>
	<!-- Bagian css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/ilmudetil.css">
	<script src="assets/js/jquery-1.10.1.min.js"></script>
	<script src="assets/js/highcharts.js"></script>
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
</head>
<body>
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
			<h3 class="box-title">Grafik Ambar</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
		</div>
		<div class="box-body">
	
			<div class="container" style="margin-top:20px">
				<div class="col-md-7">
					<div class="panel panel-primary">
						<div class="panel-heading">Grafik Ambar <input class="form-control datepicker" type="text"  id="waktu" name="waktu"></div>
						<div class="panel-body">

							<div id ="mygraph"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
          Contact Support Aplikasi ini : <i class="fa fa-facebook-square"></i></a>
        </div><!-- /.box-footer-->
		

	</div>
	</section>
	

	<!--- Bagian Judul-->	


</body>
</html>
