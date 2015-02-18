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
                <form class="reg" name="formlog" method="post" action="<?= APP_W; ?>home/login">
                    <div id="hello"></div><!-- this is to show Hello name message -->
                    <label for="email">Email<input type="text" name="email" value="" placeholder="e@mail" required></label>
                    <label for="password">Password<input type="password" name="password" required></label>
                    <input type="submit" class="bEntra" value="Entra" id="logsend">
                </form>
           
              </div>
  </header>
  <section>
    <h2>Home section</h2>
    
  </section>