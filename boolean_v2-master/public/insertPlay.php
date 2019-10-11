<?php

require_once '../inc/bootstrap.php';

$date = $_POST['date'];
$mode = $_POST['mode'];
$win = $_POST['win'];
$user_id = (int)$_POST['user_id'];

$query = 'INSERT INTO plays (date, mode, win, user_id) VALUES (:date, :mode, :win, :user_id)';
$stmt = $db->prepare($query);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':mode', $mode);
$stmt->bindParam(':win', $win);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

?>