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
    <div id="output">

    </div>
</div>
<script>
// каррирование (curring)

function add(x, y){
  var oldX = x, oldY = y;

  if(typeof oldY === "undefined") { // частичное применение
    return function (newY) {
      return oldX + newY;
    }
  }

  return x + y; // полное применение
}

var add20 = add(20);

var r1 = add20(1); //21
var r2 = add20(2); //22


var arr = [1,44,5,74,23,88,1,323,543,123,767,12,7,32,83,23,333];
var maxValue = Math.max.apply(null, arr);
var arrayLikeObject = {
  "0": "first",
  "1": "second",
  "2": "third",
  "3": "fourth",
  "4": "fifth",
  "5": "sixth",
  length: 6
}

var result = Array.prototype.slice.call(arrayLikeObject, 2, 4);

function calcFib(x) {
  if (!calcFib.cache[x]) {
    if(x > 1) {
      calcFib.cache[x] = calcFib(x -1) + calcFib(x -2);
    } else {
      calcFib.cache[x] = x;
    }
  }
  return calcFib.cache[x];
}

calcFib.cache = {};

for (var i = 0; i < 20; i++){
  console.log(i + " = " + calcFib(i));
}

window.onload = function () {
  console.log(maxValue);
  console.log(result);
  console.log(r1 + ' = ' + r2);
  var person = {
    firstName: "Ivan",
    lastName: "Ivanov"
  };

  function print(color, count) {
    var p = document.getElementById('output');
    p.style.color = color;
    for (var i = 0; i < count; i++ ){
      p.innerHTML += "Hello, my name is " + this.firstName + "<br>";
    }
  }

  print.apply(person, ['green', 3]);
}


</script>
    <?php Footer() ?>
    </body>
    </html>
