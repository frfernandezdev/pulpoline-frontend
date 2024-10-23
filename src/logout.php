<?php

include 'functions.php';

if (isAuthenticated()) {
	logout();
	exit;
} 
else {
	header('Location: index.php');
	exit;
}

