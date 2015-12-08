<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<<<<<<< HEAD

<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link type="text/css" href="css/style.css" rel="stylesheet">
<title>60 News</title> 
<script>
var NTable = new Array;
var NewsLink = { "Unian":"news0.php","Forbs":"news02.php","Censor":"news03.php"};
var NewsClass = { "Unian":"unian","Forbs":"forbs","Censor":"censor"};
var tm = [];

function make_view()
{

var temp_tm = new Array;
var count = NTable.length;      
temp_tm.length = count;
var indx;

for (indx = 0; indx < count; indx++) {
temp_tm[indx] = new Array();  
temp_tm[indx].c = 1 // default stat time
temp_tm[indx].s = NTable[indx][2]*60;
temp_tm[indx].link = NewsLink[NTable[indx][0]];
}

//------------
var $news = $("#news_container > div.news");

var count_max = Math.max($news.length,temp_tm.length);
count = count_max - Math.min($news.length,temp_tm.length);

if (count !== 0){
  if (temp_tm.length == count_max){
        for (indx = 0; indx < count; indx++) { 
          $("#news_templ").clone(true).removeAttr("id").addClass('news').appendTo("#news_container");}} else {
        for (indx = 0; indx < count; indx++) { 
          $news.eq(count_max-indx-1).remove();  }}}


//------------ 
count = NTable.length;        
$news = $("#news_container > div.news");
var $el;
for (indx = 0; indx < count; indx++) 
  { 
  $el=$news.eq(indx);

  temp_tm[indx].div  = $el.find(".news_body");         // element div for news 
  temp_tm[indx].div.attr('class',"news_body " + NewsClass[NTable[indx][0]]); 
  temp_tm[indx].tdiv = $el.find(".news_timer");       // element div for timer 
  temp_tm[indx].ndiv = $el.find(".news_title");       // element div for title 
  temp_tm[indx].ndiv.html(NTable[indx][0]);
  temp_tm[indx].ldiv = $el.find(".news_loader");      // element div for loader

  

  $news.eq(indx).width( NTable[indx][1]);
  $news.eq(indx).show();
  
  }



tm = temp_tm;
init_tm();
}

//-------------------------------
=======
<!-- <link type="text/css" rel="stylesheet" href="http://unian.ua/css/style.css?rand=393"> -->
<!--<link type="text/css" href="http://fr.ill.in.ua/static/css/style.css?v=31" rel="stylesheet"> -->
<link type="text/css" href="css/unian.css" rel="stylesheet">
<link type="text/css" href="css/forbs.css" rel="stylesheet">
<link type="text/css" href="css/bootstrap.css" rel="stylesheet">
<link type="text/css" href="css/style.css" rel="stylesheet">

<script>

var tm = 
[
{"c":"2",                // начальное время таймера
  "s":"60",               // время в секундах обновления новостей
  "waiting":false,      // ожидает ли ответа   
  "div": "news1",       // id div для новостей
  "tdiv":"news1_tm",    // id div таймера
  "ldiv":"news1_load",  // id div для отобраения временного сообщения при загрузке новостей
  "link":"news.php",    // адрес для запроса новостей 
  "xhttp":null},
 {"c":"2","s":"60","waiting":false,"div": "news2","tdiv":"news2_tm","ldiv":"news2_load", "link":"news2.php","xhttp":null}     
];

>>>>>>> 47351cae0cca169ea6b4395c215c226dd36f07cf
function init_tm()
{
for (var index = 0; index < tm.length; ++index) 
 {

<<<<<<< HEAD
   
if (window.XMLHttpRequest)
            {tm[index].xhttp = new XMLHttpRequest();} else 
            {tm[index].xhttp = new ActiveXObject("Microsoft.XMLHTTP");}
tm[index].waiting=false;

tm[index].xhttp.index=index;
// xhttp 
=======
tm[index].div  = document.getElementById(tm[index].div);
tm[index].tdiv = document.getElementById(tm[index].tdiv);
tm[index].ldiv = document.getElementById(tm[index].ldiv);

if (window.XMLHttpRequest){  tm[index].xhttp =new XMLHttpRequest();} else { tm[index].xhttp =new ActiveXObject("Microsoft.XMLHTTP");}

tm[index].xhttp.index=index;

>>>>>>> 47351cae0cca169ea6b4395c215c226dd36f07cf
tm[index].xhttp.onreadystatechange=function()
  {
   if ( this.readyState==4)
	{
<<<<<<< HEAD
	   if ((this.status==200)&&(this.responseText.length > 5))
	   {
       tm[this.index].div.html(this.responseText);
       tm[this.index].ldiv.html('');
       tm[this.index].c = tm[this.index].s;
	     tm[this.index].waiting=false;
	   } 
		else // repeat request 
=======
	   if ( this.status==200)
	   {
       tm[this.index].div.innerHTML=this.responseText;
       tm[this.index].ldiv.innerHTML=' ';
       tm[this.index].c = tm[this.index].s;
	   tm[this.index].waiting=false;
	   } 
		else // повтор запроса 
>>>>>>> 47351cae0cca169ea6b4395c215c226dd36f07cf
		{
//		setInterval(function(){ 
		tm[this.index].xhttp.open("POST",tm[this.index].link,true); tm[this.index].xhttp.send();
//},1000);
		}
  }
 }
}
}
<<<<<<< HEAD
//-------------------------------
function Timer() {

var time;

=======

function Timer() {

var time;
>>>>>>> 47351cae0cca169ea6b4395c215c226dd36f07cf
for (var index = 0; index < tm.length; ++index) {
if (!tm[index].waiting)
{
	time=tm[index].c--;

    var minutes = parseInt(time / 60);
    if ( minutes < 1 ) minutes = 0;
    if ( minutes < 10 ) minutes = '0'+minutes;

	var seconds = parseInt(time - minutes * 60);;
    if ( seconds < 10 ) seconds = '0'+seconds;
 
<<<<<<< HEAD
	tm[index].tdiv.html(minutes+':'+seconds);

	if ( time==0 ) { tm[index].xhttp.open("POST",tm[index].link,true); 
                   tm[index].xhttp.send(); 
                   tm[index].waiting=true;  
                   tm[index].ldiv.html('<i class="fa fa-refresh fa-spin"></i>');}
}
}
}
//-------------------------------
=======
	tm[index].tdiv.innerHTML = minutes+':'+seconds;

	if ( time==0 ) { tm[index].xhttp.open("POST",tm[index].link,true); tm[index].xhttp.send(); tm[index].waiting=true;  tm[index].ldiv.innerHTML='Loading ...';}
}
}

}
>>>>>>> 47351cae0cca169ea6b4395c215c226dd36f07cf
setInterval(function(){ Timer(tm); },1000);


