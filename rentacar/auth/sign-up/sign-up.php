<?php
$inputs = [
  'username' => 'Username',
  'email' => 'Email',
  'password' => 'Password',
  'confirm_password' => 'Confirm Password',
];
?>

<div class="bs-callout bs-callout-warning hidden">
  <h4>Oh snap!</h4>
  <p>This form seems to be invalid :(</p>
</div>

<div class="bs-callout bs-callout-info hidden">
  <h4>Yay!</h4>
  <p>Everything seems to be ok :)</p>
</div>

<section class="flex gap-8">
  <form action="/rentacar/auth/sign-up/sign-up-action" method="POST" id="sign-up-form" data-parsley-validate="" class="grid gap-4 border p-8 rounded">
    <div class="p-4 bg-red-100 rounded">
      <p class="text-xs text-red-500"><?php echo $_SESSION['sign_up_errors'] ?? null; ?></p>
    </div>
    <?php foreach ($inputs as $key => $value) : ?>
      <div class="grid">
        <label for="<?php echo $key ?>" class="text-sm"><?php echo $value ?></label>
        <input type="text" id="<?php echo $key ?>" name="<?php echo $key ?>" required class="p-2 border outline-none rounded">
      </div>
    <?php endforeach ?>
    <input type="hidden" name="form" value="sign-up-form">
    <button type="submit" name="sign-up" id="sign-up" value="validate" class="w-full p-2 bg-[#222] text-white border rounded">Sign Up</button>
    <p>Already have an account? <a href="../login">Login</a></p>
  </form>
</section>