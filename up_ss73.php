

<form enctype="multipart/form-data" action="up_ss73.php" method="POST">

 <select name='selecd' size="3">
 <option value="zero" sselected="selected">/</option>
 <option value="css">css</option>
  <option value="img">img</option>
 </select>

    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />

    <input name="userfile" type="file" /><br>
    <input type="submit" value="Send" />
</form>

<?php


if(isset($_FILES['userfile']['name']))
{

$homedir='/var/www/html/';
$uploaddir = $_POST['selecd'];
switch($uploaddir)
    {
      case "css": $uploaddir = $homedir.'css/'; break;
      case "img": $uploaddir = $homedir.'img/'; break;
      default:  $uploaddir = $homedir ; break;
    }


$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "The file is valid and has been successfully loaded.\n";
} else {
    echo "Possible attacks via file download!\n";
}
 /**/
echo '<pre>';
echo 'Dir '.$uploaddir;
echo '<pre>';
print_r($_FILES);
print "</pre>";
}
   

?>