<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
<body>
<?php

function example_pingDomain($domain){

    $starttime = microtime(true);
    $file      = @fsockopen($domain, 80, $errno, $errstr, 10);
    $stoptime  = microtime(true);
    $status    = 0;

    if (!$file) {
        $status = -1;  // Site is down

    } else {

        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}

/// ------ begin Servers ---------
date_default_timezone_set('America/Sao_Paulo');


echo "System date: ".date("d-m-Y H:i:s");
echo "<hr>Servers ...<br>";

$fr1="Down";
$fr2="Down";
$fr0="Down";
$rpi1="Down";

$fr1=example_pingDomain("192.168.2.1");
$fr2=example_pingDomain("192.168.2.2");
$fr0=example_pingDomain("192.168.2.3");
$rpi1=example_pingDomain("192.168.2.4");


echo "Status serverfr1: ".$fr1.".<br>";
echo "Status serverfr2: ".$fr2.".<br>";
echo "Status VM serverfr0: ".$fr0.".<br>";
echo "Status Load Balancer serverrpi1: ".$rpi1."";
/// ------ end Servers ---------


/// ------ begin pre requirements ---------
echo "<br><br>";
echo "<hr>Loading pre requirements.<br>";
$a = extension_loaded('zip'); // <- returns true.
$b = function_exists('zip_open'); // <- returns true.
$c = class_exists('ZipArchive', false); // <-returns false.
if (!extension_loaded("curl")) {
     header('Status: 500', true, 500);
     //echo 'cURL extension for PHP is not loaded! <br/> Add the following lines to your php.ini file: <br/> extension_dir = &quot;&lt;your-php-install-location&gt;/ext&quot; <br/> extension = php_curl.dll';
     die("Error on load cURL.". basename($_SERVER['PHP_SELF'],'.php')." Error Er000");
	 return;
  }else{
	  echo "Extension cURL: ok";
	  echo "<br>";
  }
if ($a){
	echo "Extension zip: ok";
	echo "<br>";
}
else{
	die("Error on load extension.". basename($_SERVER['PHP_SELF'],'.php')." Error Er001");
    echo "<br>";
}
if ($b){
	echo "Open files: ok";
	echo "<br>";
}else{
	die("Error on load open files.". basename($_SERVER['PHP_SELF'],'.php')." Error Er002");
    echo "<br>";
}
if ($c){
	echo "Libraries: ok";
	echo "<br>";
}
else{
	die("Error on load libraries.". basename($_SERVER['PHP_SELF'],'.php')." Error Er003");
    echo "<br>";
}
echo "<br>";
echo "get_loaded_extensions :";
print_r(get_loaded_extensions());
echo "<br>";
echo "libxml_use_internal_errors :";
var_dump(libxml_use_internal_errors(true));
/// ------ end pre requirements ---------


/// ------ begin general info  ---------
echo "<br><br>";
echo "<hr>General info<br>";
echo "Display Error = on: ";
ini_set('display_errors', 1);
error_reporting(E_ALL);
echo " End of errors.<br>";
echo "PHP version: ".phpversion()."<br>";
echo "Apache version: ".$_SERVER['SERVER_SOFTWARE']."";
/// ------ end general info  ---------


/// ------ begin email  ---------
echo "<br><br>";
echo "<hr>E-mail config.<br>";
if ( function_exists( 'mail' ) )
{
    echo 'mail() is available<br>';
}
else
{
    echo 'mail() has been disabled<br>';
}
/// ------ end mail  ---------



/// ------ begin PHP  -------
echo "<br><br>";
echo "<hr>PHP<br>";
//max_execution_time = 300
//max_input_time = 300
//max_input_vars = 10000
//memory_limit = 1024M
//post_max_size = 512M
//upload_max_filesize = 512M
//upload_tmp_dir = /tmp
//ini_set("max_execution_time",1200);

$max_execution_time = ini_get("max_execution_time");
$max_input_time = ini_get("max_input_time");
$max_input_vars = ini_get("max_input_vars");
$memory_limit = ini_get("memory_limit");
$post_max_size = ini_get("post_max_size");
$upload_max_filesize = ini_get("upload_max_filesize");
$upload_tmp_dir = ini_get("upload_tmp_dir");

echo "Permission "."<br>";
echo "Max script execution time: ".$max_execution_time."<br>";
echo "Max input time: ".$max_input_time."<br>";
echo "Max input variables: ".$max_input_vars."<br>";
echo "Memory limit for script execution: ".$memory_limit."<br>";
echo "Memory limit for form post: ".$post_max_size."<br>";
echo "Memory limit for upload files: ".$upload_max_filesize."<br>";
echo "Temp directory for upload files: ".$upload_tmp_dir." ";
/// ------ fim Configurações PHP  ---------

echo "<br>Change a value "."<br>";
echo "Max script execution time: ".$max_execution_time."<br>";
ini_set("max_execution_time",301);
$max_execution_time = ini_get("max_execution_time");
echo "Max script execution time: ".$max_execution_time."<br>";


/// ------ begin Data base tests  ---------
echo "<br><br>";
echo "<hr>Data base tests<br>";

spl_autoload_register(function($class) {
    include './DataBaseClasses/' . $class . '.php';
});

include './DataBaseClasses/Users.php';

echo "Users Object: ";
if($user = new Users()){
    echo "ok<br>";
}else{
    echo "Erro";
}
echo "Value of Users Object: ";
var_dump($user);

echo "<br><br>";



//include './DataBaseClasses/config.php';

$conn = mysqli_connect(HOST_, USER_, PASS_, BASE_);

echo "MySQL version: ".mysqli_get_server_info($conn)."<br>";

echo BASE_;

$user = new Users();

echo "<br>";
echo "We have :".$user->howMany("")->total." users <br>";
echo "Register user for tests.<br>";
$user->setName("Name xyz");
$user->setEmail("mail@server.com");
$user->setRole(1);
$user->insert();
echo "Now we have :".$user->howMany("")->total." users <br>";
/// ------ end Data base tests  ---------
?>


</body>
</html>
