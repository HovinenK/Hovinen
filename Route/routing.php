<?php

echo $_SERVER['REQUEST_URI'];
$uri=$_SERVER['REQUEST_URI'];
$u=explode('?',$uri);
$uri=$u[0];
echo "<br>newUri=".$uri;
if('/Hovinen/'==$uri OR '/Hovinen/index.php'==$uri){
	//что-то надо с этим делать
	$response=list_action();

}elseif('/Hovinen/index.php/admin'==$uri){
	//с этим тоже надочто-то сделать, но другое
	$response=admin_action();
}
elseif('/Hovinen/index.php/showpost'==$uri){
	//с этим тоже надочто-то сделать, но другое
	$response=showpost_action($_REQUEST['id']);
}
elseif('/Hovinen/index.php/avtor'==$uri){
	//с этим тоже надочто-то сделать, но другое
	$response=avtor_action();
}elseif('/Hovinen/index.php/add'==$uri){
	//с этим тоже надочто-то сделать, но другое
	$response=add_action();
}elseif('/Hovinen/index.php/delete'==$uri){
	//с этим тоже надочто-то сделать, но другое
	$response=delete_action($_REQUEST['id']);
}
/*elseif('/Hovinen/index.php/update'==$uri){
	//с этим тоже надочто-то сделать, но другое
	$response=update_action($_REQUEST['id']);
}*/