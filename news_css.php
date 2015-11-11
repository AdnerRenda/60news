
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<link type="text/css" rel="stylesheet" href="css/forbs.css"> 
</head>
<body>
<div class='forbs'>
<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require_once "simple_html_dom.php";


$url='http://forbes.net.ua/news';

$text_doc = file_get_html($url);
$text_doc = substr($text_doc, strpos($text_doc, 'newsitem1')-14,strlen($text_doc)-1);
$text_doc = substr($text_doc, 0, strpos($text_doc, 'forbes_pager'));

$h1 = "<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">";
$h1 = $h1."<link type=\"text/css\" href=\"http://fr.ill.in.ua/static/css/style.css?v=31\" rel=\"stylesheet\">";
$h1 = "<head> ".$h1." </head> ";

$text_doc = "<html>".$h1."<body>".$text_doc."</body>"."</html>";

$doc = new DOMDocument();
$doc->loadHTML($text_doc);




echo $text_doc;

?>


</div>
</body>