<meta charset="UTF-8">
<?php

include './DataBaseClasses/config.php';
$mysqli=new mysqli(HOST,USER,PASS,BASE,PORT);

$comando="truncate `tblUser`";
if($mysqli->query($comando)){
    echo "Ok";
}else{
    echo "Error ".$mysqli->error;
}

?>
