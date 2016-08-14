<?php

if (isset($Module)) {
  if ($Module === 'register' && isset($_POST['enter_reg'])) {

    $login     = FormChars($_POST['login']);
    $name      = FormChars($_POST['name']);
    $email     = FormChars($_POST['email']);
    $password  = GenPass(FormChars($_POST['password']), $login);
    $country   = FormChars($_POST['country']);
    $avatar    = FormChars($_POST['avatar']);
    $avatar = 0;
    $active = 0;
    $captcha    = FormChars($_POST['captcha']);

    if ( !$login || !$name || !$email || !$password || $_POST['country'] > 4 || !$_POST['captcha']) MassageSend(1, ' Ошибка валидации формы ');

    if ($_SESSION['captcha'] != md5($captcha))  MassageSend(1, ' Не верная капча ');

    $res1 = $db->query("SELECT login FROM users WHERE login = '".$login."'" , PDO::FETCH_ASSOC);
    $login_val = $res1->fetch();
    $res2 = $db->query("SELECT email FROM users WHERE email = '".$email."'" , PDO::FETCH_ASSOC);
    $email_val = $res2->fetch();
    if ($login_val['login']) exit ('Логин <b>'.$_POST['login'].'</b> уже используется.');
    if ($email_val['email']) exit ('Email <b>'.$_POST['email'].'</b> уже используется.');

    $add = $db->prepare("INSERT INTO users (id, login, email, password, name, regdata, country, avatar, active)
                              VALUES ('', :login, :email, :password, :name, NOW(), :country, :avatar, :active)");
    $add->bindParam(':login', $login);
    $add->bindParam(':email', $email);
    $add->bindParam(':password', $password);
    $add->bindParam(':name', $name);
    $add->bindParam(':country', $country);
    $add->bindParam(':avatar', $avatar);
    $add->bindParam(':active', $active);
    $add->execute();

    $code = base64_decode($_POST['email']);
    mail($_POST['email'], 'Регистрация на блоге WEBAPE', 'Ссылка для активации: http://site3.loc/account/activate/code/'.substr($code, 5).substr($code, 0, -5), 'From: nefrick@webape.ru');
    MassageSend(3, 'регистрация аккаунта успешно завершена на указ E-mail '.$_POST['email'].' выслано письмо подтверждения');

  } elseif ($Module === 'login' && isset($_POST['enter_log'])) {
    echo "login";
  } else {
    echo "Ошибка";
  }
}
