
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


//http://xdan.ru/avtorizacija-na-sajte-pri-pomoshhi-curl-php.html
function request($url,$post = 0,$binar=false){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url ); // отправляем на
  curl_setopt($ch, CURLOPT_REFERER, $url);// откуда пришли на эту страницу
  curl_setopt($ch, CURLOPT_HEADER, 0); // пустые заголовки
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // следовать за редиректами
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);// таймаут4

  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (Windows; U; Windows NT 5.0; En; rv:1.8.0.2) Gecko/20070306 Firefox/1.0.0.4");
  curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookie.txt'); // сохранять куки в файл
  curl_setopt($ch, CURLOPT_COOKIEFILE,  dirname(__FILE__).'/cookie.txt');
  curl_setopt($ch, CURLOPT_POST, $post!==0 ); // использовать данные в post
  if($binar) curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);  
  if($post)  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

require_once "simple_html_dom.php";

	// Date for authorization
  $url='https://forums.sumy.ua/index.php?login';
	$html = new simple_html_dom(); 
	$html = str_get_html(request($url));

	$auth = array('login'=>'Kadiz','password'=>'Kadiz789+','register'=>'0');
	foreach ($html->find('input[type="hidden"]') as $item) {
	$auth[$item->getAttribute('name')]=$item->getAttribute('value');}

 print_r($auth);
$url='https://forums.sumy.ua/index.php?login';
  $html = str_get_html(request($url,$auth));
echo $html;
?>



  
