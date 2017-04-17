<?php
include "config.php";

$id_cust = $_POST['id_cust'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$crud=$_POST['crud'];

if($crud=='N'){
	mysqli_query($koneksi,"insert into supplier(nama_pemilik,alamat,no_telp_supplier,tanggal_gabung) values('$name','$gender','$country','$phone')");
	if(mysqli_error()){
		$result['error']=mysqli_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else if($crud == 'E'){
	mysqli_query($koneksi,"update supplier set nama_pemilik='$name',alamat='$gender',no_telp_supplier='$country',tanggal_gabung='$phone' where id_supplier=$id_cust");
	if(mysqli_error()){
		$result['error']=mysqli_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else{

	$result['error']='Invalid Order';
	$result['result']=0;
}
$result['crud']=$crud;
echo json_encode($result);

?>