<?php

$host       = '127.0.0.1';
$dbName     = 'skill_test';
$user       = 'root';
$pass       = 'BEO37188913';
$charset    = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$db = new PDO($dsn, $user, $pass, $opt);