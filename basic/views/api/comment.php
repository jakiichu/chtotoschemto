<?php
error_reporting(0);
require 'rb.php';

R::setup('mysql:host=localhost;dbname=forum;', 'root', '');
$getData = R::getAll('SELECT * FROM `comment`', []);

$arrayReturn = [];
foreach($getData as $item){
    array_push($arrayReturn, 
        $item
    );
    
}

echo json_encode($arrayReturn, JSON_UNESCAPED_UNICODE);


?>