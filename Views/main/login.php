<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./Views/css/login.css">
</head>

<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="index.php?route=login" method="post">
        <h2>Login</h2>
        <p style="color:red">
          <?php if(isset($_SESSION["error"])&& isset($_SESSION["error"])!=='') echo $_SESSION["error"];unset($_SESSION["error"])  ?>
        </p>
        <input type="text" placeholder="username" name="username" />
        <input type="password" placeholder="password" name="password" />
        <button name="login">login</button>

        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
  </div>
</body>

</html>