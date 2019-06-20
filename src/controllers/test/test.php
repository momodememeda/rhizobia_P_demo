<?php



include '/Users/momo/PhpstormProjects/rhizobia_P_demo/vendor/autoload.php';

use Security\SecurityUtil;


$single=SecurityUtil::getInstance();
$single->initAESConfig("202cb962ac59075b964b07152d234b70");
$pwd=$single->createSecretKey('12345');
echo $single->aesEncrypt('hello wrld',$pwd);
echo "\n";


$single->initAESConfig("83781e0ac5ce43763b689e26ba44c20a");
$pwd=$single->createSecretKey('12345');
echo $single->aesEncrypt('hello wrld',$pwd);
echo "\n";


echo $single->aesEncrypt('hello wrld',$pwd);
echo "\n";


$double=new SecurityUtil();
$double->initAESConfig("250cf8b51c773f3f8dc8b4be867a9a02");
$pwdDouble=$double->createSecretKey('12345');
echo $double->aesEncrypt('hello wrld',$pwdDouble);




?>