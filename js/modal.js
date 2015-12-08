var loading_settings = false ;

function load_table_serv(STable)
{
  loading_settings = true;

  $.getJSON("/config.txt",function (data){

    var rows_count = data.length;      
    var cols_count = 3;      
    var indx,jndx;
    
    for (indx = 0; indx < rows_count; indx++) { 
    STable[indx] = new Array();   
    for (jndx = 0; jndx < cols_count; jndx++) { STable[indx][jndx]=data[indx][jndx]; }   
     }
  
}).success(function() { 
  
  //alert("Настройки загружены"); 
  loading_settings= false; 

  load_table(STable); 

});    
}

function load_table(STable)
{   
     
    var rows_count = STable.length;      
    var indx;
    clear_table();

    for (indx = 0; indx < rows_count; indx++) {
        
         $el=addtr().children('td');   
                
         $el.eq(3).children('select').val(STable[indx][0]);
         $el.eq(4).children('input').val(STable[indx][1]);
         $el.eq(5).children('input').val(STable[indx][2]);      
    }   

}

function save_table(STable)
{   
    var $rows=$('#set_table tbody tr');    
    var rows_count = $rows.length;        
    var indx;
    STable.length=0;    

    for (indx = 1; indx < rows_count; indx++) {
         $el=$rows.eq(indx).children('td');   
         
         STable[indx-1] = new Array(); 
         STable[indx-1][0]=$el.eq(3).children('select').val();
         STable[indx-1][1]=$el.eq(4).children('input').val();
         STable[indx-1][2]=$el.eq(5).children('input').val();      
    }
$.post("/json.php",{'NTable':JSON.stringify(STable)},function () {} );
 
    
}

function clear_table()
{
  var $rows=$('#set_table tbody tr');    
    var rows_count = $rows.length;
    var indx;
    
    for (indx = 1; indx < rows_count; indx++) {
         $rows.eq(indx).remove();
    }

}

 function refresh_table()
 {
var $rows=$('#set_table tbody tr');    
var rows_count = $rows.length;

// hide/show button delete 
if (rows_count==2) {$rows.eq(1).children('td').eq(6).children('button').hide();} 
              else {$rows.eq(1).children('td').eq(6).children('button').show();}

var indx;
for (indx = 1; indx < rows_count; indx++) {
$el=$rows.eq(indx);
$eltd=$el.children('td');   

// hide/show button up/down
  if (indx==1)            {$eltd.eq(1).children('button').hide();} 
                     else {$eltd.eq(1).children('button').show();}
  if (indx==rows_count-1) {$eltd.eq(2).children('button').hide();} 
                     else {$eltd.eq(2).children('button').show();}
 
  $el.attr('id','tr'+indx); 
  $eltd.eq(0).html(indx);
}

 }

 function addtr()
{   
   var $clone = $("#tr0").clone(true);
   var rows = $('#set_table tbody tr').length;

   $clone.attr('id','tr'+rows);
   $clone.children('td').eq(0).html(rows);
   $clone.children('td').eq(1).children('button').attr('onclick','uptr($(this).parents("tr").attr("id").substring(2));');
   $clone.children('td').eq(2).children('button').attr('onclick','downtr($(this).parents("tr").attr("id").substring(2));');
   $clone.children('td').eq(6).children('button').attr('onclick','remtr($(this).parents("tr").attr("id").substring(2));');

   $clone.appendTo("#set_table"); 
   refresh_table();
   $clone.show();
   return $clone; 
 }
function downtr(ntr)
{
  $el=$('#set_table #tr'+ntr);
  $el.insertAfter($el.next());
  refresh_table();

}
function uptr(ntr)
{
  $el=$('#set_table #tr'+ntr);
  $el.insertBefore($el.prev());
  refresh_table();

}


 function remtr(ntr)
{
  $('#set_table #tr'+ntr).remove();
  refresh_table();  
}
