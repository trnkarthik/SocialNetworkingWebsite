<?php
// Desired folder structure
$structure = './users/n/';

// To create the nested structure, the $recursive parameter 
// to mkdir() must be specified.

if (!mkdir($structure, 0, true)) {
    die('Failed to create folders...');
}

// ...
?>