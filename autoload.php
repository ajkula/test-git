<?php

function autoloader($class) {
    // Dossier contenant les classes chargé en tableau
    $folders = [
        'classes/',
        'classes/DAO/'
    ];

    // je parcour le tableau de dossiers pour essayer de trouver les classes, et pour chaques fichiers presents :
    foreach ($folders as $folder) {
        $path = $folder . $class . '.php';
        $found = FALSE;
        if (file_exists($path)) {
            $found = TRUE;
            require $path;
            break;
        }
        
        
    }
// exception si la classe n'est pas trouvée
        if (!$found) {
            throw new Exception("le fichier $path n'existe pas!");
        }
}

spl_autoload_register('autoloader');
