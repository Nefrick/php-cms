<?php Head('Regist') ?>
<body>
<div class="container">
<?php Menu() ?>
</div>
<div class="container">
  <?php MassageShow(); ?>
    <form class="" action="/account/register" method="post">
      <br><input type="text" name="login" value="" maxlength="15" required="" pattern="[A-Za-z-0-9]{3,15}" title="Не менее 3 не больше 15"> - Login
      <br><input type="text" name="name" value="" required=""> - Name
      <br><input type="email" name="email" value="" required=""> - E-mail
      <br><input type="password" name="password" value="" required=""> - Password
      <br><select size="1"  name="country" required="">
    <option disabled>Выберите город</option>
    <option value="0" >no</option>
    <option value="1" selected>Ukraine</option>
    <option value="2">Russian</option>
    <option value="3">USA</option>
    <option value="4">Canada</option>
   </select>
   <div class="capdiv">
      <img src="/resource/captcha.php" class="capimg" alt="Капча">
      <input class="capinp" type="text" name="captcha" placeholder="Капча" >
  </div>

      <input type="submit" name="enter_reg" value="register">
      <input type="reset"  value="Clean">
    </form>

</div>
    <?php Footer() ?>
    
    </body>
    </html>
