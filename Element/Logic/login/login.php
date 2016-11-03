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
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>メインページ</title>
<link rel="stylesheet" href="../components/css/original/master.css">
<link rel="stylesheet" href="../components/css/font-awesome.min.css">
<script src="main.js"></script>
</head>
<body>
<header style="background-color:#66ccff;">
        <div id="login">
				<p style="cursor:pointer" onClick="location.href=href='../../index.php'">eiffel</p>
        </div>
</header>
  <div width=100%>
    <div style="margin-top:10px;padding-top:30px;background-color:#ECF0F1" id=registerform>
      <form action="" method="post">
      	<!-- Email -->
        <div align=center>
          <input type="text" class="form-control" name="email" id="email" placeholder="メールアドレス" value="<?php echo htmlspecialchars($_POST['email']);?>"/>
        </div>
      	<!-- password -->
      	<div align=center>
          <input type="password" class="form-control" name="password" id="password" placeholder="パスワード" value="<?php echo htmlspecialchars($_POST['password']);?>"/>
      	</div>
        <div align=center>
          <?php if ($error['login'] == 'blank'): ?>
            <p class="error">もう一度、正しく入力をお願いします</p>
            <?php endif; ?>
            <?php if ($error['login']=='failed'): ?>
            <p class="error">ログインに失敗しました</p>
            <?php endif; ?>
        </div>
        <div class="loginpage">
          <input value="ログイン" type="submit" style="color:white">
        </div>
        <!--checkbox -->
        <div >
          <label>
            <input class="checkbox" type="checkbox" name="save" id="save" value="on">
						<span class="checkboxbtn"></span>次回から自動でログインする
          </label>
        </div>
			</div><!--registerform ends-->
    </div><!--eiffel text ends-->
    <div class="centering">
			<a href="../others/changepassword.php">パスワードを忘れた方</a>
    </div>
		<div id=register class="loginpage" style="margin-top:30px;">
			<p style="margin-top:10px;padding-top:10px;padding-bottom:5px;">招待者のeiffel idをお持ちの方はこちら</p>
			<div onClick="location.href='../invitation/invitation.php';"><a>新規ユーザー登録</a></div>
		</div>

		      <div style="margin-top:50px;"class="footer">
							<a href="http://eiffelcard.com/company/service/tokusho/">特定商取引法に基づく表示</a><br>
							<a href="http://eiffelcard.com/company/privacypolicy/">個人情報保護方針</a><br>
							<a href="http://eiffelcard.com/company/terms/">利用規約</a></br>
		          <a>COPYRIGHT &copy; eiffel  </a>
		          <a href="http://eiffelcard.com/company/about/">by: forsisters Inc.</a>
		      </div>

</body>
</html>
