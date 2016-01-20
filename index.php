<?php 
header("Content-Type: text/html; charset=utf-8");

require_once 'config.php';
require_once 'ACore.php';

if($_GET['option']) {
    $class = trim(strip_tags($_GET['option']));
} 
else {
    $class = 'main';
}

$file = 'classes/' . $class . 'php';

if (file_exists($file)) {
    require '$file';
    
    if(class_exists($class)) {
        $obj = new $class;
        $obj->get_body();
    }
    else {
        exit("<h3 style='color: red; text-align: center; margin: 150 auto;'>Данные для входа - отсутствуют.</h3>");
    }
}
else {
    exit("<h3 style='color: red; text-align: center; margin: 150 auto;'>Такого адреса не существует.</h3>");
}