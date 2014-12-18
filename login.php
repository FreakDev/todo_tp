<?php

session_start();

include ('includes/bdd.php');

$message = "";

if (isset($_POST['login'])) {
	$sql = "SELECT * FROM user WHERE nickname = '" . $_POST['nickname'] . "' AND password = '" . $_POST['password'] . "'";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();

	if ($stmt->rowCount() === 1) {
		$dataUser = $stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user'] = $dataUser;

		header("Location: index.php");
		exit();
	} else {
		$message = "Failed login";
	}
}

include ('templates/login.phtml');