
<?php
// � PHP 4.1.0 � ����� ������ ������� ������� ������������ $HTTP_POST_FILES 
// ������ $_FILES.

$uploaddir = '';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "���� ��������� � ��� ������� ��������.\n";
} else {
    echo "��������� ����� � ������� �������� ��������!\n";
}

echo '��������� ���������� ����������:';
print_r($_FILES);

print "</pre>";

?>
