<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require_once "simple_html_dom.php";

function XPATHtoHTML($query,$url)
{
$doc = new DOMDocument();
$doc->loadHTML( file_get_html($url));
$xpath = new DOMXpath($doc);

$node=$xpath->query($query)->item(0);

$doc_new = new DOMDocument();
$node=$doc_new->importNode($node, true);
$node->setAttribute( 'style' , 'width:100% ' );
$doc_new->appendChild($node);
return $doc_new->saveHTML();
}


//$query='//html/body/div[1]/div[2]/div[6]/div[6]/div[1]';
//$url='http://forbes.ua/news';


$query='//html/body/div[1]/div/div[2]/section[2]/div[2]/div[1]';
$url='http://censor.net.ua/';


$xdoc = new DOMDocument();
$xdoc->loadHTML(file_get_html($url));

$xpath = new DOMXpath($xdoc);

$node1=$xpath->query($query)->item(0);

$xdoc_new = new DOMDocument();
$node1=$xdoc_new->importNode($node1, true);

$xdoc_new->appendChild($node1);

echo $xdoc_new->saveHTML();


?>