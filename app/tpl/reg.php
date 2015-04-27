<?php
  $menu=array(
      'Inici'=>APP_W
      
    );
  include 'common.php';
?>

  <div class="menu">
    <?php
      KMenu::create($menu);
    ?>
  </div>
    <div class="form-signing">
          <h2>Registre d'usuaris</h2>
                <form class="registre" name="formregister" method="post" action="<?= APP_W; ?>reg/send">
                    <p>Nom</p>
                    <label for="name"><input type="text" name="name" value="" placeholder="Introdueix nom" required></label></br>
                    <p>Email</p>
                    <label for="email"><input type="email" id="nick" name="email" value="" placeholder="e@mail" required></label></br>
                    <div id="nick-msg"></div>
                    <p>Password</p>
                    <label for="password"><input type="password" placeholder="Password" name="password" required></label></br>
                    <p>Reescriu password</p>
                    <label for="repassword"><input type="password" placeholder="Reescriu assword" name="repassword" required></label></br>
                    <input type="submit" value="Registra't" id="regsend">
                </form>
              </div>
              
  </section>