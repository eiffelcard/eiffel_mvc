<?php
require_once('../../../Controller/filepackage.php');
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
	//ログイン成功
	$_SESSION['id']=$table['id'];
	$_SESSION['time']=time();

	//ログイン情報を記録する
	if($_POST['save']=='on'){
	setcookie('email',$_POST['email'],time()+60*60*24*14);
	setcookie('password',$_POST['password'],time()+60*60*24*14);

	}

	//前回のログイン情報
	$sql=sprintf('SELECT max(id) as max, max(created) as created FROM log
	 where users_id=%d',
	mysqli_real_escape_string($db,$_SESSION['id'])
	);
	$login=mysqli_query($db,$sql) or die(mysqli_error($db));
		$_SESSION['lastlogin']=mysqli_fetch_assoc($login);

unset($_SESSION['message']);

//icon情報の確認
$sql=sprintf('SELECT* FROM users_setting WHERE users_id="%d"',
mysqli_real_escape_string($db,$_SESSION['id']));
$iconc=mysqli_query($db,$sql) or die(mysqli_error($db));
$iconcheck=mysqli_fetch_assoc($iconc);
//ダブりのチェック
	if($iconcheck['picture']=="default.jpg"){
	header('Location:../mysetting/icon_birthday.php');
	}else{
	header('Location: mainmenu.php');
}




	exit();
	}else{
	$error['login']='failed';
	}
	}else{
	$error['login']='blank';
	}
}
?>
