<?php require_once('db/functions.php');

$errors = validateInputs(['username', 'email', 'password', 'confirm_password']);
if (empty($errors)) {
  $username = $_POST['username'];
  $email = $_POST['email'];

  $errors = validatePassword($_POST['password']);
  if (empty($errors)) {
    if ($_POST['password'] === $_POST['confirm_password']) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $token = generateToken();

      // Insert user data into the database
      $insertQuery = $db->insert('users')
        ->set([
          'username' => $username,
          'email' => $email,
          'password' => $password,
          'status' => 1,
          'token' => $token
        ]);

      // Check if insertion was successful
      if ($insertQuery) {
        // Retrieve the inserted user's ID and admin status
        $query = $db->from('users')->select('uid,admin')->where('username', $username)->first();

        // Set session variables
        $_SESSION['user'] = ['uid' => $query['uid'], 'username' => $username, 'admin' => $query['admin']];

        $to = $email;
        $subject = 'Confirm your email';
        $message = 'Thank you for registering! Please click the following link to activate your account: http://example.com/verify.php?token=' . $token;
        $headers = 'From: your@example.com' . "\r\n" .
          'Reply-To: your@example.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        unset($_SESSION['sign_up_errors'], $_SESSION['sign_up_errors']);
        // Redirect to the home page
        // header('Location: /rentacar');
        exit;
      } else {
        $_SESSION['sign_up_errors'] = "Registration failed. Please try again.";
      }
    }
  }
}


header('Location: /rentacar/auth/sign-up');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="">
    <input type="text">
    <button type="submit">Verify</button>
  </form>
</body>

</html>