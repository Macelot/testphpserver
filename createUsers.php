<meta charset="UTF-8">
<?php
//This example create 100 users

include './DataBaseClasses/config.php';
$mysqli=new mysqli(HOST,USER,PASS,BASE,PORT);
$names = array("Name1","Name2","Name3","Name4","NameN");
$passw = array("123abc","456def","789ghi","123jkl","456mno");
$salar = array("1000.00","2500.00","999.50","4999.00");
$sex = array("Male","Female");
echo "<br>";
$time_start = microtime(true);

echo "Start ........................".$time_start."<br>";
for($i=1;$i<=100;$i++){
	$kk=rand(0,4);
	$comando="INSERT INTO `tblUser` (
	`tblUser_name`,
	`tblUser_email`,
	`tblUser_password`,
	`tblUser_salary`,
	`tblUser_picture`,
	`tblUser_idManager_tblUser`,
	`tblUser_IdRole_tblRole`,
	`tblUser_notes`,
	`tblUser_sex`,
	`tblUser_day`,
	`tblUser_breed`,
	`tblUser_version`,
	`tblUser_registerDate`,
	`tblUser_registerUser`)
	VALUES ('".$names[$kk]."','".$names[$kk]."@server.com','".$passw[$kk]."', '".$salar[rand(0,3)]."', NULL, NULL, NULL, NULL, '".$sex[rand(0,1)]."', NULL, NULL, '1', CURRENT_TIMESTAMP, '1');";
	if($mysqli->query($comando)){
	echo "Register ".$i." ok <br>";
	}else{
	echo "Error ".$mysqli->error;
	}
}

$time_end = microtime(true);

echo "End ".$time_end;

$time = $time_end - $time_start;

echo "<br>Time elapsed ". $time;


?>
