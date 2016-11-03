<?php
    //ここではファイルのパスを定義しています。
    //グローバル変数の定義をしています
    global $Myfile,$Myfolder,$Logicfile;


     $Myfile=basename($_SERVER['SCRIPT_NAME']); //自分のファイル名を取得
     $Myfolder= basename(dirname($_SERVER['SCRIPT_NAME'])); //自分がいるフォルダ名を取得
     $Logicfile="../../Logic/".$Myfolder."/".$Myfile; //ロジックファイルのパスを定義
    //echo "これはfilepath"
 ?>
