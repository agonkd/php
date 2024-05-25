<?php require_once('db/functions.php');
// If the user is logged in and is trying to access the login or register page, redirect them to the home page
if (isset($_SESSION['user']) && (strpos($_SERVER['REQUEST_URI'], 'login') !== false || strpos($_SERVER['REQUEST_URI'], 'sign-up') !== false)) {
  header("Location: /rentacar");
  exit; // Ensure script execution stops after redirect
}

// If the user is not logged in and is trying to access a page other than the login or register page, redirect them to the login page
if (!isset($_SESSION['user']) && strpos($_SERVER['REQUEST_URI'], 'login') === false && strpos($_SERVER['REQUEST_URI'], 'sign-up') === false) {
  header("Location: /rentacar/auth/login");
  exit; // Ensure script execution stops after redirect
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_SESSION['site_settings']['title']; ?></title>
  <script src="\rentacar\lib\jquery-3.7.1.min.js"></script>
  <script src="\rentacar\lib\parsley.min.js"></script>
  <script src="\rentacar\lib\tailwind.js"></script>
</head>

<body>