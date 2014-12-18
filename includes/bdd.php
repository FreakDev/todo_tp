<?php

global $bdd;

try {
	$bdd = new PDO("mysql:host=localhost;dbname=todo_tp;unix_socket=/home/mathiasd/.mysql/mysql.sock", "root", "root");
	$bdd->exec('SET NAMES utf8');
} catch (Exception $e) {
	die('Can\'t connect to MySql Serveur : ' . $e->getMessage());
}