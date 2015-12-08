
<?php
if(isset($_POST) && !empty($_POST['NTable'])) {

            $json = json_decode($_POST['NTable'], TRUE);          
            $json = json_encode($json);
            file_put_contents('config.txt', $json);
            
        }

?>