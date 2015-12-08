<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
</head>
<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require_once "simple_html_dom.php";



$url='http://censor.net.ua/';


$html = new simple_html_dom();   
$html->load_file($url);


$text = "";
foreach ($html->find('#w10 .panes .curpane article') as $item) {
  $text.= "<div class='article'>"; 
  if ($item->class == 'item type2') { $text.= "<a class='bold' "; }
  							   else { $text.= "<a "; }
  $text.=" href=http://censor.net.ua". $item->children(0)->find('h3 a', 0)->href. ">";
  $text.="<div class='time'>".$item->children(0)->find('time', 0)->innertext."</div>"; 
  $text.= $item->children(0)->find('h3 a', 0)->innertext;
  $text.= "</a> "; 
  $text.= $item->children(1)->innertext;
  $text.= "</div>";  
}
echo $text;

?>