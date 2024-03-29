<?php
// task functions

function findUserByName($username) 
{
	global $db;
	
	try {
		$query = "SELECT * FROM users WHERE username= :username";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	} catch (\Exception $e) {
		throw $e;
	}
}
function findUserByAccessToken() 
{
	global $db;
	
	try {
		$userId = decodeJwt('sub');
	} catch (\Exception $e) {
		throw $e;
	}
	try {
		$query = "SELECT * FROM users WHERE id = :userId";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':userId', $userId);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	} catch (\Exception $e) {
		throw $e;
	}
}
function createUser($username, $password) 
{
	global $db;
	
	try {
		$query = "INSERT INTO users (username, password) VALUES (:username, :password)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		return findUserByName($username);
	} catch (\Exception $e) {
		throw $e;
	}
}
function updatePassword($password, $userId) {
	global $db;
	
	try {
		$query = 'UPDATE users SET password=:password WHERE id = :userId';
		$stmt = $db->prepare($query);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':userId', $userId);
		$stmt->execute();
	} catch (\Exception $e) {
		return false;
	}
	
	return true;
}
function decodeJwt($prop = null) {
	\Firebase\JWT\JWT::$leeway = 1;
	$jwt = \Firebase\JWT\JWT::decode(
		request()->cookies->get('access_token'),
		getenv('SECRET_KEY'),
		['HS256']
	);
	
	if ($prop === null) {
		return $jwt;
	}
	
	return $jwt->{$prop};
}
function isAuthenticated() {
	if (!request()->cookies->has('access_token')) {
		return false;
	}
	
	try {
		decodeJwt();
		return true;
	} catch (\Exception $e) {
		return false;
	}
}
function requireAuth() {
	if (!isAuthenticated()) {
		$accessToken = new \Symfony\Component\HttpFoundation\Cookie(
			"access_token", "Expired", time()-3600, '/', getenv('COOKIE_DOMAIN')
		);
		redirect('/login.php', ['cookies' => [$accessToken]]);
	}
}
function display_errors() {
	global $session;
	
	if (!$session->getFlashBag()->has('error')) {
		return;
	}
	
	$messages = $session->getFlashBag()->get('error');
	
	$response = '<div class="alert alert-danger alert-dismissable">';
	foreach($messages as $message) {
		$response .= "{$message}<br />";
	}
	$response .= '</div>';
	
	return $response;
}
function display_success() {
    global $session;
    if(!$session->getFlashBag()->has('success')) {
        return;
    }
    $messages = $session->getFlashBag()->get('success');
    $response = '<div class="alert alert-success alert-dismissable">';
    foreach ($messages as $message) {
        $response .= "{$message}<br>";
    }
    $response .= '</div>';
    return $response;
}

?>