<!-- ��� ����������� ������, enctype, ������ ���� ������ ������ ��� -->
<form enctype="multipart/form-data" action="http://e2015.tioo.ru/up_script.php" method="POST">

<select name='selecd'>
 <option value="css" sselected="selected">/</option>
 <option value="css">css</option>
</select>

    <!-- ���� MAX_FILE_SIZE ������ ���� ������� �� ���� �������� ����� -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- �������� �������� input ���������� ��� � ������� $_FILES -->
    ��������� ���� ����: <input name="userfile" type="file" /><br>
    <input type="submit" value="Send File" />
</form>