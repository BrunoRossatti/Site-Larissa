<?php

$senha = "prof2024";
$hash = password_hash($senha, PASSWORD_ARGON2ID);
$result = password_verify($senha, $hash);

var_dump($result);
var_dump($hash);
