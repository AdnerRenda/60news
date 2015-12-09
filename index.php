<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

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
function init_tm()
{
for (var index = 0; index < tm.length; ++index) 
 {

   
if (window.XMLHttpRequest)
            {tm[index].xhttp = new XMLHttpRequest();} else 
            {tm[index].xhttp = new ActiveXObject("Microsoft.XMLHTTP");}
tm[index].waiting=false;

tm[index].xhttp.index=index;
// xhttp 
tm[index].xhttp.onreadystatechange=function()
  {
   if ( this.readyState==4)
	{
	   if ((this.status==200)&&(this.responseText.length > 5))
	   {
       tm[this.index].div.html(this.responseText);
       tm[this.index].ldiv.html('');
       tm[this.index].c = tm[this.index].s;
	     tm[this.index].waiting=false;
	   } 
		else // repeat request 
		{
//		setInterval(function(){ 
		tm[this.index].xhttp.open("POST",tm[this.index].link,true); tm[this.index].xhttp.send();
//},1000);
		}
  }
 }
}
}
//-------------------------------
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
 
	tm[index].tdiv.html(minutes+':'+seconds);

	if ( time==0 ) { tm[index].xhttp.open("POST",tm[index].link,true); 
                   tm[index].xhttp.send(); 
                   tm[index].waiting=true;  
                   tm[index].ldiv.html('<i class="fa fa-refresh fa-spin"></i>');}
}
}
}
//-------------------------------
setInterval(function(){ Timer(tm); },1000);


</script>

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Марка и переключение сгруппированы для лучшего мобильного дисплея -->
    <div class="navbar-header">
            <a class="navbar-brand" href="#">60 NEWS</a>
     </div>      
     
     <a href="#myModal"  class="btn pull-right" data-toggle="modal"><i class="glyphicon glyphicon-cog"></i></a> 
     <a href="#" onclick="make_view();"  class="btn pull-right" ><i class="glyphicon glyphicon-bookmark"></i></a> 
     <a href="/rates.html" target="_blank" class="btn pull-right" data-toggle="modal"><i class="fa fa-line-chart"></i></a> 
    

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
    <button class="close" onclick="save_table(NTable);" data-dismiss="modal">×</button>
    Настройки
  </div>
  <div class="modal-body">


<table id="set_table" class="table" >
  <thead>
    <tr>
      <th>№ п/п</th>
      <th></th>
      <th></th>
      <th>Источник</th>
      <th>Колонка</th>
      <th>Обновление</th>
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
      <td><input type="text" size="4" placeholder="1 м" class="input-small"></td>
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




</body>