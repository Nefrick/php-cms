<?php
 include_once 'setings.php';
 session_start();

 try {
   $db = new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
   $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES UTF8');
 } catch (Exception $e) {
   throw new PDOException("Error  : " .$e->getMessage());
   exit();
 }


if ($_SERVER['REQUEST_URI'] == '/'){
  $Page   = 'index';
  $Module = 'index';
} else {
  $URL_Path  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $URL_Parts = explode('/', trim($URL_Path, ' /'));
  $Page      = array_shift($URL_Parts);
  $Module    = array_shift($URL_Parts);

  if (!empty($Module)) {
    $Param = array();
    for ($i = 0; $i < count($URL_Parts); $i++){
      $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
    }
  }
}


function MassageSend($p1, $p2) {
  if($p1 == 1) $p1 = 'Error';
  elseif ($p1 == 2) $p1 = 'Information';
  $_SESSION['message'] = '<div class="MessageBlock"><b>'.$p1.'</b>: '.$p2.'</div>';
  exit(header('Location:'.$_SERVER['HTTP_REFERER']));
}

function MassageShow() {
  $Message = NULL;
  if ($_SESSION['message']) $Message = $_SESSION['message'];
  echo $Message;
  $_SESSION['message'] = array();
}




switch ($Page) {
  case 'home':
  case 'index': include 'pages/index.php'; break;
  case 'photo':
    echo 'Photo Galery';
    break;
  case 'register': include 'pages/register.php'; break;
  case 'login':    include 'pages/login.php'; break;
  case 'account':  include 'form/account.php'; break;
  case 'captcha':  include 'form/captcha.php'; break;
  default:
    echo '404';
    break;
}


function FormChars ($data) {
  return nl2br(htmlspecialchars(trim($data), ENT_QUOTES), false);
}

function GenPass($p1 , $p2){
  return md5('secure'.md5('sax'.$p1.'bsr').md5('623'.$p2.'361'));
}

function Head($p1) {
echo '<!DOCTYPE html><html><head><meta charset="utf-8" /><title>'.$p1.'</title><meta name="keywords" content="" /><meta name="description" content="" /><link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><link href="resource/style.css" rel="stylesheet"></head>';
}


function Menu () {
echo '<nav class="navbar navbar-inverse navbar-fixed-top" id="nav-fix">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">PHP CMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="#anchor">Anchor</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>';
}

function Footer () {
echo '<script src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>';
echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>';
echo '<script src="resource/main.js"></script>';

}



?>
