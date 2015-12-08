
<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require_once "simple_html_dom.php";


$url='http://forbes.net.ua/news';


$html = new simple_html_dom();   
$html->load_file($url);



$text = "";
foreach ($html->find('.left_column2 div.newsitem1') as $item) {
  $text.= "<div class='article'>" . $item->innertext . "</div>";  
}

//target="_blank"


echo $text;

?>


