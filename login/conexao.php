<?php

try {

    $conn = new PDO(
        "mysql:host=localhost;dbname=podai;charset=utf8mb4",
        "root",
        ""
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e){

    die("Erro: " . $e->getMessage());

}