<? 

if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['subject'])) {$subject = $_POST['subject'];}
if (isset($_POST['text_message'])) {$text_message = $_POST['text_message'];}


$name = stripslashes($name);

$subject = stripslashes($subject);



$name = htmlspecialchars($name);

$subject = htmlspecialchars($subject);


$email = stripslashes($email);

$text_message = stripslashes($text_message);


$email = htmlspecialchars($email);

$text_message = htmlspecialchars($text_message);






$address = "boyrd3@mail.ru";

$message = "".$text_message."\nÑ óâàæåíèåì, ".$name."\nÌîé êîíòàêòíûé e-mail: ".$email."";

$verify = mail($address,$subject,$message,"Content-type:text/plain; Charset=windows-1251\r\n");


if ($verify == 'true')
{
echo "
<link rel='stylesheet' type='text/css' href='style.css'/>
<table width='600' height='300' align='center'>
 <tr>
 <td class='warning_table' width='220' align='center' valign='middle'>
 
 <img align='center' src='images/warning.png'>
 <div align='center' class='warning_font_big'>Ïîçäðàâëÿåì!</div>
 <div align='center' class='warning_font' align='left'>Âàøå ïèñüìî äîñòàâëåíî àäìèíèñòðàòîðó. ×åðåç íåêîòîðîå âðåìÿ Âû ïîëó÷èòå îòâåò!</div>
 <p align='center'><a href='index.html' class='all_links'>Âåðíóòüñÿ íàçàä</a></div></p>
 
 </td>
 </tr>
 </table>";
}
else 
{
echo "
<link rel='stylesheet' type='text/css' href='style.css'/>
<table width='600' height='300' align='center'>
 <tr>
 <td class='warning_table' width='220' align='center' valign='middle'>
 
 <img align='center' src='images/warning.png'>
 <div align='center' class='warning_font_big'>ÎØÈÁÊÀ!!!</div>
 <div align='center' class='warning_font' align='left'>Âàøå ïèñüìî íå äîñòàâëåíî. Ïîâòîðèòå îòïðàâêó íåìíîãî ïîçæå!</div>
 <p align='center'><a href='index.html' class='all_links'>Âåðíóòüñÿ íàçàä</a></div></p>
 
 </td>
 </tr>
 </table>";
}
?>