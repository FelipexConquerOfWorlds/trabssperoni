<?php

require_once '../app/models/CategoriaCrud.php';

    $hehehe = new CategoriaCrud();

    $lista = $hehehe->getCategorias();

    echo "<ul>";
        foreach ($lista as $item) {
            echo "<li>".utf8_encode($item->getNome())."</li>";
        }
    echo "<ul>";
