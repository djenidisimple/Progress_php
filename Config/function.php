<?php
function writeInFile($file, $pseudo, $message)
{
    // Vérifie si le fichier existe
    if (!file_exists($file)) {
        // Crée le fichier s'il n'existe pas
        file_put_contents($file, "");
    }
    // Ajoute une personne
    $current = file_get_contents($file);
    $current .= $pseudo . "\n" . $message . "\n";
    // Écrit le résultat dans le fichier
    file_put_contents($file, $current, FILE_APPEND);
}