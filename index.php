<?php

include ('includes/bdd.php');

$sql = "SELECT * FROM task ORDER BY status ASC";
$stmt = $bdd->prepare($sql);
$stmt->execute();
$dataTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM user";
$stmt = $bdd->prepare($sql);
$stmt->execute();
$dataUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

include ('templates/index.phtml');

