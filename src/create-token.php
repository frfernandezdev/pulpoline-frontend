<?php 
include 'functions.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	create_token($_POST['symbol'], $_POST['name'], $_POST['initialSupply']);
}
