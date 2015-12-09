
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


//http://xdan.ru/avtorizacija-na-sajte-pri-pomoshhi-curl-php.html
function request($url,$post = 0,$param3='POST'){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url ); // отправляем на
  //curl_setopt($ch, CURLOPT_REFERER, $url);// откуда пришли на эту страницу
  curl_setopt($ch, CURLOPT_HEADER, 0); // пустые заголовки
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // следовать за редиректами
  curl_setopt($ch, CURLOPT_UNRESTRICTED_AUTH, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);// таймаут4

  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($ch, CURLOPT_VERBOSE, true);
  
  
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (Windows; U; Windows NT 5.0; En; rv:1.8.0.2) Gecko/20070306 Firefox/1.0.0.4");
  curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookie.txt'); // сохранять куки в файл
  curl_setopt($ch, CURLOPT_COOKIEFILE,  dirname(__FILE__).'/cookie.txt');
  
  if ( $param3 == 'POST' ) curl_setopt($ch, CURLOPT_POST, 1); // использовать данные в post
  if ( $param3 == 'GET' ) curl_setopt($ch, CURLOPT_POST, 0); // использовать данные в post
  if ( $param3 == 'BINARYTRANSFER' ) curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);  
  if ($post)  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  $data = curl_exec($ch);

  //echo "<br>CURL <br>";
  //foreach ( curl_getinfo($ch) as $key => $value ) { print_r( $key); echo " =  "; print_r($value); echo "<br>";}
  //echo "<br>CURL END <br>";
  
  curl_close($ch);
  return $data;
}

require_once "simple_html_dom.php";

// Authorization
// сollect data
  $url='https://forums.sumy.ua/index.php?login';
	$html = new simple_html_dom(); 
	$html = str_get_html(request($url));

	$auth = array('login'=>'forbes','password'=>'forbes654321','register'=>'0');
	foreach ($html->find('input[type="hidden"]') as $item) {
	$auth[$item->getAttribute('name')]=$item->getAttribute('value');}
// print_r($auth);

//send data
$url='https://forums.sumy.ua/index.php?login/login';
$html = str_get_html(request($url,$auth,"POST"));





$t_url='/index.php?threads/245313/';
$url='https://forums.sumy.ua'.$t_url;
$html = str_get_html(request($url,0,'GET'));

echo 'send data ========================================= <br>';
$auth = array();

$auth['message_html']='<p>777<br></p>';
$auth['_xfRequestUri']=$t_url;
$auth['_xfNoRedirect']='1';
$auth['_xfResponseType']='json';

foreach ($html->find('input[type="hidden"]') as $item) {
$auth[$item->getAttribute('name')]=$item->getAttribute('value');}
request($url.'add-reply',$auth,"POST");
//request('https://forums.sumy.ua/deferred.php',$auth,"POST");

print_r($auth);
echo $html;


$url='https://forums.sumy.ua/index.php?threads/244696/';
$html = str_get_html(request($url,0,'GET'));
echo $html;


//echo 'LogOut========================================= <br>';

//LogOut
//collect data 
//$url='https://forums.sumy.ua/index.php?logout';
//$html = str_get_html(request($url,0,'GET'));

//echo 'collect data ========================================= <br>';
//echo $url;
//echo $html;

//$url='https://forums.sumy.ua/'.$html->find('a.LogOut',0)->getAttribute('href');
//$html = str_get_html(request($url,0,'GET'));

//echo 'send ========================================= <br>';
//echo $url;
//echo $html;

?>



  
