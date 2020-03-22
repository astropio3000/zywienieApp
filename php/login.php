<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/stylelogin.css">
  </head>
  <body>
    <section class="container">
      <section class="bar">
        <div class="logo">LOGO</div>
        <ul class="menu" id="menu">
          <li class="menuOption"><a href="index.html">Stron Główna</a></li>
          <li class="menuOption"><a href="index.html">O nas</a></li>
          <li class="menuOption"><a href="index.html">Przepisy</a></li>
          <li class="menuOption"><a href="index.html">Porady</a></li>
        </ul>
        <div class="abar" id="bar">
          <span class="men"></span>
          <span class="men"></span>
          <span class="men"></span>
        </div>
        <div class="login">Zaloguj się!</div>
        <div class="register">Zarejestruj się!</div>

      </section>
    <section class="content">
      <form class="label" action="loginAction.php" method="post">
        <div class="logform"><span>Login: </span><input type="text" name="login" class="form"></div><br>
        <div class="logform"><span>Hasło: </span><input type="password" name="password" class="form"></div>
        <button type="submit" name="log" class="btn">Zaloguj się!</button>
        <div class="info">Nie masz jeszcze konta? <a class="link" href="register.html">Zarejestuj się!</a></div>
        <?php
        session_start();
        if(isset($_SESSION['error'])){echo $_SESSION['error'];}
        ?>
      </form>    
    </section>
    <script src="./js/script.js" charset="utf-8"></script>
  </body>
</html>
