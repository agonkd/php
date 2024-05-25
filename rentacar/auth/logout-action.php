<?php require_once('db/functions.php');
$query = $db->update('users')
  ->where('uid', $_SESSION['user']['uid'])
  ->set([
    'status' => 0
  ]);
session_start();
unset($_SESSION['user']);
session_destroy();
header('Location: login');
