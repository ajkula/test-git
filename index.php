<?php
require 'conf/config.php';
require 'lib/lib-html.php';
require 'lib/lib-mvc.php';
require 'lib/lib-pdo.php';
require 'models/userModel.php';
require 'models/catalogueModel.php';
require './autoload.php';

session_start();

define('ROOT_FOLDER', __DIR__);

// Gestion visiteur Anonyme
if(!isset($_SESSION['client'])){
    $client = new ClientDTO;
    $client->setNom("Anonyme");
    $_SESSION['client'] = serialize($client);
}else{
    $client = unserialize($_SESSION['client']);
}

var_dump($client);
//Récupération du controller
$controller = filter_input(INPUT_GET, 'controller');

if(empty($controller)){
    $controller = 'mainController';
} elseif(!file_exists(ROOT_FOLDER."/controllers/$controller.php")){
    $controller = 'mainController';
}

$dto = new ClientDTO;


require ROOT_FOLDER."/controllers/$controller.php";

