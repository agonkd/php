<?php
$inputs = [
  'username' => 'Username',
  'password' => 'Password',
];
print_a($_SESSION);
?>

<div class="bs-callout bs-callout-warning hidden">
  <h4>Oh snap!</h4>
  <p>This form seems to be invalid :(</p>
</div>

<div class="bs-callout bs-callout-info hidden">
  <h4>Yay!</h4>
  <p>Everything seems to be ok :)</p>
</div>

<form action="/rentacar/auth/login/login-action" method="POST" id="login-form" data-parsley-validate="" class="grid gap-4 border p-8 rounded">
  <p class="text-xs text-red-500"><?php echo $_SESSION['login_errors']['message'] ?? null; ?></p>
  <?php foreach ($inputs as $key => $value) : ?>
    <div class="grid">
      <label for="<?php echo $key ?>"><?php echo $value ?></label>
      <input type="text" id="<?php echo $key ?>" name="<?php echo $key ?>" required class="p-2 border outline-none">
      <!-- <p class="text-xs text-red-500"><?php echo $_SESSION['login_errors'][$key] ?? null; ?></p> -->
    </div>
  <?php endforeach ?>
  <input type="hidden" name="form" value="login-form">
  <button type="submit" name="login" id="login" value="validate" class="w-full p-2 border">Login</button>
  <p>Don't have an account? <a href="../sign-up">Sign Up</a></p>
</form>