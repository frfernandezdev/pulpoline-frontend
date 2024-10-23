<?php 

$baseUrl = "https://bottom-timmie-mindstartups-df099d9f.koyeb.app/api/v1";

function isAuthenticated() {
	session_start();
	return isset($_SESSION['access_token']);
}

function login($email, $password) {
	global $baseUrl;	

	$ch = curl_init($baseUrl . '/auth/login');
	curl_setopt_array($ch, array(
		CURLOPT_POST => TRUE,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
		),
		CURLOPT_POSTFIELDS => json_encode([ 'email' => $email, 'password' => $password])
	));

	$response = curl_exec($ch);

	if ($response) {
		$response = json_decode($response);

		$_SESSION['access_token'] = $response->result->access_token;

		header('Location: index.php');
	}

	curl_close($ch);
}

function logout() {
	global $baseUrl;

	$ch = curl_init($baseUrl . '/auth/logout');
	curl_setopt_array($ch, array(
		CURLOPT_POST => TRUE,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $_SESSION['access_token'],
				'Content-Type: application/json'
		),
	));

	curl_exec($ch);
	curl_close($ch);

	session_unset();
	session_destroy();
	header('Location: index.php');
	exit;
}

function register($name, $email, $password) {
	global $baseUrl;	

	$ch = curl_init($baseUrl . '/auth/register');
	curl_setopt_array($ch, array(
		CURLOPT_POST => TRUE,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
		),
		CURLOPT_POSTFIELDS => json_encode([ 'name' => $name, 'email' => $email, 'password' => $password])
	));

	$response = curl_exec($ch);

	if ($response) {
		$response = json_decode($response);

		if ($response->statusCode == 409) return;

		$_SESSION['access_token'] = $response->result->access_token;

		header('Location: index.php');
	}

	curl_close($ch);
}

function create_token($symbol, $name, $initialSupply) {
	global $baseUrl;	

	$ch = curl_init($baseUrl . '/hedera/create-token-hedera');
	curl_setopt_array($ch, array(
		CURLOPT_POST => TRUE,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $_SESSION['access_token'],
				'Content-Type: application/json'
		),
		CURLOPT_POSTFIELDS => json_encode([ 'symbol' => $symbol, 'name' => $name, 'initialSupply' => intval($initialSupply)])
	));

	$response = curl_exec($ch);

	if ($response) {
		$response = json_decode($response);

		header('Location: dashboard.php');
	}

	curl_close($ch);
}

function list_tokens() {
	global $baseUrl;	

	$ch = curl_init($baseUrl . '/hedera/list-tokens');
	curl_setopt_array($ch, array(
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $_SESSION['access_token'],
		),
	));

	$response = curl_exec($ch);

	if ($response) {
		$response = json_decode($response);

		return $response->results;
	}

	curl_close($ch);

	return [];
}
