
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

	$url='http://www.udinform.com/index.php?option=com_dealingquotation&task=forexukr&Itemid=59';

	// Date for authorization
	$html = new simple_html_dom(); 
	$html = str_get_html(request($url));

	//$auth = array('username'=>'AlexND','passwd'=>'mprssb30');
	$auth = array('username'=>'Kadiz20','passwd'=>'kadiz2035');
	foreach ($html->find('input[type="hidden"]') as $item) {
	$auth[$item->getAttribute('name')]=$item->getAttribute('value');}

	// print_r($auth);

	
	//for generation graph (img)
	$url='http://www.udinform.com/index.php?option=com_dealingquotation&task=forexukr&Itemid=59';
	request($url,$auth);

	//then quickload graph (img)
	$url='http://www.udinform.com/quotation.php?option=com_dealingquotation&task=get_graph_usd_uah&quotedate=&quotedatefinish=&rnd=0';
	file_put_contents("usd.jpg", request($url,0,true));  
	$url='http://www.udinform.com/quotation.php?option=com_dealingquotation&task=get_graph_eur_uah&quotedate=&quotedatefinish=&rnd=0';
	file_put_contents("eur.jpg", request($url,0,true));  
	$url='http://www.udinform.com/quotation.php?option=com_dealingquotation&task=get_graph_rur_uah&quotedate=&quotedatefinish=&rnd=0';
	file_put_contents("rur.jpg", request($url,0,true));  
    
   echo "ok"; 
?>


