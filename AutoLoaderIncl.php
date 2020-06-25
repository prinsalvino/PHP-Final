<?php
//this autoloader file includes all the files from the directory 
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $extention=".php";
    $fullPath=$className.$extention;

    include_once $fullPath;
    
   if(!file_exists($fullPath)){
	   return false;
   }
}
?>
