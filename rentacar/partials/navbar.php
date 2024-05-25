<nav>
  <ul>
    <li><?php echo $_SESSION['user']['username'] ?? 'Guest'; ?></li>
    <li><a href="/rentacar">Home</a></li>
    <li><a href="auth/login">Login</a></li>
    <li><a href="auth/sign-up">Sing up</a></li>
    <form action="/rentacar/auth/logout-action" method="POST">
      <button type="submit" name="logout" id="logout">Logout</button>
    </form>
  </ul>
</nav>