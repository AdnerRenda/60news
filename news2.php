<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require_once "simple_html_dom.php";


$url='http://forbes.net.ua/news';

$text_doc = file_get_html($url);
$text_doc = substr($text_doc, strpos($text_doc, 'newsitem1')-14,strlen($text_doc)-1);
$text_doc = substr($text_doc, 0, strpos($text_doc, 'forbes_pager'));

$text_doc = $text_doc;

$doc = new DOMDocument();
$doc->loadHTML($text_doc);




echo $text_doc;

?>