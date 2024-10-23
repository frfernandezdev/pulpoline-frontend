<?php

include 'functions.php';

if (isAuthenticated()) {
	header('Location: dashboard.php');
	exit;
} 
else {
	header('Location: login.php');
	exit;
}
