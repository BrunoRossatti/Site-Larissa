<?php

$senha = "02357892716";
$hash = password_hash($senha, PASSWORD_ARGON2ID);
$result = password_verify($senha, $hash);

var_dump($result);
var_dump($hash);
