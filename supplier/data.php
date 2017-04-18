<?php
include "config.php";
$query=mysql_query("SELECT @rownum := @rownum + 1 AS urutan,t.*
	FROM supplier t,
	(SELECT @rownum := 0) r");
$data = array();
while($r = mysql_fetch_assoc($query)) {
	$data[] = $r;
}
$i=0;
foreach ($data as $key) {
		// add new button
	$data[$i]['button'] =
	'<button type="submit" class="btn btn-primary" id="btnedit" id_supplier="'.$data[$i]['id_supplier'].'"> <i class="fa fa-edit" ></i></button>
	<button type="submit" id_supplier="'.$data[$i]['id_supplier'].'" nama_pemilik="'.$data[$i]['nama_pemilik'].'" class="btn btn-primary btnhapus" ><i class="fa fa-remove"></i></button>';
	$i++;
}
$datax = array('data' => $data);
echo json_encode($datax);
?>
