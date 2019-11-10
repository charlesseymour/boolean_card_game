<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../inc/bootstrap.php';

$username = request()->get('username');
$email = request()->get('email');
$password = request()->get('password');
$confirmPassword = request()->get('confirm_password');

$user = findUserByName($username);

if (!empty($user)) {
	redirect('register.php');
}

if (strlen($username) > 50) {
	redirect('register.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	redirect('register.php');
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
$user = createUser($username, $hashed, $email);
$expTime = time() + 3600;
$jwt = \Firebase\JWT\JWT::encode([
	'iss' => request()->getBaseUrl(),
	'sub' => "{$user['id']}",
	'exp' => $expTime,
	'iat' => time(),
	'nbf' => time()
], getenv("SECRET_KEY"), 'HS256');
$accessToken = new Symfony\Component\HttpFoundation\Cookie('access_token', $jwt, $expTime, '/', 
															getenv('COOKIE_DOMAIN'));
															
redirect('/', ['cookies' => [$accessToken]]);