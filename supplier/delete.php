<?php
include "config.php";

$id_cust = $_POST['id_cust'];

mysql_query("delete from supplier where id_supplier=$id_cust");
if(mysql_error()){
	$result['error']=mysql_error();
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
}
echo json_encode($result);

?>