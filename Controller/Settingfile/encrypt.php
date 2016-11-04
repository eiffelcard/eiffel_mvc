<?php

$key = 'T0jFY1KE7vECee+KlEuqPFiJginQDcb63rDfbvUdn4XFQR0VuRB2DFt+7PYzq+C+VvJMZcuPdW2UW7bUPjifqroEGIMzf9MVRXFE5Ko9VJWt1KNw2dEokyr35fKxuKfh';
//

//確認用
echo "エンクリプト！";

function decript(){

global   $country,  $postcode,  $state,  $city, $street,$building,$delivery_name,$key2,$key,$cardh_li;

// echo $postcode;
//暗号の解読
$country=$cardh_li['country'];
$postcode=$cardh_li['postcode'];
$state=$cardh_li['state'];
$city=$cardh_li['city'];
$street=$cardh_li['street'];
$building=$cardh_li['building'];
$delivery_name=$cardh_li['delivery_name'];
$key2=$cardh_li['user_id_receiver'];

  	//暗号の解読1回目
  	$de_country = openssl_decrypt($country, 'AES-128-ECB', $key2);
  	$de_postcode = openssl_decrypt($postcode, 'AES-128-ECB', $key2);
  	$de_state = openssl_decrypt($state, 'AES-128-ECB', $key2);
  	$de_city = openssl_decrypt($city, 'AES-128-ECB', $key2);
  	$de_street = openssl_decrypt($street, 'AES-128-ECB', $key2);
  	$de_building = openssl_decrypt($building, 'AES-128-ECB', $key2);
  	$de_delivery_name = openssl_decrypt($delivery_name, 'AES-128-ECB', $key2);

  	$cardh_li['country'] = openssl_decrypt($de_country, 'AES-128-ECB', $key);
  	$cardh_li['postcode']= openssl_decrypt($de_postcode, 'AES-128-ECB', $key);
  	$cardh_li['state'] = openssl_decrypt($de_state, 'AES-128-ECB', $key);
  	$cardh_li['city']= openssl_decrypt($de_city, 'AES-128-ECB', $key);
  	$cardh_li['street']= openssl_decrypt($de_street, 'AES-128-ECB', $key);
  	$cardh_li['building'] = openssl_decrypt($de_building, 'AES-128-ECB', $key);
  	$cardh_li['delivery_name']= openssl_decrypt($de_delivery_name, 'AES-128-ECB', $key);
}

function encript(){

global   $country,  $postcode,  $state,  $city,$street,$building,$delivery_name,$key2,$key,$cardh_li,$_POST,$_SESSION;

// echo $postcode;
//暗号の解読
$country=$_POST['country'];
    $postcode=$_POST['postcode'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $street=$_POST['street'];
    $building=$_POST['building'];
    $delivery_name=$_POST['delivery_name'];
    $key2=$_SESSION['users']['id'];

echo $postcode;

  	//暗号の解読1回目
  	$en_country = openssl_encrypt($country, 'AES-128-ECB', $key);
  	$en_postcode = openssl_encrypt($postcode, 'AES-128-ECB', $key);
  	$en_state = openssl_encrypt($state, 'AES-128-ECB', $key);
  	$en_city = openssl_encrypt($city, 'AES-128-ECB', $key);
  	$en_street = openssl_encrypt($street, 'AES-128-ECB', $key);
  	$en_building = openssl_encrypt($building, 'AES-128-ECB', $key);
  	$en_delivery_name = openssl_encrypt($delivery_name, 'AES-128-ECB', $key);

  	$country = openssl_encrypt($en_country, 'AES-128-ECB', $key2);
  	$postcode= openssl_encrypt($en_postcode, 'AES-128-ECB', $key2);
  	$state = openssl_encrypt($en_state, 'AES-128-ECB', $key2);
  	$city= openssl_encrypt($en_city, 'AES-128-ECB', $key2);
  	$street= openssl_encrypt($en_street, 'AES-128-ECB', $key2);
  	$building = openssl_encrypt($en_building, 'AES-128-ECB', $key2);
  	$delivery_name= openssl_encrypt($en_delivery_name, 'AES-128-ECB', $key2);

}


function encript2(){

global   $country,  $postcode,  $state,  $city, $street,$building,$delivery_name,$key2,$key,$cardh_li,$_POST,$_SESSION;

// echo $postcode;
//暗号の解読

$country=$_POST['country'];
$postcode=$_POST['postcode'];
$state=$_POST['prefecture'];
$city=$_POST['city'];
$street=$_POST['street'];
$building=$_POST['building'];
$delivery_name=$_POST['name'];
$key2=$_SESSION['welcome']['id'];

echo $postcode;

//暗号化一回目
      $en_country = openssl_encrypt($country, 'AES-128-ECB', $key);
      $en_postcode = openssl_encrypt($postcode, 'AES-128-ECB', $key);
      $en_state = openssl_encrypt($state, 'AES-128-ECB', $key);
      $en_city = openssl_encrypt($city, 'AES-128-ECB', $key);
      $en_street = openssl_encrypt($street, 'AES-128-ECB', $key);
      $en_building = openssl_encrypt($building, 'AES-128-ECB', $key);
      $en_delivery_name = openssl_encrypt($delivery_name, 'AES-128-ECB', $key);

      //暗号化2回目
      $country = openssl_encrypt($en_country, 'AES-128-ECB', $key2);
      $postcode = openssl_encrypt($en_postcode, 'AES-128-ECB', $key2);
      $state = openssl_encrypt($en_state, 'AES-128-ECB', $key2);
      $city = openssl_encrypt($en_city, 'AES-128-ECB', $key2);
      $street = openssl_encrypt($en_street, 'AES-128-ECB', $key2);
      $building = openssl_encrypt($en_building, 'AES-128-ECB', $key2);
      $delivery_name = openssl_encrypt($en_delivery_name, 'AES-128-ECB', $key2);

}

//changepassword.phpで使用中
function encript3(){

global   $country,  $postcode,  $state,  $city, $street,$building,$delivery_name,$key2,$key,$cardh_li,$_POST,$_SESSION;

// echo $postcode;
//暗号の解読


$postcode=$_POST['zipcode'];

$key2=$_SESSION['password']['users_id'];

//暗号化一回目

      $en_postcode = openssl_encrypt($postcode, 'AES-128-ECB', $key);

      //暗号化2回目

      $postcode = openssl_encrypt($en_postcode, 'AES-128-ECB', $key2);


}




?>
