<?php
include "config.php";

$id_cust = $_POST['id_cust'];

mysqli_query($koneksi,"delete from supplier where id_supplier=$id_cust");
if(mysqli_error()){
	$result['error']=mysqli_error();
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
}
echo json_encode($result);

?>