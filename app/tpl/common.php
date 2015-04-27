<body>
  <div class="head">
        <div class="logo">
        <a href="<?= APP_W;?>"><img class="logo" alt="Put your logo" src="<?= APP_W.$theme.$logo;?>"/></a>
        </div>
      <div class="login">
          <form  class="log" name="formlog" method="post" action="<?= APP_W; ?>home/login">
                <label for="email">Email<input type="text" name="email" value="" placeholder="e@mail" required></label>
                <label for="password">Password<input type="password" name="password" required></label>
                <input type="submit" class="bEntra" value="Entra" id="logsend">
          </form>
          <img id="imgload" src="<?= APP_W.$theme.'img/ajax-loader.gif';?>"/>
          <div class="hel-mis">
            <?php
              if (isset($_SESSION['user'])){
                echo '<p>'.$_COOKIE['user'].' | <a href="'.APP_W.'home/logout">Sortir </a></p>';
              }
            ?>
          </div>
          <div class="m-warning">
            <?php
              if (isset($_COOKIE['error'])){
                echo '<p><span style="color:red"> Error: '.$_COOKIE['error'].'</p>';
              }
              if (isset($_COOKIE['msg'])){
                echo '<p><span style="color:green"> Missatge: '.$_COOKIE['msg'].'</p>';
              }
            ?>
          </div>
      </div>
 </div>