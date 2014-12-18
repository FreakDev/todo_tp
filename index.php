<?php

session_start();

if (empty($_SESSION['user'])) {
	header("Location: login.php");
	exit();
}

include ('includes/bdd.php');

$filterUser = -1;

$sqlWhere = "";
if (isset($_POST['user']) && $_POST['user'] != -1 || $filterUser != -1) {
	if ($filterUser == -1) {
		$filterUser = $_POST['user'];
	}
	$sqlWhere = " WHERE user_id = " . $filterUser;
}

$sql = "SELECT * FROM task" . $sqlWhere . " ORDER BY status ASC";
$stmt = $bdd->prepare($sql);
$stmt->execute();
$dataTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM user";
$stmt = $bdd->prepare($sql);
$stmt->execute();
$dataUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

include ('templates/index.phtml');

