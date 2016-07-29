<?php
require 'conf/config.php';
require 'lib/lib-html.php';
require 'lib/lib-mvc.php';
require 'lib/lib-pdo.php';
require 'models/userModel.php';
require 'models/catalogueModel.php';

session_start();

define('ROOT_FOLDER', __DIR__);

//Récupération du controller
$controller = filter_input(INPUT_GET, 'controller');

if(empty($controller)){
    $controller = 'mainController';
} elseif(!file_exists(ROOT_FOLDER."/controllers/$controller.php")){
    $controller = 'mainController';
}

require ROOT_FOLDER."/controllers/$controller.php";

