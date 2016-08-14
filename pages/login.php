<?php Head('Главная страница') ?>
<body>

  <div class="container">
    <?php Menu() ?>
  </div>
<div class="container">
    <form class="" action="/form/account.php" method="post">

      <div class="form-group"> <label for="InputLogin">Login</label>
        <input type="text" class="form-control" id="InputLogin" placeholder="login" name="login">
      </div>

      <div class="form-group"> <label for="InputPassword">Password</label>
        <input type="password" class="form-control" id="InputPassword" placeholder="login" name="password">
      </div>


      <input class="btn btn-default" type="submit" name="enter_log" value="Login"><br>
      <br><input class="btn btn-default" type="reset"  value="Clean">
    </form>
</div>

    <?php Footer() ?>
    </body>
    </html>
