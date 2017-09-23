<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ты кто?</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link rel="shortcut icon" href="res/favicon.ico" type="image/x-icon">

    <style media="screen">
      body {
        margin: 0px;
        /*background: #80CBC4;*/
        background: #B2DFDB;
        z-index: 0;
      }

      .main {
        position: fixed;
        top: calc(50% - 300px);
        left: calc(50% - 200px);
        width: 400px;
        /*height: 400px;*/
      }

      .main .head img {
        width: 100px;
        height: 100px;
      }

      .main .head span {
        float: right;
        font-size: 52px;
        padding-top: 24px;
        padding-bottom: 24px;
        padding-right: 12px;
        text-align: center;
        font-family: 'Roboto', sans-serif;
      }

      .main #residentReg, .main #adminReg {
        position: fixed;
        top: calc(50% - 125px);
        left: calc(50% - 200px);
        width: 400px;
        height: 400px;
        background: #B2DFDB;

      }

      .main #residentReg {
        z-index: 101;
      }

      .main #adminReg {
        z-index: 100;
      }
      .main table {
        width: 100%

      }
      .main table th {
        font-family: 'Roboto', sans-serif;
        font-weight: 100;
        width: 50%
      }
      .main table th span {
        cursor: pointer;
        font-size: 24px;
      }

      #residentBtn {
        color: red;
      }

      input {
        margin-top: 16px;
        background: inherit;
        border-top: none;
        border-left: none;
        border-right: none;
        border-color: #000000;
        font-size: 20px;
        font-family: 'Roboto', sans-serif;
        font-weight: 100;
        transition: border-color 0.4s;
        width: 100% ;
        margin-bottom: 50px;
      }

      input:focus {
        outline: none;
        border-color: #4DB6AC;
      }
      form span {
        width: 100%;
        text-align: center;
        font-family: 'Roboto', sans-serif;
        font-weight: 100;
        /*font-size: 24px;*/
      }

      button {
        position: absolute;
        top: 250px;
        background: #80CBC4;
        border: none;
        font-size: 24px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 7px;
        cursor: pointer;
        width: 124px;
        margin-left: calc(50% - 62px);
      }

      button:focus {
        outline: none;
        box-shadow: none;
      }

      #error  {
        text-align: center;
        font-family: 'Roboto', sans-serif;
        font-weight: 100;
        font-size: 13px;
        margin-top: 8px;
        color: red
      }
    </style>
  </head>
  <body>
    <div class="main">
      <div class="head">
        <img src="res/logo.png" alt="">
        <span>гараж хаб</span>
      </div>
      <table>
        <th>
          <span id="residentBtn">резидент</span>
        </th>
        <th>
          <span id="adminBtn">админ</span>
        </th>
      </table>
      <?php if($_GET["fail"] == 1): ?>
      <div id="error">
        <span>неправильный пароль или имя пользователя</span>
      </div>
    <?php endif; ?>
      <div id="residentReg">
        <form class="" action="registrationCheck.php" method="post">
          <span>почта</span>
          <br>
          <input type="text" name="email" value="">
          <span>пароль</span>
          <br>
          <input type="password" name="password" value="">

          <button type="submit" name="button">погнали!</button>
        </form>
      </div>
      <div id="adminReg">
        <form class="" action="registrationCheck.php" method="post">

          <span>супер-пупер пароль</span>
          <br>
          <input type="hidden" name="email" value="admin">
          <input type="password" name="password" value="">

          <button type="submit" name="button">погнали!</button>
        </form>
      </div>
    </div>


    <script type="text/javascript">
      var residentBtn = document.getElementById("residentBtn");
      var adminBtn = document.getElementById("adminBtn");
      residentBtn.nieghbor = adminBtn;
      adminBtn.nieghbor = residentBtn;
      residentBtn.divToShow = document.getElementById("residentReg");
      adminBtn.divToShow = document.getElementById("adminReg");
      function showDiv() {
        var MyZIndex =  getComputedStyle(this.divToShow).zIndex;
        var NieghborZIndex = getComputedStyle(this.nieghbor.divToShow).zIndex;
        if (MyZIndex < NieghborZIndex) {
          this.nieghbor.divToShow.style.zIndex = MyZIndex;
          this.divToShow.style.zIndex = NieghborZIndex;
          this.style.color = "red";
          this.nieghbor.style.color = "black";
        }
      }
      residentBtn.onclick = showDiv;
      adminBtn.onclick = showDiv;
    </script>


  </body>
</html>
