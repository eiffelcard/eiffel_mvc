<?php
  global $sendfolder,$sendfile,$sendfile2,$viewpath;

    function sendform($sendfolder,$sendfile){
     echo "../../Logic/".$sendfolder."/".$sendfile;
   }

   function changepage($sendfile2){
  $viewpath= "../../View/eiffel/".$sendfile2;
	header('Location:'.$viewpath);
//  echo $viewpath;
   }
 ?>
