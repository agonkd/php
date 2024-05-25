<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require_once('db.php');

$db = new DB('localhost', 'rentacar', 'root', '');

function print_a($array)
{
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

// Validate inputs and return error messages if validation fails
function validateInputs($inputs)
{
  $errors = [];
  foreach ($inputs as $input) {
    if (empty($_POST[$input])) {
      $errors[$input] = str_replace('_', ' ', ucfirst($input)) . " is required.";
    }
  }
  return $errors; // Return array of errors, empty if no errors
}

// Validate password and return error message if validation fails
function validatePassword($password)
{
  switch ($password) {
    case strlen($password) < 8:
      $message = "Password must be at least 8 characters long.";
      break;
    case !preg_match("/[A-Z]/", $password):
      $message = "Password must contain at least one uppercase letter.";
      break;
    case !preg_match("/[0-9]/", $password):
      $message = "Password must contain at least one digit.";
      break;
    case !preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password):
      $message = "Password must contain at least one special character.";
      break;
    case $password !== $_POST['confirm_password']:
      $message = "Passwords must match.";
      break;
  }
  $_SESSION['sign_up_errors'] = $message ?? '';
}

function generateToken($length = 20)
{
  return bin2hex(random_bytes($length));
}