</script>
<<<<<<< HEAD

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- РњР°СЂРєР° Рё РїРµСЂРµРєР»СЋС‡РµРЅРёРµ СЃРіСЂСѓРїРїРёСЂРѕРІР°РЅС‹ РґР»СЏ Р»СѓС‡С€РµРіРѕ РјРѕР±РёР»СЊРЅРѕРіРѕ РґРёСЃРїР»РµСЏ -->
    <div class="navbar-header">
            <a class="navbar-brand" href="#">60 NEWS</a>
     </div>      
     <a href="#myModal"  class="btn pull-right" data-toggle="modal"><i class="glyphicon glyphicon-cog"></i></a> 
     <a href="#" onclick="make_view();"  class="btn pull-right" ><i class="glyphicon glyphicon-bookmark"></i></a> 
     
    

    </div><!-- /.container-fluid -->
</nav>
<div id="news_container">




<!-- templ for news (always hide) -->
<div id='news_templ' style="display:none">
<div class='news_header'> 
<div class='news_timer'  >00:00</div> 
<div class='news_title'></div> 
<div class='news_loader' ></div>
</div>
<div class='news_body' ></div>
</div>


<!--          MODAL       -->
<div id="myModal" class="modal" >
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
    <button class="close" onclick="save_table(NTable);" data-dismiss="modal">Г—</button>
    РќР°СЃС‚СЂРѕР№РєРё
  </div>
  <div class="modal-body">


<table id="set_table" class="table" >
  <thead>
    <tr>
      <th>в„– Рї/Рї</th>
      <th></th>
      <th></th>
      <th>РСЃС‚РѕС‡РЅРёРє</th>
      <th>РљРѕР»РѕРЅРєР°</th>
      <th>РћР±РЅРѕРІР»РµРЅРёРµ</th>
    </tr>
  </thead>

  <tbody>
    <tr id='tr0' style='display:none'>
      <td>0</td>
      <td>
      <button href="#" class="btn" onclick="uptr();"><i class="glyphicon glyphicon-chevron-up"> </i></button>
      </td>
      <td>
      <button href="#" class="btn" onclick="downtr();"><i class="glyphicon glyphicon-chevron-down"> </i></button>
      </td>
    
      <td>
      <select >
        <option>Unian</option>
        <option>Forbs</option>
        <option>Censor</option>
      </select>
      </td>
      <td><input type="text" size="4" placeholder="300px" class="input-small"></td>
      <td><input type="text" size="4" placeholder="1 Рј" class="input-small"></td>
      <td><button href="#" class="btn" onclick="deltr();"><i class="glyphicon glyphicon-remove"> </i></button></td>
      </tr>
    
  </tbody>
</table>
</div>
<div class="modal-footer">
<button href="#" class="btn" onclick="addtr();"><i class="glyphicon glyphicon-plus"> </i> Add </button>
</div>
</div>
</div>
</div>
<!-- end modal -->



     

<!-- javascript -->
  <script src="js/modal.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
  load_table_serv(NTable);
  

  var timerId = setTimeout(function wait_settings(){


  if (!loading_settings){make_view();}
  else { timerId = setTimeout(wait_settings(), 2000);}}, 2000);

});
</script>


=======
<style type="text/css">
 .main_all_news { margin-left: 10%; width:100%}
</style>

</head>
<body onload=" init_tm(); ">

<header> 

<div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a href="./" data-type="rd-navbar-brand">60news </a>
          </h1>
        </div>

        <div class="text-right">

          </div>
      </div>
</header>

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
>>>>>>> 47351cae0cca169ea6b4395c215c226dd36f07cf


</body>