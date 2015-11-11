<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<!-- <link type="text/css" rel="stylesheet" href="http://unian.ua/css/style.css?rand=393"> -->
<!--<link type="text/css" href="http://fr.ill.in.ua/static/css/style.css?v=31" rel="stylesheet"> -->
<link type="text/css" href="css/unian.css" rel="stylesheet">
<link type="text/css" href="css/forbs.css" rel="stylesheet">
<link type="text/css" href="css/bootstrap.css" rel="stylesheet">
<link type="text/css" href="css/style.css" rel="stylesheet">

<script>

var tm = 
[
{"c":"2",                // íà÷àëüíîå âðåìÿ òàéìåðà
  "s":"60",               // âðåìÿ â ñåêóíäàõ îáíîâëåíèÿ íîâîñòåé
  "waiting":false,      // îæèäàåò ëè îòâåòà   
  "div": "news1",       // id div äëÿ íîâîñòåé
  "tdiv":"news1_tm",    // id div òàéìåðà
  "ldiv":"news1_load",  // id div äëÿ îòîáðàåíèÿ âðåìåííîãî ñîîáùåíèÿ ïðè çàãðóçêå íîâîñòåé
  "link":"news.php",    // àäðåñ äëÿ çàïðîñà íîâîñòåé 
  "xhttp":null},
 {"c":"2","s":"60","waiting":false,"div": "news2","tdiv":"news2_tm","ldiv":"news2_load", "link":"news2.php","xhttp":null}     
];

function init_tm()
{
for (var index = 0; index < tm.length; ++index) 
 {

tm[index].div  = document.getElementById(tm[index].div);
tm[index].tdiv = document.getElementById(tm[index].tdiv);
tm[index].ldiv = document.getElementById(tm[index].ldiv);

if (window.XMLHttpRequest){  tm[index].xhttp =new XMLHttpRequest();} else { tm[index].xhttp =new ActiveXObject("Microsoft.XMLHTTP");}

tm[index].xhttp.index=index;

tm[index].xhttp.onreadystatechange=function()
  {
   if ( this.readyState==4)
	{
	   if ( this.status==200)
	   {
       tm[this.index].div.innerHTML=this.responseText;
       tm[this.index].ldiv.innerHTML=' ';
       tm[this.index].c = tm[this.index].s;
	   tm[this.index].waiting=false;
	   } 
		else // ïîâòîð çàïðîñà 
		{
//		setInterval(function(){ 
		tm[this.index].xhttp.open("POST",tm[this.index].link,true); tm[this.index].xhttp.send();
//},1000);
		}
  }
 }
}
}

function Timer() {

var time;
for (var index = 0; index < tm.length; ++index) {
if (!tm[index].waiting)
{
	time=tm[index].c--;

    var minutes = parseInt(time / 60);
    if ( minutes < 1 ) minutes = 0;
    if ( minutes < 10 ) minutes = '0'+minutes;

	var seconds = parseInt(time - minutes * 60);;
    if ( seconds < 10 ) seconds = '0'+seconds;
 
	tm[index].tdiv.innerHTML = minutes+':'+seconds;

	if ( time==0 ) { tm[index].xhttp.open("POST",tm[index].link,true); tm[index].xhttp.send(); tm[index].waiting=true;  tm[index].ldiv.innerHTML='Loading ...';}
}
}

}
setInterval(function(){ Timer(tm); },1000);


</script>
<style type="text/css">
 .main_all_news { margin-left: 10%; width:100%}
</style>

</head>
<body onload=" init_tm(); ">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Марка и переключение сгруппированы для лучшего мобильного дисплея -->
    <div class="navbar-header">
            <a class="navbar-brand" href="#">60NEWS</a>
     </div>       
    <i class="glyphicon glyphicon-plus"></i>    

    </div><!-- /.container-fluid -->
</nav>

<div style="margin-left: 5%; float:left ; width:35%">
<div> <div style="display:inline-block; width:10%" id='news1_tm'>00:00</div> <div style="display:inline-block;" div>Unian</div> </div>
<div style=" height:10px;" id='news1_load'></div>
<div id='news1' class='unian'></div>
</div>

<div  style="margin-left: 45%;margin-right: 5%;  width:50%">
<div> <div style="display:inline-block; width:10%" id='news2_tm'>00:00</div> <div style="display:inline-block;" div>Forbs</div> </div>
<div style=" height:10px;" id='news2_load'></div>
<div id='news2' class='forbs'></div>
</div>


</body>