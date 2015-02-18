<body>        
    <header>
          <div class="header-tit">
            <div id="wrapper">
            <a href="<?= APP_W; ?>"><img class="logo" alt="Put your logo" src="<?= APP_W.'pub/theme/k/'.$logo;?>"/></a>
            <h1><?= $titol;?></h1>
            </div>
          </div> <!-- from div header-tit -->
          <!-- user register div -->  
              <div class="regist">
                <form class="reg" name="formlog" method="post" action="{app_w}index/login">
                    <div id="hello"></div><!-- this is to show Hello name message -->
                    <label for="email">email<input type="text" name="email" value="" placeholder="e@mail" required></label>
                    <label for="password">password<input type="password" name="password" required></label>
                    <input type="submit" value="Entra" id="logsend">
                </form>
           
              </div>
  </header>
  <section>
    <h2>Register user section</h2>
    <div class="formreg">
                <form class="registre" name="formregister" method="post" action="{app_w}reg/send">
                    <div id="hello"></div><!-- this is to show Hello name message -->
                    <label for="name">Name<input type="text" name="name" value="" placeholder="e@mail" required></label>
                    
                    <label for="email">email<input type="text" name="email" value="" placeholder="e@mail" required></label>
                    <label for="password">password<input type="password" name="password" required></label>
                    <input type="submit" value="Regsiter" id="regsend">
                </form>
           
              </div>
  </section>