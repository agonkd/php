<?php require_once('db/functions.php');

// Validate inputs and check if there are any errors
$errors = validateInputs(['username', 'password']);
if (empty($errors)) {
  $username = $_POST['username'];

  // Sanitize the username before using it in the query
  // $username = $db->quote($username);

  // Retrieve user data from the database
  $query = $db->from('users')->select('uid,password,admin')->where('username', $username)->first();

  if ($query && password_verify($_POST['password'], $query['password'])) {
    // Password is correct, set session variables
    $_SESSION['user'] = ['uid' => $query['uid'], 'username' => $username, 'admin' => $query['admin']];

    // Update user status (if necessary)
    $updateQuery = $db->update('users')
      ->where('uid', $_SESSION['user']['uid'])
      ->set(['status' => 1]);

    unset($_SESSION['login-errors'], $_SESSION['sign-up-errors']);
    // Redirect to the home page
    header('Location: /rentacar');
    exit;
  } else {
    // Handle incorrect username or password error
    $_SESSION['login_errors']['message'] = 'Incorrect username or password.';
  }
} else {
  // Handle missing input fields error
  $_SESSION['login_errors'] = $errors;
}

header('Location: /rentacar/auth/login');
