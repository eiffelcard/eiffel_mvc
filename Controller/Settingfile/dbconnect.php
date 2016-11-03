
  <!--本番用-->

  <!--?php
  $db=mysqli_connect('mysql528.db.sakura.ne.jp','eiffel','Pretz0911','eiffel_master')  or die(mysqli_connect_error());
  mysqli_set_charset($db,'utf8');
  ?>
  -->
  <!--ローカル開発用-->
  <!--  20160918にwebの情報に変更。ayumiのversionは$db=mysqli_connect('localhost','root','','eiffel_new') -->
  <?php
  $db=mysqli_connect('localhost','root','root','eiffel_honbandata')  or die(mysqli_connect_error());
  mysqli_set_charset($db,'utf8');
  ?>

  <?php
   $db2=mysqli_connect('localhost','root','root','test')  or die(mysqli_connect_error());
   mysqli_set_charset($db2,'utf8');
   ?>
