<?php
//このファイルは必要なファイルを一括で読み込んでいるファイルです。

      //フォルダの中の全てのファイルを読み込む関数
      function allrequire($dir){

        	// ディレクトリの存在を確認し、ハンドルを取得
        	if( is_dir( $dir ) && $handle = opendir( $dir ) ) {
        		// ループ処理
        		while( ($file = readdir($handle)) !== false ) {
        			// ファイルのみ取得
              if ($file==".DS_Store"){
                $aaa="no";
              } else
        			if( filetype( $filepath = $dir . $file ) == "file" ) {
        				// 各ファイルへの処理
        				require_once $filepath ;
        			}
        		}
        	}
        }

      //一つのファイルを読み込む関数
      function filerequire($path){
        require_once $path;
      }


/*
必要なファイルを読み込み(これはfilepackage.phpからのパスでfilepackage.phpから直接確認する時用)
allrequire("./Controlfile/");
allrequire("./Settingfile/");
*/

//必要なファイルを読み込み(これはElementフォルダ内からのパス)
allrequire("../../../Controller/Controlfile/");
allrequire("../../../Controller/Settnigfile/");


echo "hello";
//$page=new Variab();
//echo $page->Myfile;

 ?>
