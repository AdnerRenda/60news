
<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require_once "simple_html_dom.php";



$url='http://unian.ua';


$html = new simple_html_dom();   
$html->load_file($url);



$text = "";
foreach ($html->find('.main_all_news li') as $item) {
  $text.= "<div class='article'>" . $item->innertext . "</div>";  
}
echo $text;

?>