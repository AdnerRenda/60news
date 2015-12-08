<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" action="http://e2015.tioo.ru/up_script.php" method="POST">

<select name='selecd'>
 <option value="css" sselected="selected">/</option>
 <option value="css">css</option>
</select>

    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" /><br>
    <input type="submit" value="Send File" />
</form>