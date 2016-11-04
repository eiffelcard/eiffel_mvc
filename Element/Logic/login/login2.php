<?php
require('../../../Controller/filepackage.php');
echo $_POST['email'];
echo $_POST['password'];

//require_once('../../../Controller/Settingfile/dbconnect.php');
	//下記のerror_reporting(E_ALL^E_NOTICE)いれておくことで軽微なエラーは減る
	error_reporting(E_ALL^E_NOTICE);
	session_start();

	if($_COOKIE['email'] !=''){
		$_POST['email']=$_COOKIE['email'];
		$_POST['password']=$_COOKIE['password'];
		$_POST['save']='on';
	}


	if(!empty($_POST)){
		//ログインの処理

		if($_POST['email']!='' && $_POST['password']!=''){
			$sql=sprintf('SELECT *FROM users WHERE email="%s" AND password="%s"',
	mysqli_real_escape_string($db,$_POST['email']),
	mysqli_real_escape_string($db,sha1($_POST['password'])));
	$record=mysqli_query($db,$sql)or die(mysqli_error($db));
	if($table=mysqli_fetch_assoc($record)){

 changepage("mainmenu.php");
//	header('Location:'.$viewpath);

	//header('Location: mainmenu.php');
}
}}

echo "Logicfile2です";
	require($Templatefile);
?>
